<?php
$user_id = get_current_user_id();

global $current_user;
get_currentuserinfo();
?>
<?php //Get user group info, store group names in array
	$groups_user = new Groups_User( get_current_user_id() );
	$user_groups = $groups_user->groups;

	foreach ($user_groups as $group ) {
		$groups_name[] = $group->name;
	}?>

<?php flat_hook_index_before(); ?>
<div id="content" class="site-content hentry" role="main">
	<?php flat_hook_index_top(); ?>
	<header class="entry-header">
		<h2 class="entry-title" itemprop="name"> Välkommen <?php echo $current_user->display_name ?></h2>
	</header>

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

	<div class="entry-content hentry">

		Användarnamn: <?php echo $current_user->user_login ?> <br>
		Email: <?php echo $current_user->user_email; ?> <br>
		Förnamn: <?php echo $current_user->user_firstname; ?> <br>
		Efternamn: <?php echo $current_user->user_lastname; ?> <br>
		Om mig: <?php echo $current_user->description; ?> <br>
		Twitter: <?php echo $current_user->twitter; ?><br>
		Facebook: <?php echo $current_user->facebook; ?> <br>
		Google+: <?php echo $current_user->gplus; ?> <br>
		Telefonnummer: <?php echo $current_user->phone; ?> <br>

		<form method="post" action="/edit-user/">
			<input type="submit" class="button" value="Ändra dina uppgifter">
		</form>
	</div>
</div>

<div class="entry-content hentry" itemprop="articleBody">
	<h1>Lämna en studie rapport</h1>

	<?php		
		echo'	
			<form method="post" name="front_end" action="" >
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
				<input type="hidden" name="author" value="'.$user_id.'" />
				<input type="submit" />
			</form>';
	?>

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
		Echo 'No posts';
	endif;	
	?>
	<?php flat_hook_index_bottom(); ?>
</div>
<div class="entry-content hentry" itemprop="articleBody">
	<?php $plan = new WP_query(['post_type' => 'plan', 'author' => $user_id]);
	if( $plan->have_posts() ) : $plan->the_post(); ?>
		<h1><a href='<?php the_permalink(); ?>'>Min studieplan</a></h1>
	<?php else : ?>
	<h1>Lämna din studieplan</h1>
	<p>Varje elev i utbildningen ska ha en individuell studieplan. Det är den som är verktyget för att planera elevens utbildning. Planen ska innehålla uppgifter om elevens mål och omfattning av studierna.</p>

			
			
			
			<form action="/" method="post">
				<?php echo
		        '<textarea cols="75" rows="15" name="plan" placeholder="Dina mål..." required></textarea><br>
				<input type="hidden" name="action" value="plan" />
				<input type="hidden" name="author" value="'.$user_id.'" />
				<input type="hidden" name="author_nickname" value="'.$current_user->user_login.'" />
				<input type="submit" />
		    </form>';
		    ?>
	
	<?php
	endif;	
	?>
	<?php flat_hook_index_bottom(); ?>
</div>
	<?php flat_hook_index_after(); ?>
<?php get_footer(); ?>
