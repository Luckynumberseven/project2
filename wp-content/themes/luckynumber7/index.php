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

?>

<div class="row">
	<div class="col-xs-12 page-content">
		<?php //If user is student, redirects to another landing page
		$user = wp_get_current_user();
		if ( in_array( 'subscriber', (array) $user->roles ) ) {
		    get_template_part('student_landing');
		}
		else {
		?>
		<div class="row">
			<div class="col-xs-9 ">
				<h1>Index.php loopen</h1>

				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<?php
							if( have_posts()) : 
								while( have_posts() ) : the_post();
							?>
									<h1 class="text-center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
										<p><?php the_excerpt() ?></p>
								<?php
								endwhile;		
							else : ?>
								<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php 
							endif; ?>
						</div>
					</div>	
				</div>
			</div>
			<?php
			}//ends else statement
			?>

			<div class="col-xs-3 sidebar-area">
				<?php
				get_sidebar();
				?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<?php
		get_footer();
		?>
	</div>
</div>


		