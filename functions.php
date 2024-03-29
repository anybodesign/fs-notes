<?php if ( !defined('ABSPATH') ) die();
	
define( 'FS_THEME_VERSION', '1.6' );
define( 'FS_THEME_DIR', get_template_directory() );
define( 'FS_THEME_URL', get_template_directory_uri() );
	

// ------------------------
// Theme Setup
// ------------------------

if ( ! isset( $content_width ) )
	$content_width = 2048;


if ( ! function_exists( 'fs_setup' ) ) :

function fs_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'fs-notes', FS_THEME_DIR . '/languages' );
	
	
	// Theme Support
	
	add_editor_style( array('css/editor-style.css') );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	add_theme_support( 'customize-selective-refresh-widgets' );

	if ( get_theme_mod('use_formats') == true ) {
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		));
	}

	// https://codex.wordpress.org/Custom_Backgrounds
	
	add_theme_support( 'custom-background', array(
		'default-color'          => 'E3DFC0',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
	    'default-position-y'     => 'top',
	    'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	));


/*	

	// https://codex.wordpress.org/Theme_Logo

	add_theme_support( 'custom-logo', array(
		'height'      => '',
		'width'       => '',
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-desc' ),
	));	
	
	// https://codex.wordpress.org/Custom_Headers
	
	add_theme_support( 'custom-header', array(
		'default-image'          => get_template_directory_uri() . '/img/header.jpg',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	));

*/



	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	
	add_theme_support( 'editor-color-palette', array(
	    
	    // Raw colors 
	    
	    array(
	        'name' => esc_html__( 'Black', 'fs-notes' ),
	        'slug' => 'black',
	        'color' => '#23252B',
	    ),
	    array(
	        'name' => esc_html__( 'White', 'fs-notes' ),
	        'slug' => 'white',
	        'color' => '#fff',
	    ),

	    // Customizer colors
	    
	    array(
	        'name' => esc_html__( 'Primary color', 'fs-notes' ),
	        'slug' => 'primary-color',
	        'color' => get_theme_mod('primary_color', '#FF0055'),
	    ),
	    array(
	        'name' => esc_html__( 'Titles color', 'fs-notes' ),
	        'slug' => 'title-color',
	        'color' => get_theme_mod('title_color', '#23252B'),
	    ),
	    array(
	        'name' => esc_html__( 'Page color', 'fs-notes' ),
	        'slug' => 'page-color',
	        'color' => get_theme_mod('page_color', '#fff'),
	    ),
	    array(
	        'name' => esc_html__( 'Sidebar color', 'fs-notes' ),
	        'slug' => 'sidebar-color',
	        'color' => get_theme_mod('sidebar_color', '#FBFF00'),
	    ),
	    array(
	        'name' => esc_html__( 'Background color', 'fs-notes' ),
	        'slug' => 'bg-color',
	        'color' => '#'.get_background_color(),
	    ),
	    
	    
	));	
	
	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' => __( 'Small', 'fs-notes' ),
	        'shortName' => __( 'S', 'fs-notes' ),
	        'size' => 14,
	        'slug' => 'small'
	    ),
	    array(
	        'name' => __( 'Large', 'fs-notes' ),
	        'shortName' => __( 'L', 'fs-notes' ),
	        'size' => 22,
	        'slug' => 'large'
	    ),
	));
	
	add_theme_support( 'disable-custom-font-sizes' );
	
	add_theme_support( 'responsive-embeds' );

}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Disable Tags

if ( get_theme_mod('use_tags') != true ) {
	function fs_unregister_tags(){
		register_taxonomy( 'post_tag', array() );
	}
	add_action('init', 'fs_unregister_tags');
}

// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'fs_block_editor_styles',
    	FS_THEME_URL .'/css/block-editor-style.css', 
    	false, 
    	FS_THEME_VERSION, 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );


//	Admin style and script

add_action('admin_print_styles', 'fs_acf_admin_css', 11 );
function fs_acf_admin_css() {
	wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
}

// WordPress no bloody admin mail notice and no bloody fullscreen

add_filter('admin_email_check_interval', '__return_false');

if (is_admin()) {
	function fs_disable_bloody_fullscreen() {
		$script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
		wp_add_inline_script( 'wp-blocks', $script );
	}
	add_action( 'enqueue_block_editor_assets', 'fs_disable_bloody_fullscreen' );
}



