<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

					<div id="comments" class="comments-area">

					<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"><?php _e('Comments', 'fs-notes'); ?></h3>
				
						<ol class="comment-list">
							<?php
								wp_list_comments( array(
								    'callback' => 'fs_custom_comments',
								));
							?>
						</ol>
						
						<div>
							<?php paginate_comments_links(); ?>
						</div>
				
					<?php endif;?>
				
					<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
						<p class="no-comments"><?php _e( 'Comments are closed.', 'fs-notes' ); ?></p>
					<?php endif; ?>
					
					<?php
					$comments_args = array(
				       	//'comment_notes_after' => 'fs-notes',
				        //'logged_in_as' => 'fs-notes',
				        'title_reply' => __('Leave a comment', 'fs-notes'),
				        'label_submit' => __('Add my comment', 'fs-notes')
					);
					
					comment_form($comments_args);
					?>
				
				</div>