<?php
class FS_CPT {
	
	function __construct() {
	}
	
	
	function init() {
		
		add_action( 'init',                 array( $this, 'cpt_project'), 1 );
		
		add_action( 'init',                 array( $this, 'custom_taxonomy'), 1 );
		
		//add_action( 'pre_get_posts',		array( $this, 'pre_get_posts' ), 1 );

		add_filter( 'enter_title_here',		array( $this, 'change_title_text' ) );

		//add_filter( 'manage_edit-project_columns',				array( $this, 'add_new_columns_project' ) );
		//add_filter( 'manage_project_posts_custom_column',			array( $this, 'manage_columns_project' ) );
	}
	
	/**
	*
	*	Register Custom Post Type
	*
	**/
	
	
	function cpt_project() {

		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'fs-notes' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'fs-notes' ),
			'menu_name'             => __( 'Projects', 'fs-notes' ),
			'name_admin_bar'        => __( 'Project', 'fs-notes' ),
			'archives'              => __( 'Project archives', 'fs-notes' ),
			'attributes'            => __( 'Project attributes', 'fs-notes' ),
			'parent_item_colon'     => __( 'Parent project:', 'fs-notes' ),
			'all_items'             => __( 'All the projects', 'fs-notes' ),
			'add_new_item'          => __( 'Add new project', 'fs-notes' ),
			'add_new'               => __( 'Add New', 'fs-notes' ),
			'new_item'              => __( 'New project', 'fs-notes' ),
			'edit_item'             => __( 'Edit project', 'fs-notes' ),
			'update_item'           => __( 'Update project', 'fs-notes' ),
			'view_item'             => __( 'View project', 'fs-notes' ),
			'view_items'            => __( 'View projects', 'fs-notes' ),
			'search_items'          => __( 'Search project', 'fs-notes' ),
			'not_found'             => __( 'Not found', 'fs-notes' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'fs-notes' ),
			'featured_image'        => __( 'Project picture', 'fs-notes' ),
			'set_featured_image'    => __( 'Set project picture', 'fs-notes' ),
			'remove_featured_image' => __( 'Remove project picture', 'fs-notes' ),
			'use_featured_image'    => __( 'Use as project picture', 'fs-notes' ),
			'insert_into_item'      => __( 'Insert into project', 'fs-notes' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'fs-notes' ),
			'items_list'            => __( 'Projects list', 'fs-notes' ),
			'items_list_navigation' => __( 'Projects list navigation', 'fs-notes' ),
			'filter_items_list'     => __( 'Filter events list', 'fs-notes' ),
		);
		$rewrite = array(
			'slug'                  => 'project',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => false,
		);
		$args = array(
			'label'                 => __( 'Project', 'fs-notes' ),
			'description'           => __( 'Project description', 'fs-notes' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'project_type' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'projects',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'project', $args );

	}
	
	
	function change_title_text( $title ) {
		$screen = get_current_screen();

		if( 'project' == $screen->post_type ) {
			$title = __('Choose a title for this project', 'fs-notes');
		}

		return $title;
	}



/*
	function add_new_columns_publication( $wp_columns ) {
		
		$column_before = array();
		$column_after['visuel'] = 'Visuel';
		
		unset( $wp_columns['date'] );
		
		$wp_columns = array_merge( $column_before, $wp_columns, $column_after );

		return $wp_columns;
	}

	function manage_columns_publication( $column_name ) {
		global $wpdb, $post;

		switch( $column_name ) {
			
			case 'visuel':
				if( has_post_thumbnail( $post->ID ) ){
					echo get_the_post_thumbnail( $post->ID, 'medium' );
				}
				break;

			default:
				break;
		} // end switch
	}
	
*/
	

	// Register Custom Taxonomy
	
	function custom_taxonomy() {
		
		// project_type
		$labels = array(
			'name'                       => _x( 'Projects types', 'Taxonomy General Name', 'fs-notes' ),
			'singular_name'              => _x( 'Project type', 'Taxonomy Singular Name', 'fs-notes' ),
			'menu_name'                  => __( 'Project type', 'fs-notes' ),
			'all_items'                  => __( 'All types', 'fs-notes' ),
			'parent_item'                => __( 'Parent type', 'fs-notes' ),
			'parent_item_colon'          => __( 'Parent type:', 'fs-notes' ),
			'new_item_name'              => __( 'New type name', 'fs-notes' ),
			'add_new_item'               => __( 'Add type Item', 'fs-notes' ),
			'edit_item'                  => __( 'Edit type', 'fs-notes' ),
			'update_item'                => __( 'Update type', 'fs-notes' ),
			'view_item'                  => __( 'View type', 'fs-notes' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'fs-notes' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'fs-notes' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'fs-notes' ),
			'popular_items'              => __( 'Popular types', 'fs-notes' ),
			'search_items'               => __( 'Search types', 'fs-notes' ),
			'not_found'                  => __( 'Not Found', 'fs-notes' ),
			'no_terms'                   => __( 'No types', 'fs-notes' ),
			'items_list'                 => __( 'Types list', 'fs-notes' ),
			'items_list_navigation'      => __( 'Types list navigation', 'fs-notes' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'query_var'                  => 'project-type',
			'show_in_rest'               => true,
		);
		register_taxonomy( 'project_type', array( 'project' ), $args );
		
	}
	
	
}

$fs_cpt = new FS_CPT();
$fs_cpt->init();