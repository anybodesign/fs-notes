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
				'primary_color', 
				array(
					'label'		=> __('Primary color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'primary_color',
				)
			)
		);
		
		$fs_customize->add_setting(
			'text_color', 
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
				'text_color', 
				array(
					'label'		=> __('Text color', 'fs-notes'),
					'section'	=> 'colors',
					'settings'	=> 'text_color',
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

	
	// Footer Options
	// -
	// + + + + + + + + + + 


		// Show Author
		
		$fs_customize->add_setting(
			'display_author', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',				
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
		
		// Sketchbook
	
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
		
		// Tags & Formats
		
		$fs_customize->add_setting(
			'use_tags', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'use_tags', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Enable Tags', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'use_tags',
			)
		);
		
		$fs_customize->add_setting(
			'use_formats', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'use_formats', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Enable Post Formats', 'fs-notes'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'use_formats',
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

function fs_colors() {
	?>
	<style>
		:root {
			--primary_color: <?php echo get_theme_mod('primary_color', '#23252B'); ?>; 
			--page_color: <?php echo get_theme_mod('page_color', '#FFF'); ?>;
			--sidebar_color: <?php echo get_theme_mod('page_color', '#FBFF00'); ?>;
			--text_color: <?php echo get_theme_mod('text_color', '#23252B'); ?>;
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
