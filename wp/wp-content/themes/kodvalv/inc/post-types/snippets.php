<?php
add_action('init', function() {
	register_post_type('snippet', [
		'label' => __('Snippets', 'kodvalv'),
		'public' => true,
		'menu_icon' => 'dashicons-editor-code',
		'supports' => ['title'],
		'show_in_rest' => false,
		'taxonomies' => ['language', 'tag'],
		'labels' => [
			'singular_name' => __('Snippet', 'kodvalv'),
			'add_new_item' => __('Add new snippet', 'kodvalv'),
			'add_new' => __('New snippet', 'kodvalv'),
			'new_item' => __('New snippet', 'kodvalv'),
			'view_item' => __('View snippet', 'kodvalv'),
			'not_found' => __('No snippets found', 'kodvalv'),
			'not_found_in_trash' => __('No snippets found in trash', 'kodvalv'),
			'all_items' => __('All snippets', 'kodvalv'),
			'insert_into_item' => __('Insert into snippet', 'kodvalv')
		],		
	]);
 
	register_taxonomy('language', ['snippet'], [
		'label' => __('Languages', 'kodvalv'),
		'hierarchical' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Language', 'kodvalv'),
			'all_items' => __('All Languages', 'kodvalv'),
			'edit_item' => __('Edit Language', 'kodvalv'),
			'view_item' => __('View Language', 'kodvalv'),
			'update_item' => __('Update Language', 'kodvalv'),
			'add_new_item' => __('Add New Language', 'kodvalv'),
			'new_item_name' => __('New Language Name', 'kodvalv'),
			'search_items' => __('Search Languages', 'kodvalv'),
			'parent_item' => __('Parent Language', 'kodvalv'),
			'parent_item_colon' => __('Parent Language:', 'kodvalv'),
			'not_found' => __('No Languages found', 'kodvalv'),
		]
	]);
	register_taxonomy_for_object_type('language', 'snippet');
 
	register_taxonomy('tag', ['snippet'], [
		'label' => __('Tags', 'kodvalv'),
		'hierarchical' => false,
		'show_admin_column' => true,
		'labels' => [
			'singular_name' => __('Tag', 'kodvalv'),
			'all_items' => __('All Tags', 'kodvalv'),
			'edit_item' => __('Edit Tag', 'kodvalv'),
			'view_item' => __('View Tag', 'kodvalv'),
			'update_item' => __('Update Tag', 'kodvalv'),
			'add_new_item' => __('Add New Tag', 'kodvalv'),
			'new_item_name' => __('New Tag Name', 'kodvalv'),
			'search_items' => __('Search Tags', 'kodvalv'),
			'popular_items' => __('Popular Tags', 'kodvalv'),
			'separate_items_with_commas' => __('Separate tags with comma', 'kodvalv'),
			'choose_from_most_used' => __('Choose from most used Tags', 'kodvalv'),
			'not_found' => __('No Tags found', 'kodvalv'),
		]
	]);
	register_taxonomy_for_object_type('tag', 'snippet');
});