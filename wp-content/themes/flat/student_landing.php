<?php
$user_id = get_current_user_id();

global $current_user;
get_currentuserinfo();
?>

<?php flat_hook_index_before(); ?>
<div id="content" class="site-content hentry" role="main">
	<?php flat_hook_index_top(); ?>
	<header class="entry-header">
		<h1 class="entry-title" itemprop="name"> Welcome <?php echo $current_user->display_name ?></h1>
	</header>


	<?php
		
		      echo 'Username: ' . $current_user->user_login . "<br>";
		      echo 'User email: ' . $current_user->user_email . "<br>";
		      echo 'User level: ' . $current_user->user_level . "<br>";
		      echo 'User first name: ' . $current_user->user_firstname . "<br>";
		      echo 'User last name: ' . $current_user->user_lastname . "<br>";
		      echo 'User display name: ' . $current_user->display_name . "<br>";
		      echo 'User ID: ' . $current_user->ID . "<br>";
		      echo 'User Twitter: ' . $current_user->twitter . "<br>";
		      echo 'User Facebook: ' . $current_user->facebook . "<br>";
		      echo 'User Google+: ' . $current_user->gplus . "<br>";
/*		      echo get_the_author_meta('twitter', $user_id);
		      echo get_the_author_meta('facebook', $user_id);
		      echo get_the_author_meta('gplus', $user_id);
*/
?>
</div>
<div class="entry-content hentry" itemprop="articleBody">
	<h1>Lämna en studie rapport</h1>
	<p>Din studierapport ska besvara: Vad har du gjort den senaste tiden? Vad ska du göra den kommande veckan? Ser du några hinder i dina studier?</p>

	<?php		
		echo'	
			<form method="post" name="front_end" action="" >
				<input type="text" name="title" placeholder="Report Title..." /><br>
				<textarea cols="75" rows="15" name="content" placeholder="Report Content..."></textarea>
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
	<?php flat_hook_index_after(); ?>
<?php get_footer(); ?>
