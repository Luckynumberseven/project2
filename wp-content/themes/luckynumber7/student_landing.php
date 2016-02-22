<div class="row">
	<div class="col-xs-9">
		<h1>Student landing.php</h1>

		<?php
		$user_id = get_current_user_id();

		//print_r(get_user_meta($user_id));


		global $current_user;
		      get_currentuserinfo();

		      echo 'Username: ' . $current_user->user_login . "\n";
		      echo 'User email: ' . $current_user->user_email . "\n";
		      echo 'User level: ' . $current_user->user_level . "\n";
		      echo 'User first name: ' . $current_user->user_firstname . "\n";
		      echo 'User last name: ' . $current_user->user_lastname . "\n";
		      echo 'User display name: ' . $current_user->display_name . "\n";
		      echo 'User ID: ' . $current_user->ID . "\n";

		?>
	</div><!--col-->
