<?php

/*
 * Include Beans. Do not remove the line below.
 */
require_once( get_template_directory() . '/lib/init.php' );

/*
 * Remove this action and callback function if you do not whish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Settings->Beans option. LESS will then be processed on the fly.
 */
add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {

    beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

}

/*
 * Remove this action and callback function if you are not adding CSS in the style.css file
 */
//add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

/*function beans_child_enqueue_assets() {

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

}*/

//Make tagline a bit bigger
beans_remove_attribute( 'beans_site_title_tag', 'class', 'uk-text-small' );

//Add a bit of margin between site title and tagline
beans_add_attribute( 'beans_site_title_tag', 'class', 'uk-margin-small-top' );

//Removed categories below post 
beans_remove_action( 'beans_post_meta_categories' );

// Remove author from meta and move categories in meta above post replacing author
beans_add_smart_action( 'beans_post_meta_items', 'beans_child_post_meta_items' );

function beans_child_post_meta_items( $items ) {

	// Remove author meta
	unset( $items['author'] );

	// Add categories meta
	$items['categories'] = 	20;

	return $items;

}



//ADD ICONS TO POSTS META

// Add post meta item date icon
beans_add_smart_action( 'beans_post_meta_item_date_prepend_markup', 'beans_child_add_post_meta_date_icon' );

function beans_child_add_post_meta_date_icon() {
	echo beans_open_markup( 'beans_child_date_icon', 'i', 'class=uk-icon-clock-o uk-margin-small-right uk-text-muted' );
	echo beans_close_markup( 'beans_child_date_icon', 'i' );
}

//Remove text for categories (only leave the icon)
beans_remove_output( 'beans_post_meta_categories_prefix' );

// Add post meta item categories icon
beans_add_smart_action( 'beans_post_meta_item_categories_prepend_markup', 'beans_child_post_meta_categories_icon' );

function beans_child_post_meta_categories_icon() {

	echo beans_open_markup( 'beans_child_post_meta_categories_icon', 'i', 'class=uk-icon-archive uk-margin-small-right uk-text-muted' );
	echo beans_close_markup( 'beans_child_post_meta_categories_icon', 'i' );

}

// Add post meta item comments icon
beans_add_smart_action( 'beans_post_meta_comments_prepend_markup', 'beans_child_post_meta_comments_icon' );

function beans_child_post_meta_comments_icon() {

	echo beans_open_markup( 'beans_child_post_meta_comments_icon', 'i', 'class=uk-icon-comments-o uk-margin-small-right uk-text-muted' );
	echo beans_close_markup( 'beans_child_post_meta_comments_icon', 'i' );

}

//Add a class to target the post tags in home page
beans_add_attribute( 'beans_post_meta_tags', 'class', 'post-tags' );

//Add UIkit continue reading style button 
beans_add_attribute( 'beans_post_more_link', 'class', 'uk-button' );


//which uikit components are being used?
/*add_action( 'wp_enqueue_scripts', 'print_uikit_components' );

function print_uikit_components() {

	global $_beans_uikit_enqueued_items;

	print_r( $_beans_uikit_enqueued_items );

}*/