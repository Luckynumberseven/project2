<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ); ?></title>

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!--Custom fonts -->
	<link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	<div class="container-fluid">
		<div class="row"><!--main-row-->
			<div class="col-xs-10 col-xs-offset-1"><!--main-col-->
				<div class="row">
					<div class="site-header">
						<!-- If-statements used to check if content is hidden by the theme customizer. If so, the the 'display:none' property is applied -->
						<h1 class="site-title" 
							<?php 
							  	if(get_theme_mod('hide_logo')) :
							  		echo "style="."'display:none;'";
							  	endif
						  	?>>
						  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<div class="text-center custom-head" 
						 	<?php 
							  	if(get_theme_mod('hide_content')) :
							  		echo "style="."'display:none;'";
							  	endif
						  	?>>
								<h1><?php echo get_theme_mod('header_title') ?></h1>
								<p><?php echo get_theme_mod('header_text') ?></p>
						</div>
											
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
							<div class="navbar-header">
						    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
						    	</button>
						    </div>
 
						    <div class="collapse navbar-collapse" id="collapse">
						     	<ul class="nav navbar-nav">
						     	<?php 
						     	/* Gets content for primary menu. Uses items-wrap to remove <ul> tags. Sets fallback to false which will 
						     	allow admin to completely hide the menu by not adding any content to it */
						     	$args = ['theme_location' => 'primary', 'items_wrap' => '%3$s', 'fallback_cb' => false];
									wp_nav_menu($args);

								?>
						      </ul>
						     <ul class="nav navbar-nav navbar-right">
						     <?php
						     	/* Gets content for secondary menu. Uses items-wrap to remove <ul> tags. Sets fallback to false which will 
						     	allow admin to completely hide the menu by not adding any content to it */ 
						     	$args = ['theme_location' => 'secondary', 'items_wrap' => '%3$s', 'fallback_cb' => false];
									wp_nav_menu($args);
								?>
						     </ul>
						      
						     <div class="clearfix"></div>
						    </div><!-- /.navbar-collapse 
						  </div><!-- /.container-fluid -->
						</nav>
					</div><!--.site-header-->
				</div><!--row-->
		