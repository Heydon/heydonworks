<?php
/**
 * The header for our theme.
 *
 * @package heydonworks
 */
?><!DOCTYPE html>
<!--[if IE 7]>     <html class="ie ie7 lt-ie8 lt-ie9" dir="ltr"
lang="en-GB"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lt-ie9" dir="ltr" lang="en-GB">
<![endif]-->
<!--[if IE 9]>     <html class="ie ie9" dir="ltr" lang="en-GB"> <![endif]-->
<!--[if gt IE 9]>  <html dir="ltr" lang="en-GB"> <![endif]-->
<!--[if !IE]><!--> <html dir="ltr" lang="en-GB"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="favico.png" type="image/png" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="<?php bloginfo( 'stylesheet_directory' ); ?>js/html5shiv.js" media="all"></script>
		<script src="<?php bloginfo( 'stylesheet_directory' ); ?>js/html5shiv-printshiv.js" media="print"></script>
		<script src="<?php bloginfo( 'stylesheet_directory' ); ?>js/selectivizr-min.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,400italic,700' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
		<a href="#main">skip to content</a>
				<nav role="navigation" aria-label="site links">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
				<main role="main" id="main">

