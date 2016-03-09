<?php get_header(); ?>

<?php
if ( is_user_logged_in() ): ?>
<h1 class="page-title" itemprop="name"> Studieplan för <?php echo $current_user->display_name ?></h1>
	<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
		<?php
		while ( have_posts() ) : the_post();
			$author = get_the_author_id();
			$user = wp_get_current_user();
			
			//Checks if logged in user has the right role or is the author for this report
			if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles )  || $author == $user->ID) {
				get_template_part( 'content', 'single' );
				
			//Displays navigation for selected roles only.
			if ( in_array( 'editor', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'author', $user->roles )) {

			}
			comments_template();
			}
			else {
				echo '
				<div class="hentry">
					<h3>You are not authorized for viewing this content</h3>
				</div>';
			}
		endwhile;
			?>
	</div>
<?php 
else:
	echo '<div class="hentry">
			<h3>Please log in to view content</h3>
		</div>';
endif ?>
<?php get_footer(); ?>