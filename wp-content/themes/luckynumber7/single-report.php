<?php get_header() ?>
<h1>Single-report.php</h1>
<?php
if( have_posts()) : 
	while( have_posts() ) : the_post();
?>
	<h1 class=""><?php the_title(); ?></h1>
	<p class="">Publicerad av <a href="<?php the_author_link()?>"><?php the_author() ?> </a> <?php the_time("Y:m:d H:m") ?></p>
	<?php the_content() ?>

	<?php
	endwhile;	
		
else : 
?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php 
endif; ?>

<?php get_sidebar(); ?>
<?php get_footer() ?>