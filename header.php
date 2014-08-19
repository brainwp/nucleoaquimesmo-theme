<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package nucleoaquimesmo-theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic,400italic' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $texto="<script>" . 'document.write(curr_width);' ."</script>";
/*echo $texto;*/
?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
        <div id="wrapper-site-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div><!-- #wrapper-site-navigation -->
		</nav><!-- #site-navigation -->

	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header" role="banner">
	<?php if ( is_post_type_archive( 'projetos' ) ){ ?>
		<div id="thumb-header-projetos">
	<?php } else { ?>
		<div id="thumb-header-projetos" <?php thumbnail_bg( 'header-projetos' ); ?> >
	<?php } ?>

	<div id="wrapper-masthead">
		<div class="site-branding">
				<div id="logo">
				<a class="a-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
				</div><!-- #logo -->
			
			<?php if ( is_single() && is_post_type_archive( 'projetos' ) && 'projetos' == get_post_type() ){ ?>
			<div id="titulo-header-projetos">
				<?php
				//Pega o CPT
				$post_type_obj = get_post_type_object('projetos');
				//Pega o Título do CPT
				$title_projetos = apply_filters('post_type_archive_title', $post_type_obj->labels->name );
				echo "<h2>/" . $title_projetos . "</h2>";
				?>
			</div><!-- #titulo-header-projetos -->
			<?php } ?>

		</div><!-- #site-branding -->
		</div><!-- #wrapper-masthead -->

	</div>
	</header><!-- #masthead -->

<div id="page" class="hfeed site">
    
	<div id="content" class="site-content">
