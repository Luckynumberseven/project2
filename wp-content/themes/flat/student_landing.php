<?php
$user_id = get_current_user_id();

global $current_user;
get_currentuserinfo();
 //Get user group info, store group names in array
$groups_user = new Groups_User( get_current_user_id() );
$user_groups = $groups_user->groups;

	foreach ($user_groups as $group ) {
		$groups_name[] = $group->name;
	}?>

	<h1 class="page-title" itemprop="name"> Välkommen <?php echo $current_user->display_name ?></h1>

		<?php flat_hook_entry_before(); ?>

		<div class="entry-content" itemprop="articleBody">
	
				<?php flat_hook_entry_top(); ?>

				<header class="entry-header hentry">
					<h2 class="entry-title" itemprop="name"> <?php echo $group->name; ?> </h2>
				</header>

				<div class="author-info bio">
					<div class="author-avatar floatleft">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 100 ) ); ?>
					</div>
					<div class="floatleft margin-left-10">
							<h5><?php echo $current_user->user_firstname," ", $current_user->user_lastname; ?></h5>
							<?php echo $current_user->user_email; ?><br>
							<?php echo $current_user->phone; ?>
					</div>
					<div class="author-description clear">
						<p class="about">
							<h4><?php printf( __( 'Om %s', 'flat' ), $current_user->display_name ); ?></h4>
							<p><?php echo $current_user->description; ?></p>
						
							<form method="post" action="/edit-user/">
								<input type="submit" class="button" value="Ändra dina uppgifter" />
							</form>
						</p>
					</div>
				</div>


			<div class="bio">
				<h2>Senaste inlägg från din lärare:</h2>
				<?php if ( have_posts() ) : ?> <!-- the loop -->
					<?php while ( have_posts() ) : the_post(); ?>
						


						<?php //Get post categories, compare to user groups, print accordingly
						$categories = get_the_category();

						foreach($categories as $category) {
							if ( in_array( $category->name, $groups_name ) ) {?>
							<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>

							<?php }
							}?>

					<?php endwhile; ?>
				<?php endif ?>
			</div>

			<div class="">
				<?php $plan = new WP_query(['post_type' => 'plan', 'author' => $user_id]);
				if( $plan->have_posts() ) : $plan->the_post(); ?>
					<h1><a href='<?php the_permalink(); ?>'>Min studieplan</a></h1>
				<?php else : ?>
				<h2>Lämna din studieplan</h2>
				<p>Varje elev i utbildningen ska ha en individuell studieplan. Det är den som är verktyget för att planera elevens utbildning. Planen ska innehålla uppgifter om elevens mål och omfattning av studierna.</p>
				<p>
					<form method="post" name="front_end" action="" >
						<textarea cols="75" rows="15" name="plan" placeholder="Dina mål..." required></textarea><br>
						<input type="hidden" name="action" value="plan" />
						<input type="hidden" name="author" value="<?php echo $user_id ?>" />
						<input type="hidden" name="author_nickname" value="<?php echo $current_user->user_login ?>" />
						<input type="submit" />
					</form>
				</p>
				<?php endif;?>
			</div>
			<?php flat_hook_entry_bottom(); ?>
		</div>
	<?php flat_hook_entry_after(); ?>




