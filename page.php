<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<?php get_template_part( 'template-parts/page', 'content' ); ?>
				
<?php get_footer(); ?>