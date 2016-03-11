<?php get_header(); ?>
<?php $user_id = get_current_user_id(); ?>

	<?php if( is_user_logged_in() ) : ?>	
		<h1 class="page-title" itemprop="name">Studierapport för <?php echo $current_user->display_name ?></h1>
			<?php flat_hook_archive_before(); ?>

			<div id="content" class="site-content" role="main">
				<div class="entry-content">
					<?php flat_hook_entry_top ?>

					<h1>Lämna din studie rapport</h1>
					
					<form method="post" name="front_end" action="">
						<input type="text" name="title" placeholder="Vecka..." required/><br>
						<label><b>Vad har du gjort den senaste tiden?</b></label>
						<textarea cols="75" rows="15" name="question_1" required></textarea><br>
						<label><b>Vad ska du göra den kommande veckan?</b></label>
						<textarea cols="75" rows="15" name="question_2" required></textarea><br>
						<label><b>Ser du några hinder i dina studier?</b></label>
						<textarea cols="75" rows="15" name="question_3" required></textarea><br>
						<label><b>Hur mycket har du lärt dig den här veckan?</b></label><br>
						<input type="radio" name="rate" value="inget"> Jag har inte lärt mig någonting<br>
					  	<input type="radio" name="rate" value="lite"> Jag har lärt mig lite<br>
					  	<input type="radio" name="rate" value="ganska_mycket"> Jag har lärt mig ganska mycket<br>
					  	<input type="radio" name="rate" value="mycket"> Jag har lärt mig mycket<br>
					  	<input type="radio" name="rate" value="valdigt_mycket"> Jag har lärt mig väldigt mycket<br><br>
						<input type="hidden" name="action" value="report" />
						<input type="hidden" name="post_author" value="<?php $user_id ?>" />
						<input type="submit" />
					</form>
					<hr>
					<h1>Tidigare rapporter</h1>
					<?php
					$reports = new WP_query(['post_type' => 'report', 'author' => $user_id]);

					if( $reports->have_posts() ) :
						while($reports->have_posts() ) : $reports->the_post();
						?>
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<p>Posted: <?php the_time("Y:m:d H:m") ?></p>
						<?php
						endwhile;	
					else :
						echo 'No posts';
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