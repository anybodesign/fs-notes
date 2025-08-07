<?php defined('ABSPATH') or die();
/**
 * FS Notes Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */

// Customizer JS

add_action( 'customize_preview_init', 'fs_customizer_scripts' );
function fs_customizer_scripts() {
	wp_enqueue_script(
		'fs-customizer',
	    	FS_THEME_URL . '/js/customizer.js',
	    	array( 'customize-preview' ), 
	    	false, 
	    	true
	);
}

// Customizer Settings
 
function fs_customize_register($fs_customize) {

	// Title and Description
	// -
	// + + + + + + + + + + 
	
	$fs_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$fs_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $fs_customize->selective_refresh ) ) {
		$fs_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => array('.site-title', '.site-title a'),
			'render_callback' => 'fs_customize_partial_blogname',
		) );
		$fs_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-desc',
			'render_callback' => 'fs_customize_partial_blogdescription',
		) );
	}	 

	// Create Some Sections
	// -
	// + + + + + + + + + + 
	
	$fs_customize->add_section(
		'fs_options_section',
		array(
			'title'			=> __('Theme Options', 'fs-notes'),
			'priority'		=> 20,
		)
	);
	$fs_customize->add_section(
		'fs_blog_section',
		array(
			'title'			=> __('Posts Options', 'fs-notes'),
			'priority'		=> 40,
		)
	);
	
	$fs_customize->add_section(
		'fs_footer_section',
		array(
			'title'			=> __('Footer Options', 'fs-notes'),
			'priority'		=> 40,
		)
	);
