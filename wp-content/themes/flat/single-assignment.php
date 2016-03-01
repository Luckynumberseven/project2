<?php get_header(); ?>
	<div id="content" class="site-content hentry" role="main" itemscope itemtype="http://schema.org/Article">
		<?php
		$parent_post = $post->ID; //Stores post-id for later use outside loop

		if ( is_user_logged_in() ):

			$permitted = FALSE;
			$user = wp_get_current_user();
		//Get user groups, store in array
			$groups_user = new Groups_User( get_current_user_id() );
			$user_groups = $groups_user->groups;

			foreach ($user_groups as $group ) {
				$groups_name[] = $group->name;
			}

			//Set permitted to true if logged in user is permitted by role:
			if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles )) : 
				$permitted = TRUE;
			//Set permitted to true if logged in user belong to group
			else:
				$categories = get_the_category();
				foreach($categories as $category) {
					if ( in_array( $category->name, $groups_name ) ) {
						$permitted = TRUE;
					}
				}
			endif;

			if ( $permitted ):

				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'single' );
				endwhile;?>

				<?php //If logged in user already uploaded a file, print link to upload or show all uploads if permitted by role
				$user = wp_get_current_user();
				//get all attachments to this post
				$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent' => $parent_post ); 
				$attachments = get_posts( $args );
				
				if ( $attachments ) {
					echo '<div class="hentry">';
					//if permitted by role show all attachments:
					if(in_array( 'administrator', $user->roles ) || in_array( 'school_administrator', $user->roles ) || in_array( 'teacher', $user->roles) ){
						echo '<h3>These files are uploaded to this assignment: </h3>';

						foreach( $attachments as $post){
							setup_postdata( $post );
							echo '<p><a href="'.get_attachment_link( $post->ID, false ).'">'.get_the_author($post->ID).'</a></p>';
						}
					}
					//If not permitted by role: check if logged in user is the author to any attachment and display those:
				else {
					foreach ( $attachments as $post ) {
						setup_postdata( $post );

						if( $post->post_author == $user->ID ){
						echo '<h2>Uppladdat:</h2><p><a href="'.get_attachment_link( $post->ID, false ).'">'.get_the_author($post->ID).'</a></p>';
						}
					}
				}
				echo '</div>';
				wp_reset_postdata();
				}
				?>
				<?php 
				// Get the assignment deadline set by teacher. Compare to time for now and display/send field accordingly
				$deadline = strtotime(get_post_meta($post->ID, 'deadline', true));
					
				if( time() > $deadline ) :
					$in_time = 'no';//'File uploaded after deadline';
				else :
					$in_time = 'yes'; //'File uploaded before deadline';
				endif;
				
				$msg = '<i class="fa fa-thumbs-up fa-2x" style="color: green"></i> You are uploading in time before deadline.';
					
				if( $in_time == 'no' ) :
					$msg = '<i class="fa fa-thumbs-down fa-2x" style="color: red"></i> You are uploading after deadline!';
				endif; ?>

				<?php echo do_shortcode('
					[fu-upload-form class="assignment_upload" title="Lämna in uppgift"] 
						[input type="hidden" value="'.$in_time.'" name="in_time" disabled]
						<p>Deadline set to: <b>'.date('Y-m-d H:i:s', $deadline).'</b></p><p>'.$msg.'</p>
					[/fu-upload-form]');
			else :
				echo '<div class="hentry"><h3>You are not permitted to view this content</h3></div>';
			endif; ?>
		</div>
	<?php
	else :
		echo '<div class="hentry"><h3>Please log in to view content</h3></div>';
	endif ?>
<?php get_footer(); ?>