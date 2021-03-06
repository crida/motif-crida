<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Motif
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?
/***
START MOTIF-CRIDA MODIFICATIONS
***/
?>
<script src="//use.typekit.net/qvh4hjy.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<?
/***
END MOTIF-CRIDA MODIFICATIONS
***/
?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<div class="main-site-branding">
				<?php if ( get_header_image() ) : ?>
				<div class="site-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="header-image-link">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
					</a>
				</div><!-- .header-image -->
				<?php endif; ?>

				<?php motif_the_site_logo(); ?>

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<span><?php bloginfo( 'name' ); ?></span>
					</a>
				</h1>
			</div>

			<div class="secondary-site-branding">
				<ul class="social_bar">
					<li>
						<a class="twitter" target="_blank" href="https://twitter.com/CridaSabadell">
							<span>Segueix-nos a Twitter</span>
						</a>
					</li>
					<li>
						<a class="facebook" target="_blank" href="https://www.facebook.com/CridaPerSabadell">
							<span>Fes m'agrada a Facebook</span>
						</a>
					</li>
					<li>
						<a class="youtube" target="_blank" href="https://www.youtube.com/channel/UC2H4IVQh9ePrrwL1J9iPWWA">
							<span>Subscriu-te a YouTube</span>
						</a>
					</li>

			</div>


		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'motif' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'motif' ); ?>"><?php _e( 'Skip to content', 'motif' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
		<div id="secondary-menu" class="secondary-menu">
			<nav id="secondary-navigation" class="secondary-navigation subordinate-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => false, 'depth' => 1 ) ); ?>
			</nav><!-- #secondary-navigation -->
		</div><!-- #secondary-menu -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
