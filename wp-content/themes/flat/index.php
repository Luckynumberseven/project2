<?php get_header(); ?>
	<?php flat_hook_index_before(); ?>
	<div id="content" class="site-content" role="main">
		<?php flat_hook_index_top(); ?>

		<?php
		if( is_user_logged_in() ) : ?>
			<a href="<?php echo wp_logout_url(); ?>"><button>Logout</button></a>
			
		<?php
		endif;
		?>
		<?php $user = wp_get_current_user();

		if ( in_array( 'student', (array) $user->roles ) ) {
		    get_template_part('student_landing');
		}
		else {
		?>

<?php $args = array(
    'show_option_all'         => null, // string
    'show_option_none'        => null, // string
    'hide_if_only_one_author' => null, // string
    'orderby'                 => 'display_name',
    'order'                   => 'ASC',
    'include'                 => null, // string
    'exclude'                 => null, // string
    'multi'                   => false,
    'show'                    => 'display_name',
    'echo'                    => true,
    'selected'                => false,
    'include_selected'        => false,
    'name'                    => 'user', // string
    'id'                      => null, // integer
    'class'                   => null, // string 
    'blog_id'                 => $GLOBALS['blog_id'],
    'who'                     => null // string
); ?>
		<?php wp_dropdown_users($args) ?>



			<?php if ( have_posts() ) : ?> <!-- the loop -->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>


			<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>	<!-- ends loop -->

		<?php } ?> <!-- ends if/else -->


		<?php flat_hook_index_bottom(); ?>
	</div>
	<?php flat_hook_index_after(); ?>
<?php get_footer(); ?>