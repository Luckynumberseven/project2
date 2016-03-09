<?php get_header(); ?>
	
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

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
					?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php 					
						$author = get_the_author_id();

						if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) || $author == $user->ID ) :?>

						<?php get_template_part( 'content', get_post_format() ); ?>
						 
						<?php endif ?>
				<?php endwhile; ?>
				<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			<?php flat_hook_archive_bottom(); ?>
	</div>

	<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>