<?php flat_hook_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php flat_hook_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Custom Fonts -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<?php wp_head(); ?>
	<?php flat_hook_head_bottom(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php flat_hook_body_top(); ?>
<div id="page">
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div id="secondary" class="col-lg-3">
				<?php flat_hook_header_before(); ?>
				<header id="masthead" class="site-header" role="banner">
					<?php flat_hook_header_top(); ?>
					<div class="hgroup">
						<?php flat_logo(); ?>
					</div>
					<button type="button" class="btn btn-link hidden-lg toggle-sidebar" data-toggle="offcanvas" aria-label="Sidebar"><?php _e( '<i class="fa fa-gear"></i>', 'flat' ); ?></button>
					<button type="button" class="btn btn-link hidden-lg toggle-navigation" aria-label="Navigation Menu"><?php _e( '<i class="fa fa-bars"></i>', 'flat' ); ?></button>

					<?php 
					if( is_user_logged_in() == TRUE ) :
						$user = wp_get_current_user();
						if ( in_array('administrator', $user->roles ) ): ?>
							<nav id="site-navigation" class="navigation main-navigation" role="navigation">
								<ul class="nav-menu">
									<li><a href="/wp-admin">Dashboard</a></li>
								</ul>
							</nav>
						<?php 
						endif ?>

						<nav id="site-navigation" class="navigation main-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container' => false ) ); ?>
							<!-- fulhack på utlogning! -->
							<ul class="nav-menu">
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-108">
									<a href="<?php echo wp_logout_url(); ?>">Logga ut</a>
								</li>
							</ul>
						</nav>
					<?php
					else :?>
						<nav id="site-navigation" class="navigation main-navigation" role="navigation">
							<!-- <ul class="nav-menu">
								<li><a href="/">Home</a></li>
								<li><a href="">Log In</a></li>
							</ul> -->
							<div class="widget sidebar-login-form">
								<?php echo wp_login_form() ?>
								<?php do_action( 'wordpress_social_login' ); ?>
							</div>
						</nav>
					<?php
					endif ?>

					<?php flat_hook_header_bottom(); ?>
				</header>
				<?php flat_hook_header_after(); ?>

				<div class="sidebar-offcanvas">
<?php get_sidebar(); ?>
				</div>
			</div>

			<?php flat_hook_content_before(); ?>
			<div id="primary" class="content-area col-lg-9" itemprop="mainContentOfPage">
				<?php flat_hook_content_top(); ?>