// ------------------------
// Enqueue JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {

		// Register JS 
		
			// IAS
			
			wp_register_script(
				'ias', 
				FS_THEME_URL . '/js/infinite-ajax-scroll.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			wp_register_script(
				'ias-fs-init', 
				FS_THEME_URL . '/js/infinite-ajax-scroll-init.js', 
				array('ias'), 
				FS_THEME_VERSION, 
				true
			);
			
			// Other stuff
			
			wp_register_script(
				'back2top', 
				FS_THEME_URL . '/js/back2top.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			wp_register_script(
				'focus-visible', 
				FS_THEME_URL . '/js/focus-visible.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			wp_register_script(
				'skiplink-focus-fix', 
				FS_THEME_URL . '/js/skip-link-focus-fix.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);	
			
			// Main
			
		    wp_register_script( 
		    	'main', 
		    	FS_THEME_URL . '/js/main.js',
		    	array('jquery'), 
		    	FS_THEME_VERSION, 
		    	true
		    );			
			
			
			
		// Enqueue JS
			
			wp_enqueue_script( 'jquery' );			
			
			if ( get_theme_mod('ias') == true ) {
				$has_pages = get_the_posts_pagination();
				if (! empty( $has_pages) ) {
					if ( is_home() || is_archive() || is_search() || is_tax() ) {
						wp_enqueue_script( 'ias' );
						wp_enqueue_script( 'ias-fs-init' );
					}
				}
			}
			
			if ( get_theme_mod('back2top') == true ) {
				wp_enqueue_script( 'back2top');
			}
		    
		    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
			
			wp_enqueue_script( 'focus-visible' );
			wp_enqueue_script( 'skiplink-focus-fix' );
			wp_enqueue_script( 'main' );
			
		
		// CSS

			// Main stylesheet
			
			wp_enqueue_style( 
				'fs-notes-style', 
				get_stylesheet_uri(), 
				array(), 
				FS_THEME_VERSION, 
				'screen'
			);

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Register Navigation Menus

function fs_custom_nav_menus() {

	$locations = array(
		'main_menu' =>  esc_html__( 'Main Menu', 'fs-notes' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'fs-notes' ),
		'copyright_menu' => esc_html__( 'Copyright Menu', 'fs-notes' ),
		'social_menu' => esc_html__( 'Social Networks Menu', 'fs-notes' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );


// Nav tag for widget menus

function fs_modify_nav_menu_args( $args ) {

	if( empty ( $args['theme_location'] ) ) {
		$args['container'] = 'nav';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'fs_modify_nav_menu_args' );


// Extended Search

include_once( FS_THEME_DIR . '/inc/fs-extended-search.php' );


// Excerpts lenght

function fs_custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt_length', 999 );


// Excerpt link

function fs_excerpt_more( $more ) {
    return sprintf( '… <a class="read-more" href="%1$s" rel="nofollow">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'fs-notes' )
    );
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );

// Custom excerpt
// https://gist.github.com/samjbmason/4050714

function fs_share_excerpt($count, $post_id){
  $permalink = get_permalink($post_id);
  $excerpt = get_post($post_id);
  $excerpt = $excerpt->post_content;
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

  $excerpt = $excerpt.'...';
  return $excerpt;
}

// Image Sizes

add_image_size( 'thumbnail-hd', 320, 320, true );
add_image_size( 'medium-hd', 640, 640, false );
add_image_size( 'large-hd', 2048, 2048, false );
add_image_size( 'banner', 1260, 520, true );

function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-hd'	=> __( 'Thumbnail HD', 'fs-blog' ),
        'medium-hd'		=> __( 'Medium HD', 'fs-blog' ),
        'large-hd'		=> __( 'Large HD', 'fs-blog' ),
        'banner'			=> __( 'Banner', 'fs-blog' ),
    ) );
}
add_filter( 'image_size_names_choose', 'fs_custom_sizes' );


// Background image

function fs_bg_img() {
	
	if ( '' != get_the_post_thumbnail() ) {
		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
		$bg = ' style="background-image: url('.$img_url[0].')"';
	} else {
		$bg = null;	
	}
	
	echo $bg;
}

// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Sidebar Widgets', 'fs-notes' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
}
add_action( 'widgets_init', 'fs_widgets_init' );


// Tinymce class

function fs_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'fs_mce_buttons_2');

function fs_tiny_formats($init_array) {

    $style_formats = array(

        array(
            'title' => __( 'Text intro', 'fs-notes' ),
            'selector' => 'p',
            'classes' => 'text-intro',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Text mentions', 'fs-notes' ),
            'selector' => 'p',
            'classes' => 'text-mentions',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Action button', 'fs-notes' ),
            'selector' => 'a',
            'classes' => 'action-btn',
        )
    );
    
    // Filter
    $style_formats = apply_filters( 'fs_tiny_formats', $style_formats ); 
    
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;

}
add_filter('tiny_mce_before_init', 'fs_tiny_formats');


// Custom search form

function fs_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="search" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );


// Custom comment HTML

function fs_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			
			<div class="comment-header">
				<div class="comment-author-avatar">
					<?php
						echo get_avatar( $comment, 180 );
					?>
				</div>
				<div class="comment-author-title">
					<?php 
						printf( '<span class="comment-author-name">%s</span>', get_comment_author_link() );
					?>
					<div class="comment-date">
						<?php 
							printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
							);
						?>
					</div>
				</div>
			</div>

			<div class="comment-content">
				
				<div class="comment-author-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="pending"><?php _e('Your comment is awaiting moderation.') ?></em>
					<?php endif; ?>
					
					<?php comment_text(); ?>
				</div>
			</div>

			<div class="reply">
				<p>
					<?php comment_reply_link( array_merge($args, array(
					    'reply_text' => __('Reply'),
					    'depth'      => $depth,
					    'max_depth'  => $args['max_depth']
					    )
					)); ?>
				</p>
			</div>
			<?php edit_comment_link( __( 'Edit' ), '<p class="edit-link">', '</p>' ); ?>

		</article>
		
<?php }


// ------------------------
// Auto-Updater
// ------------------------

// Remove these lines and dependencies for your theme

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/fs-notes',
	__FILE__,
	'fs-notes'
);
$myUpdateChecker->setBranch('master');