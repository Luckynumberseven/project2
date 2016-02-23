<?php get_header() ?>

<?php

$query = new WP_Query( array( 'post_parent' => 0 ) );

if( $query->have_posts()) : ?>
	<h1 class="title"> Courses: </h1>

<?php while( $query->have_posts() ) : $query->the_post(); ?>

	<h2 class=""><?php the_title(); ?></h2>
	
	<p class="">Publicerad av <?php the_author() ?> <?php the_time("Y:m:d H:m") ?></p>

	<?php
	endwhile;	
	wp_reset_postdata();
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