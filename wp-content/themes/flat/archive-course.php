<?php get_header(); ?>
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

	<?php flat_hook_archive_before(); ?>

	<div id="content" class="site-content" role="main">
		<?php flat_hook_archive_top(); ?>
	<?php $query = new WP_Query( array( 'post_type' => 'course', 'post_parent' => 0 ) ); ?>
	<?php if( $query->have_posts()  ) : ?>
		
		<?php while( $query->have_posts() ) : $query->the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
		<?php flat_hook_archive_bottom(); ?>
	</div>
		<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>