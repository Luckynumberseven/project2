<?php get_header() ?>

<?php
if( have_posts()) : 
	while( have_posts() ) : the_post();
?>
	<h1 class=""><?php the_title(); ?></h1>
	<p class="">Publicerad av <?php the_author() ?> <?php the_time("Y:m:d H:m") ?></p>
	<?php the_content() ?>

	<?php
	endwhile;	
else : 
?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php 
endif; ?>

<?php 
	if(!empty(get_the_terms($post->id, 'class', '', ', ', '.'))) :
		the_terms($post->id, 'class', '<h3>Taken by classes:</h3>', ', ', '');
	endif
	?>

<?php get_sidebar(); ?>
<?php get_footer() ?>