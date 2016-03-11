<?php get_header(); ?>
<?php $user_id = get_current_user_id(); ?>

	<?php if( is_user_logged_in() ) : ?>	
		<h1 class="page-title" itemprop="name">Studieplan för <?php echo $current_user->display_name ?></h1>
			<?php flat_hook_archive_before(); ?>

			<div id="content" class="site-content" role="main">

				<div class="entry-content">
					<?php flat_hook_entry_top() ?>

					<?php $plan = new WP_query(['post_type' => 'plan', 'author' => $user_id]);
					if( $plan->have_posts() ) : $plan->the_post();?>
					
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<p>Posted: <?php the_time("Y:m:d H:m") ?></p>
						<?php	
					else : ?>
						<h1>Lämna din studieplan</h1>
						<p>Varje elev i utbildningen ska ha en individuell studieplan. Det är den som är verktyget för att planera elevens utbildning. Planen ska innehålla uppgifter om elevens mål och omfattning av studierna.</p>
						
						<form method="post" action="" >
							<textarea cols="75" rows="15" name="plan" placeholder="Dina mål..." required></textarea><br>
							<input type="hidden" name="action" value="plan" />
							<input type="hidden" name="author" value="<?php echo $user_id ?>" />
							<input type="hidden" name="author_nickname" value="<?php echo $current_user->user_login ?>" />
							<input type="submit" />
						</form>
					<?php 
					endif;?>
					<?php flat_hook_entry_bottom() ?>
				</div>
			</div>
		<?php else : ?>
			<div id="content" class="site-content hentry" role="main">
				<p>Please log in to view content</p>
			</div>
		<?php endif ?>
	<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>