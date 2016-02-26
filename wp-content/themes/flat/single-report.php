<?php get_header(); ?>


	<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
		<?php
		while ( have_posts() ) : the_post();
			$author = get_the_author_id();
			$user = wp_get_current_user();
			
			//Checks if logged in user has the right role or is the author for this report
			if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles )  || $author == $user->ID) {
				
				get_template_part( 'content', 'single' );

			//Displays navigation for selected roles only.
			if ( in_array( 'editor', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'author', $user->roles )) {

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					) 
				);
			}
			comments_template();
			}
			else {
				echo '
				<div class="hentry">
					<h3>You are not authorized for viewing this content</h3>
				</div>';
			}
		endwhile;
			?>
	</div>
<?php get_footer(); ?>