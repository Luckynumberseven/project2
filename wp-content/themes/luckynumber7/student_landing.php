

<?php
$user_id = get_current_user_id();
//print_r(get_user_meta($user_id));
global $current_user;
get_currentuserinfo();
?>

<div class="row">
	<div class="col-xs-9">
		<h1>Welcome <?php echo $current_user->display_name ?></h1>

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

<h1>Submit student report</h1>

<?php		
	echo'	
		<form method="post" name="front_end" action="" >
			<input type="text" name="title" placeholder="Report Title..." /><br>
			<textarea cols="75" rows="15" name="content" placeholder="Report Content..."></textarea>
			<input type="submit">
			<input type="hidden" name="action" value="report" />
			<input type="hidden" name="author" value="'.$user_id.'" />

		</form>';
?>

<h1>Previous reports</h1>
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
	</div><!--col-->
