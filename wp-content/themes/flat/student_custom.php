<?php
$user_id = get_current_user_id();

global $current_user;
get_currentuserinfo();
?>
	<div id="content" class="site-content hentry" role="main">
		<header class="entry-header">
			<h1 class="entry-title" itemprop="name"> Ändra dina Personuppgifter: </h1>
		</header>

		<form method="post" id="adduser" action="<?php the_permalink(); ?>">
			<p class="form-username">
                <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
            </p><!-- .form-username -->
            <p class="form-username">
                <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
            </p><!-- .form-username -->
            <p class="form-email">
                <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
            </p><!-- .form-email -->
            <p class="form-textarea">
                <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
                <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
            </p><!-- .form-textarea -->
            <p class="form-phone">
            	<label for="phonenumber"><?php _e('Phone number', 'profile') ?></label>
            	<input class="text-input" name="phone-number" type="text" id="phone-number" value="<?php the_author_meta('phone', $current_user->ID ); ?>" />
            </p> <!-- .form.phone -->

            <?php 
                //action hook for plugin and extra fields
                do_action('edit_user_profile',$current_user); 
            ?>

            <p class="form-submit">	
                <?php echo $referer; ?>
                <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                <?php wp_nonce_field( 'update-user' ) ?>
                <input name="action" type="hidden" id="action" value="update-user" />
            </p><!-- .form-submit -->

		</form>

	</div>
