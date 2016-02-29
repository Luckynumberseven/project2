<?php get_header(); ?>
			<div id="content" class="site-content hentry" role="main" itemscope itemtype="http://schema.org/Article">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );

				if ( !get_post_meta($post->ID, 'deadline', true) ) :

					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'flat' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'flat' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'flat' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'flat' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				endif;

				if ( ! get_post_meta($post->ID, 'deadline', true) ) :
					comments_template();
				endif;
			endwhile;
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
				[/fu-upload-form]');?>
			</div>

<?php get_footer(); ?>