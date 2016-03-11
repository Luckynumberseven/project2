<?php get_header(); 

if( is_user_logged_in() ) : ?>

	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

	<?php flat_hook_archive_before(); ?>

	<div id="content" class="site-content" role="main">
		<?php flat_hook_archive_top(); ?>

	<?php if ( have_posts() ) : ?>

		<?php
			$user = wp_get_current_user();
		//Get user groups, store in array
			$groups_user = new Groups_User( get_current_user_id() );
			$user_groups = $groups_user->groups;

			foreach ($user_groups as $group ) {
					$groups_name[] = $group->name;
			}?>
		
		<?php while ( have_posts() ) : the_post();
			//Shows all assignments if logged in has permitted role 
			if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) ) : ?>
					<div class="hentry">
						<h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
						<?php the_excerpt() ?>
					</div>
		<?php else :
				//If not permitted by role: Get post categories, compare to user groups, print accordingly
					$categories = get_the_category();
					foreach($categories as $category) {
							if ( in_array( $category->name, $groups_name ) ) {?>
								<div class="hentry">
									<h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
									<?php the_excerpt() ?>
								</div>
						<?php	}
						}
				endif?>			
		<?php endwhile; ?>

		<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
		<?php flat_hook_archive_bottom(); ?>
	</div>
<?php
else:
	echo '<div class="hentry">
			<h3>Please log in to view content</h3>
		</div>';
endif ?>

	<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>