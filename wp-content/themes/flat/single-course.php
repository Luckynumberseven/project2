<?php get_header(); ?>
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
<?php 
if ( is_user_logged_in() ): ?>
	<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
		<?php
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

		if ( $permitted ) :
			the_post();
			get_template_part( 'content', 'single' );
			$query = new WP_Query( array( 'post_type' => 'course','post_parent' => $post->ID ) );
				if( $query->have_posts() ) : ?>
					<div class="entry-content hentry" itemprop="articleBody">
						<h4 class="entry-title">Kursens delmoment</h4>
						<hr>
						<ul>
							<?php
							while( $query->have_posts() ) : $query->the_post();?>
								<?php flat_hook_entry_top(); ?>
								<li><h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4></li>
								<?php flat_hook_entry_bottom();  
							endwhile; ?>
						</ul>
					</div>
					<?php
				endif;?>
			<?php
			wp_reset_postdata();
			comments_template();
		else :
			echo '<div class="entry-content hentry" itemprop="articleBody">
			 		<h3>You are not permitted to view this content</h3>
			 	</div>';
		endif
		?>
	</div>
<?php
else : 
	$categories = get_the_category();
		foreach($categories as $category) {
			if ( $category->name == 'Public Course' ) {
				$permitted = TRUE;
			}
		}
	if( $permitted ) {
		the_post();
				get_template_part( 'content', 'single' );
				$query = new WP_Query( array( 'post_type' => 'course', 'post_parent' => $post->ID ) );
					if( $query->have_posts() ) :
					?>
						<div class="entry-content hentry" itemprop="articleBody">
							<h4 class="entry-title">Kursens delmoment</h4>
							<hr>
							<ul>
								<?php
								while( $query->have_posts() ) : $query->the_post();?>
									<?php flat_hook_entry_top(); ?>
									<li><h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4></li>
									<?php flat_hook_entry_bottom();  
								endwhile; ?>
							</ul>
						</div>
						<?php
					endif;?>
				<?php
				wp_reset_postdata();
				comments_template();
	}
	else {
		echo '<div class="entry-content hentry" itemprop="articleBody">
			 		<h3>Du måste vara inloggad för att se detta innehåll</h3>
			 	</div>';
	}
endif; ?>
<?php get_footer(); ?>