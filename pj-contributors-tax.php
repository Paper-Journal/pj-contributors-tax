<?php
// Plugin Name:			Paper Journal Contributors
// Plugin URI:			https://github.com/jclwilson/pj-contributors-tax
// Description:			Lets you add contributors to posts, requires the Advanced Custom Fields (ACF) plugin to be installed.
// Version:				1.0.0
// Author:				Jacob Charles Wilson
// Author URI:			https://jacobcharleswilson.com
// License:				GNU General Public License v2
// License URI:			http://www.gnu.org/licenses/gpl-2.0.html
// Text Domain:			pj-contributors-tax
// GitHub Plugin URI:	https://github.com/jclwilson/pj-contributors-tax

//hook into the init action and call create_contributors_taxonomy when it fires
 
function create_contributors_taxonomy() {

// Labels part for the GUI

$labels = array(
    'name' => _x( 'Contributors', 'taxonomy general name' ),
    'singular_name' => _x( 'Contributor', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Contributors' ),
    'popular_items' => __( 'Popular Contributors' ),
    'all_items' => __( 'All Contributors' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Contributor' ), 
    'update_item' => __( 'Update Contributor' ),
    'add_new_item' => __( 'Add New Contributor' ),
    'new_item_name' => __( 'New Contributor Name' ),
    'separate_items_with_commas' => __( 'Separate contributors with commas' ),
    'add_or_remove_items' => __( 'Add or remove contributors' ),
    'choose_from_most_used' => __( 'Choose from the most used contributors' ),
    'menu_name' => __( 'Contributors' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('contributor','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
	'public' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'contributor' ),
   	'show_in_nav_menus'     => true,
  ));
}
add_action( 'init', 'create_contributors_taxonomy', 0 );

?>
