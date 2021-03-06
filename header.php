<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
 	if ( get_theme_mod('dark_mode') == true ) {
		$dark = ' class="dark-mode"';
	} else {
		$dark = null;
	}
?><!DOCTYPE html>
<html <?php language_attributes(); echo $dark; ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="wrapper">

	<?php 
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
	?>
	
	<header role="banner" id="site_head" class="site-header<?php if ( get_theme_mod('white_header_text') == true ) { echo ' white-text'; } ?>">
		<div class="row inner">
			
			<?php 
				get_template_part('template-parts/header', 'brand'); 
			?>
			<?php 
				if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
					get_template_part('template-parts/header', 'nav');
				}
			?>

		</div>
	</header>

<?php 
	$lines = get_theme_mod('lines');
	$spiral = get_theme_mod('spiral');
	
	if ( is_active_sidebar( 'widgets_area1' ) && is_home() 
		 || is_active_sidebar( 'widgets_area1' ) && is_single()
		 || is_active_sidebar( 'widgets_area1' ) && is_search()
		 || is_active_sidebar( 'widgets_area1' ) && is_archive() ) {
		$sidebar = ' has-sidebar';
	} else {
		$sidebar = null;
	}
?>

		<main class="content-area<?php if ($lines == true) { echo ' has-lines'; } if ($spiral == true) { echo ' has-spiral'; } ?>" role="main" id="site_main">
			
			<div class="page-wrap<?php echo $sidebar; ?>">
				
				<?php if ( $sidebar ) { ?>
				<button id="menu_toggle" type="button"<?php if ( get_theme_mod('white_burger') == true ) { echo ' class="white-burger"'; } ?>><?php _e('Menu', 'fs-notes'); ?><span></span></button>
				<?php } ?>