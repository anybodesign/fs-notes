<?php if ( !defined('ABSPATH') ) die(); 
	$id = get_the_id();
?>

						<div class="share-box">
							<p>
								<?php echo esc_html( get_theme_mod('share_text', __('Share post', 'fs-notes') ) ); ?>
							</p>
							
							<ul class="share-items">
								<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on Facebook', 'fs-notes'); ?>" href="https://www.facebook.com/sharer/sharer.php?t=<?php the_title(); ?>&amp;u=<?php the_permalink(); ?>">
									<img src="<?php echo FS_THEME_URL; ?>/img/icon/facebook.svg" alt="Facebook">
								</a></li>
								<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on Twitter', 'fs-notes'); ?>" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>">
									<img src="<?php echo FS_THEME_URL; ?>/img/icon/twitter.svg" alt="Twitter">
								</a></li>
								<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on LinkedIn', 'fs-notes'); ?>" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo fs_share_excerpt(124, $id); ?>&source=<?php echo esc_html(bloginfo('name')); ?>">
									<img src="<?php echo FS_THEME_URL; ?>/img/icon/linkedin.svg" alt="LinkedIn">
								</a></li>
								<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share by e-mail', 'fs-notes'); ?>" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php echo fs_share_excerpt(124, $id); ?> %0D%0D <?php the_permalink(); ?>">
									<img src="<?php echo FS_THEME_URL; ?>/img/icon/email.svg" alt="E-mail">
								</a></li>
							</ul>
						</div>