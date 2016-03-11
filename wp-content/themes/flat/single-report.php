<?php get_header(); ?>

<?php
if ( is_user_logged_in() ): ?>
	<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
		<?php
		while ( have_posts() ) : the_post();
			$author_id = get_the_author_meta( 'ID' );
			$user = wp_get_current_user();

			//Checks if logged in user has the right role or is the author for this report
			if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles )  || $author_id == $user->ID) {
				get_template_part( 'content', 'single' );
				$fields = get_field_objects();
				if( $fields )
				{
					foreach( $fields as $field_name => $field )
					{
						echo '<div>';
							echo '<h3>' . $field['label'] . '</h3>';
							echo $field['value'];
						echo '</div>';
					}
				}
				comments_template();
			}
			else {
				echo '
				<div class="hentry">
					<h3>You are not authorized for viewing this content</h3>
				</div>';
			}
		endwhile;?>
	</div>
<?php 
else:
	echo '<div class="hentry">
			<h3>Please log in to view content</h3>
		</div>';
endif ?>
<?php get_footer(); ?>