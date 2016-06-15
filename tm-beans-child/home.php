<?php
//Make page fullwidth as default layout in home page
//Make page fullwidth as default layout in home page
add_filter( 'beans_layout', 'beans_child_default_home_layout' );

function beans_child_default_home_layout() {
	return 'c';
}

//Adjust the UKIt grid for the index posts page
beans_add_attribute( 'beans_content', 'class', 'uk-grid uk-container-center' );

beans_add_attribute( 'beans_post', 'class', 'uk-width-large-1-3 uk-width-medium-1-2 uk-width-small-1-1' );
beans_add_attribute( 'beans_post_header', 'class', 'post-header' );
beans_add_attribute( 'beans_post_body', 'class', 'post-body' );

//Posts pagination below all the posts 
beans_modify_action_hook( 'beans_posts_pagination', 'beans_content_after_markup' );

//Add a hero section 
beans_add_smart_action( 'beans_header_after_markup', 'beans_child_add_hero' );

function beans_child_add_hero() {
	
	echo beans_open_markup( 'beans_child_hero_section', 'div', array( 'class' => 'uk-block uk-block-large uk-container-center uk-text-center bc-block' ) );
	
	$hero_content = '<h1 class="uk-heading-large">My Beans</h1>';
	$hero_content .= '<p class="uk-article-lead">A demo theme for SitePoint</p>';
	$hero_content .= '<p><a href="#" class="uk-button uk-button-large">Read Article <i class="uk-icon-external-link"></i></a></p>';
		
	echo $hero_content;
		
	echo beans_close_markup( 'beans_child_hero_section', 'div' );
	
}

// Load Beans document.
beans_load_document();
