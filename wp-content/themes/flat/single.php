<?php get_header(); ?>
			<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );
				comments_template();
			endwhile;
			?>
			</div>
<?php get_footer(); ?>



