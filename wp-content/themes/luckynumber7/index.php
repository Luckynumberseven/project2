<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();

		if( have_posts()) : 
			while( have_posts() ) : the_post();
		?>
				<h1><?php the_title(); ?></h1>
					<?php the_content() ?>
			<?php
			endwhile;		
		else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php 
		endif; 

$courses = new WP_query(['post_type' => 'course']);

if( $courses->have_posts() ) :
		while($courses->have_posts() ) : $courses->the_post();
		?>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					<?php the_content() ?>
			<?php
			endwhile;	
else :
	Echo 'No posts';
endif;	

get_sidebar();
get_footer();
		?>