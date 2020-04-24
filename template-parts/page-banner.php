<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>
					<?php if ( '' != get_the_post_thumbnail() ) { ?>
					<div class="page-banner">
						<?php the_post_thumbnail('banner'); ?>
					</div>
					<?php } ?>					