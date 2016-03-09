<?php get_header(); ?>
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

	<?php if( is_user_logged_in() ) : ?>	

			<?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ); ?>
					</div>
					<div class="author-description">
						<h4><?php printf( __( 'About %s', 'flat' ), get_the_author() ); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php flat_hook_archive_before(); ?>

			<div id="content" class="site-content" role="main">
				<?php flat_hook_archive_top(); ?>

				<?php if ( have_posts() ) : 
						$user = wp_get_current_user();
						while ( have_posts() ) : the_post(); 					
							$author = get_the_author_id();

							//Shows all courses if logged in has permitted role or is author of report
							if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) || $author == $user->ID ) :
								get_template_part( 'content', get_post_format() ); 
							 
							endif;
						endwhile; ?>

					<?php/* the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); */?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				<?php flat_hook_archive_bottom(); ?>
			</div>
		<?php else : ?>
			<div id="content" class="site-content hentry" role="main">
				<p>Please log in to view content</p>
			</div>
		<?php endif ?>

	<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>