<?php get_header(); ?>
			<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );

				$query = new WP_Query( array( 'post_type' => 'course','post_parent' => $post->ID ) );
				
				if( $query->have_posts() ) :

					while( $query->have_posts() ) : $query->the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
				comments_template();
				endif;
			endwhile;
			?>
			</div>
<?php get_footer(); ?>