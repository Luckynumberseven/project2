<?php get_header(); ?>
	<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">

	<?php
		the_post();
		get_template_part( 'content', 'single' );
		$query = new WP_Query( array( 'post_type' => 'course','post_parent' => $post->ID ) );

		if( $query->have_posts() ) :
		?>
			<div class="entry-content hentry" itemprop="articleBody">
				<h4 class="entry-title">Kursens delmoment</h4>
				<hr>
				<ul>
				<?php
				while( $query->have_posts() ) : $query->the_post();?>
					<?php flat_hook_entry_top(); ?>
					<li><h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4></li>
					<?php flat_hook_entry_bottom();  
			endwhile; ?>
			</ul>
			</div>
			<?
		endif;
		wp_reset_postdata();
	?>

	<?php comments_template(); ?>

	</div>
<?php get_footer(); ?>