<?php get_header(); ?>

	<?php flat_hook_index_before(); ?>
	<div id="content" class="site-content" role="main">
		<?php flat_hook_index_top(); ?>


		<?php
		if( is_user_logged_in() == FALSE) { 
			$pagename = get_query_var('home');  
			if ( !$pagename && $id > 0 ) {  
			    // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
			    $post = $wp_query->get_queried_object();  
			    $pagename = $post->post_name;  
			}
		
		}
		elseif (is_user_logged_in() == TRUE ) { ?>
			<a href="<?php echo wp_logout_url(); ?>"><button>Logout</button></a>
		<?php
		}
		?>

		<?php $user = wp_get_current_user();

		if ( in_array( 'student', (array) $user->roles ) ) {
			//show_admin_bar(FALSE);
		    get_template_part('student_landing');
		}
		
		else {
		?>
			<?php if ( have_posts() ) : ?> <!-- the loop -->

				<?php if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

				<?php else:?>
						<div class="hentry">
							<?php get_template_part('inlogged'); ?>
						</div>
				<?php endif ?>


			<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>	<!-- ends loop -->

		<?php } ?> <!-- ends if/else -->

		<?php flat_hook_index_bottom(); ?>
	</div>
	<?php flat_hook_index_after(); ?>
<?php get_footer(); ?>