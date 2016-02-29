<?php get_header(); ?>
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

	<?php flat_hook_archive_before(); ?>

	<div id="content" class="site-content" role="main">
		<?php flat_hook_archive_top(); ?>
	<?php $query = new WP_Query( array( 'post_type' => 'course', 'post_parent' => 0 ) ); ?>
	
	<?php if( $query->have_posts()  ) : ?>
			<?php $user = wp_get_current_user();?>
		
		<?php while( $query->have_posts() ) : $query->the_post(); ?>

			<?php if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) ) :
						get_template_part( 'content', get_post_format() );
				else : ?>
					<?php //Get user groups, store in array
					$groups_user = new Groups_User( get_current_user_id() );
					$user_groups = $groups_user->groups;

					foreach ($user_groups as $group ) {
						$groups_name[] = $group->name;
					}

					//Get post categories, compare to user groups, print accordingly
					$categories = get_the_category();
					foreach($categories as $category) {
							if ( in_array( $category->name, $groups_name ) ) {
								get_template_part( 'content', get_post_format() );
							}
						}
				endif?>
			<?php ?>

			<?php// get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
		<?php flat_hook_archive_bottom(); ?>
	</div>
		<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>