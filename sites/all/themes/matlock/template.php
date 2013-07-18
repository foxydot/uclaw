<?php

/**
 * @file template.php
 */

function matlock_preprocess_page(&$vars, $hook) {
	// Typekit Reference
	drupal_add_js('//use.typekit.net/joq3zvd.js');
	drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
	  
	  
	$vars['content'] = array('text');
    if (isset($vars['node'])) {
        $node = $vars['node'];
    } elseif (arg(0) == 'node' && is_numeric(arg(1)) && arg(2) !== 'edit') {
        $node = node_load(arg(1));
    }
    
	$pre_function = 'preprocess_' . $node->type;
	
	$ret = new stdClass;
		$ret->node = $node;
		$ret->vars = $vars;
		$ret->content = array();
	
	if (function_exists($pre_function)) {
		$ret = call_user_func($pre_function, $ret);
	}
	
	$vars['content'] = $ret->content;
} // matlock_preprocess_html()


function blank_first($i = 0, $underscore = TRUE) {
	// For machine_names of something_something, something_something_2, something_something_3...
	if ($i == 1) {
		return '';
	} else {
		return (($underscore == TRUE) ? '_' : NULL) . $i;
	}
} // blank_first()


/* UTILITY FUNCTIONS */
function get_text_value($item = array()) {
	return $item['und'][0]['value'];
} // get_link()

function get_url($item = array()) {
	return $item['und'][0]['url'];
} // get_url()

function get_image_url($item = array()) {
	return file_create_url($item['und'][0]['uri']);
} // get_link()

function preprocess_home_page($ret = object) {
	$node = $ret->node;
	//print_r($node);
	$ret->content['banners'] = array();
	
	for ($i = 1; (!empty($node->{'field_feature_image' . blank_first($i)})); $i++) {
		$ret->content['banners'][$i]['image'] = get_image_url($node->{'field_feature_image' . blank_first($i)});
		$ret->content['banners'][$i]['title'] = get_text_value($node->{'field_feature_title' . blank_first($i)});
		$ret->content['banners'][$i]['caption'] = get_text_value($node->{'field_feature_caption' . blank_first($i)});
		$ret->content['banners'][$i]['link'] = get_url($node->{'field_feature_link' . blank_first($i)});
	}
	
	return $ret;
	
} // preprocess_home_page()

// Add arrows to menus
function matlock_menu_link(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';
	
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}
	$output = l('<i class="icon-double-angle-right"></i> ' . $element['#title'], $element['#href'], array_merge($element['#localized_options'], array('html' => TRUE)));
	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
} // matlock_menu_link()