/*
	$fs_customize->add_section(
		'fs_fonts_section', 
		array(
			'title' 		=> __('Theme Fonts', 'fs-notes'),
			'description' 	=> __('Choose a font combination for the site.', 'fs-notes'),
			'priority'		=> 40,
		)
	);
*/


	// Colors
	// -
	// + + + + + + + + + + 

		// Primary color
		
		$fs_customize->add_setting(
			'primary_color', 
			array(
				'default'			=> '#FF0055',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'postMessage', 
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Color_control(
				$fs_customize, 
				'primary_color', 
				array(
					'label'			=> __('Contrast color', 'fs-notes'),
					'description'	=> __('Links and buttons color', 'fs-notes'),
					'section'		=> 'colors',
					'settings'		=> 'primary_color',
				)
			)
		);
		
		$fs_customize->add_setting(
			'title_color', 
			array(
				'default'			=> '#23252B',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'postMessage', 
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Color_control(
				$fs_customize, 
				'title_color', 
				array(
					'label'		=> __('Titles color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'title_color',
				)
			)
		);
		
		$fs_customize->add_setting(
			'btn_text_color', 
			array(
				'default'			=> '#23252B',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'postMessage', 
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Color_control(
				$fs_customize, 
				'btn_text_color', 
				array(
					'label'		=> __('Buttons text color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'btn_text_color',
				)
			)
		);
		
		// Page color
		
		$fs_customize->add_setting(
			'page_color', 
			array(
				'default'			=> '#FFFFFF',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'postMessage', 
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Color_control(
				$fs_customize, 
				'page_color', 
				array(
					'label'		=> __('Page color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'page_color',
				)
			)
		);

		// Sidebar color
		
		$fs_customize->add_setting(
			'sidebar_color', 
			array(
				'default'			=> '#FBFF00',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'postMessage', 
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Color_control(
				$fs_customize, 
				'sidebar_color', 
				array(
					'label'		=> __('Sidebar color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'sidebar_color',
				)
			)
		);
		
		// White text
		
		$fs_customize->add_setting(
			'white_text', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'white_text', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('White page text', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'white_text',
			)
		);
		$fs_customize->add_setting(
			'white_sidebar_text', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'white_sidebar_text', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('White sidebar text', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'white_sidebar_text',
			)
		);	
		$fs_customize->add_setting(
			'white_header_text', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'white_header_text', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('White header text', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'white_header_text',
			)
		);
		$fs_customize->add_setting(
			'white_footer_text', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'white_footer_text', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('White footer text', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'white_footer_text',
			)
		);
		$fs_customize->add_setting(
			'white_burger', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'white_burger', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('White burger icon', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'white_burger',
			)
		);		
		
		// Dark Mode
		
		$fs_customize->add_setting(
			'dark_mode', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'dark_mode', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Dark Mode', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'dark_mode',
			)
		);
				
		// Dark social icons
		
		$fs_customize->add_setting(
			'dark_icons', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'dark_icons', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Use dark social icons', 'fs-notes'),
				'section'		=> 'colors',
				'settings'		=> 'dark_icons',
			)
		);
		



	// Site identity
	// -
	// + + + + + + + + + + 

		// Hide site name
		
		$fs_customize->add_setting(
			'hide_sitetitle', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_sitetitle', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the site title', 'fs-notes'),
				'section'		=> 'title_tagline',
				'settings'		=> 'hide_sitetitle',
			)
		);
		
		// Hide tagline
		
		$fs_customize->add_setting(
			'hide_tagline', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_tagline', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the site tagline', 'fs-notes'),
				'section'		=> 'title_tagline',
				'settings'		=> 'hide_tagline',
			)
		);


		// Site logo
		
		$fs_customize->add_setting(
			'site_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'site_logo', 
				array(
					'label'			=> __('Site Logo', 'fs-notes'),
					'description'	=> __('Your logo, displayed instead of the website title.', 'fs-notes'),
					'section'		=> 'title_tagline',
					'settings'		=> 'site_logo',
				)
			)
		);

		// White logo
		
		$fs_customize->add_setting(
			'white_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'white_logo', 
				array(
					'label'			=> __('Dark mode Logo', 'fs-notes'),
					'description'	=> __('Your logo, for the Dark mode.', 'fs-notes'),
					'section'		=> 'title_tagline',
					'settings'		=> 'white_logo',
				)
			)
		);
	
	
	// Footer Options
	// -
	// + + + + + + + + + + 


		// Show Author
		
		$fs_customize->add_setting(
			'display_author', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'display_author', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display Blog Author', 'fs-notes'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'display_author',
			)
		);

		
		// Author custom infos
			
			$fs_customize->add_setting(
				'author_name', 
				array(
					'default'				=> '',
					'transport'				=> 'postMessage',				
					'sanitize_callback'		=> 'sanitize_text_field'
				)
			);
			$fs_customize->add_control(
				'author_name', 
				array(
					'label'			=> __('Author name', 'fs-notes'),
					'section'		=> 'fs_footer_section',
					'settings'		=> 'author_name',
				)
			);

			$fs_customize->add_setting(
				'author_desc', 
				array(
					'default'				=> '',
					'transport'				=> 'postMessage',
					'sanitize_callback'		=> 'sanitize_text_field'
				)
			);
			$fs_customize->add_control(
				'author_desc', 
				array(
					'type'			=> 'textarea',				
					'label'			=> __('Author biography', 'fs-notes'),
					'section'		=> 'fs_footer_section',
					'settings'		=> 'author_desc',
				)
			);
			
			// https://www.sitepoint.com/using-the-wordpress-customizer-media-controls/
			
			$fs_customize->add_setting(
				'author_avatar', 
				array(
				    'sanitize_callback' => 'absint'
				)
			);
			$fs_customize->add_control(
				new WP_Customize_Cropped_Image_Control(
					$fs_customize, 
					'author_avatar', 
					array(
						'label'			=> __('Author Avatar', 'fs-notes'),
					    'flex_width'	=> false, 
					    'flex_height'	=> false,
					    'width'			=> 300,
					    'height'		=> 300,						
						'section'		=> 'fs_footer_section',
						'settings'		=> 'author_avatar',
					)
				)
			);

			// Conditional options
			// https://themehybrid.com/board/topics/conditional-customizer-controls
			
			add_action( 'customize_controls_print_footer_scripts', 'fs_author_customizer_script' );
			
			function fs_author_customizer_script() {
			?>
			<script type="text/javascript">
			jQuery(document).ready(function ($) {
			
				var author_opt = $( '#customize-control-author_name, #customize-control-author_desc, #customize-control-author_avatar' );
				var dark = $( '#customize-control-dark_icons' );
			
				/* on page load, hide or show */
				if( $( '#customize-control-display_author input' ).prop( "checked" ) ){
					author_opt.show();
				}
				else{
					author_opt.hide();
				}
				if( $( '#customize-control-dark_mode input' ).prop( "checked" ) ){
					dark.hide();
				}
				else{
					dark.show();
				}
		
				/* on change, hide or show  */
				$( '#customize-control-display_author input' ).change(function(){
					if( $(this).prop("checked") ) {
						author_opt.show();
					} else {
						author_opt.hide();
					}
				});
				
				$( '#customize-control-dark_mode input' ).change(function(){
					if( $(this).prop("checked") ) {
						dark.hide();
					} else {
						dark.show();
					}
				});
			});
			</script>
			<?php
			}
		
				
		// Footer text
		
		$fs_customize->add_setting(
			'footer_text', 
			array(
				'default'				=> '',
				'transport'				=> 'postMessage',				
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$fs_customize->add_control(
			'footer_text', 
			array(
				'label'			=> __('Custom footer text', 'fs-notes'),
				'description'	=> __('Add a custom text instead of the year and blog name.', 'fs-notes'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'footer_text',
			)
		);
		
		
		// WP Credits
		
		$fs_customize->add_setting(
			'display_wp', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',				
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'display_wp', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display WordPress Link', 'fs-notes'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'display_wp',
			)
		);


	// Theme Options
	// -
	// + + + + + + + + + + 
		
		// Back to top
	
		$fs_customize->add_setting(
			'back2top', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'back2top', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Back to top button', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'back2top',
			)
		);
		
		// IAS
	
		$fs_customize->add_setting(
			'ias', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'ias', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Infinite scroll (trigger on click)', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'ias',
			)
		);
		
		// Notebook
	
		$fs_customize->add_setting(
			'spiral', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'spiral', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display the sketchbook spiral', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'spiral',
			)
		);
		
		$fs_customize->add_setting(
			'lines', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'lines', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display the sketchbook lines', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'lines',
			)
		);
		


	// Posts Options
	// -
	// + + + + + + + + + + 

		// Post metas
		
		$fs_customize->add_setting(
			'meta_author', 
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'meta_author', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Show the author in post meta', 'fs-notes'),
				'section'		=> 'fs_blog_section',
				'settings'		=> 'meta_author',
			)
		);
		$fs_customize->add_setting(
			'meta_category', 
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'meta_category', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Show the category in post meta', 'fs-notes'),
				'section'		=> 'fs_blog_section',
				'settings'		=> 'meta_category',
			)
		);
		
		// Sharing 
		
		$fs_customize->add_setting(
			'share_box', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'share_box', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Add basic social networks sharing buttons on single posts (Facebook, Twitter, LinkedIn, e-mail)', 'fs-notes'),
				'section'		=> 'fs_blog_section',
				'settings'		=> 'share_box',
			)
		);
		$fs_customize->add_setting(
			'share_text', 
			array(
				'default'				=> __('Share this post','fs-notes'),
				'transport'				=> 'postMessage',				
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$fs_customize->add_control(
			'share_text', 
			array(
				'label'			=> __('Custom sharing title', 'fs-notes'),
				'section'		=> 'fs_blog_section',
				'settings'		=> 'share_text',
			)
		);

}
add_action('customize_register', 'fs_customize_register');


// Callbacks + Sanitize

function fs_customize_partial_blogname() {
	bloginfo( 'name' );
}
function fs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}


// Customizer Colors Output

function fs_colors() { ?>

	<?php if ( get_theme_mod('dark_mode') != true ) { ?>
	<style>
		:root {
			--primary_color: <?php echo get_theme_mod('primary_color', '#FF0055'); ?>; 
			--title_color: <?php echo get_theme_mod('title_color', '#23252B'); ?>;
			--sidebar_color: <?php echo get_theme_mod('sidebar_color', '#FBFF00'); ?>;
			--page_color: <?php echo get_theme_mod('page_color', '#FFFFFF'); ?>;
			--btn_text_color: <?php echo get_theme_mod('btn_text_color', '#23252B'); ?>;
		}
	</style>
	<?php } else { ?>
	<style>
		:root {
			--primary_color: <?php echo get_theme_mod('primary_color', '#FF0055'); ?>;
		}
	</style>
	<?php } ?>
<?php }
add_action('wp_head','fs_colors');
