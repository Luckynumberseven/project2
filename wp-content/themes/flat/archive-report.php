<?php get_header(); ?>
	<?php// the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php //the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

	<?php if( is_user_logged_in() ) : ?>	
			
			<!-- används ej, ta bort?

			<?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ); ?>
					</div>
					<div class="author-description">
						<h4><?php printf( __( 'About %s', 'flat' ), get_the_author() ); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			<?php endif; ?>
			-->

			<?php flat_hook_archive_before(); ?>

			<div id="content" class="site-content" role="main">

				<div class="entry-content">
					<?php flat_hook_entry_top ?>

					<h1>Lämna en studie rapport</h1>
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
							<input type="hidden" name="author" value="<?php $user_id ?>" />
							<input type="submit" />
						</form>

					<!-- onödig efter mergen ?

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
					endif;	
					?> 
					-->

					<?php flat_hook_entry_bottom ?>
				</div>

				<?php flat_hook_archive_top(); ?>

				<?php if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 					
							$user = wp_get_current_user();
							$author = get_the_author_id();

							//Shows all courses if logged in has permitted role or is author of report
							if ( in_array( 'school_administrator', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'teacher', $user->roles ) || $author == $user->ID ) :
								get_template_part( 'content', get_post_format() ); 
							 
							endif;
						endwhile; ?>

					<?php/* the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); */?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				<?php flat_hook_archive_bottom(); ?>
			</div>
		<?php else : ?>
			<div id="content" class="site-content hentry" role="main">
				<p>Please log in to view content</p>
			</div>
		<?php endif ?>

	<?php flat_hook_archive_after(); ?>
<?php get_footer(); ?>