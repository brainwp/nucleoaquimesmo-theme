<?php
/**
 * @package Pink Touch 2
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,200,200italic,700,700italic' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class( 'single-feira' ); ?>>
	<div id="wrapper">
		<nav id="site-navigation" class="main-navigation" role="navigation">
        <div id="wrapper-site-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div><!-- #wrapper-site-navigation -->
		</nav><!-- #site-navigation -->

		<div id="header">
			<a href="<?php echo home_url( '/projetos/de-segunda-a-sexta-feira/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <div id="logo-header"></div>
            </a>
		</div><!-- /#header -->

		<div id="content">