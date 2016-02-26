<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://thomaskjellberg.se
 * @since      1.0.0
 *
 * @package    Group_User_Posttype
 * @subpackage Group_User_Posttype/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    
    <form method="post" name="cleanup_options" action="options.php">
    
        
        
        <!-- load jQuery from CDN -->
        <fieldset>
            
            
                    <fieldset>
                        <p>Give your new group a name</p>
                        <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
                        <input type="url" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" name="<?php echo $this->plugin_name; ?>[cdn_provider]" value=""/>
                    </fieldset>
        </fieldset>

        <?php submit_button('Add new Group', 'primary','submit', TRUE); ?>

    </form>

</div>
