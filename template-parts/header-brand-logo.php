<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the Logo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>
					<?php if ( get_theme_mod('white_logo') && get_theme_mod('dark_mode') ) { ?>
					<img class="logo white-logo" src="<?php echo(get_theme_mod('white_logo', 'none')); ?>" alt="">
					<?php } else if ( get_theme_mod('site_logo') ) { ?>
					<img class="logo" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="">
					<?php } ?>
					<span<?php if (get_theme_mod( 'hide_sitetitle' )) { echo ' class="screen-reader-text"'; } ?>>
					<?php echo esc_url( bloginfo('name') ); ?>
					</span>