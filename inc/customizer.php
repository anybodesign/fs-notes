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
		$fs_customize->add_setting(
			'btn_text_color', 
			array(
				'default'			=> '#fff',
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
				//'transport'			=> 'postMessage',				
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
			
				/* adv. color option */
				var author_opt = $( '#customize-control-author_name, #customize-control-author_desc, #customize-control-author_avatar' );
			
				/* on page load, hide or show adv. option */
				if( $( '#customize-control-display_author input' ).prop( "checked" ) ){
					author_opt.show();
				}
				else{
					author_opt.hide();
				}
			
				/* on change, hide or show adv. option */
				$( '#customize-control-display_author input' ).change(function(){
					if( $(this).prop("checked") ) {
						author_opt.show();
					} else {
						author_opt.hide();
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
			--title_color: <?php echo get_theme_mod('title_color', '#23252B'); ?>;
			--text_color: <?php echo get_theme_mod('text_color', '#23252B'); ?>;
			--btn_text_color: <?php echo get_theme_mod('btn_text_color', '#FFFFFF'); ?>;
			--sidebar_color: <?php echo get_theme_mod('sidebar_color', '#FBFF00'); ?>;
			--page_color: <?php echo get_theme_mod('page_color', '#FFFFFF'); ?>;
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
