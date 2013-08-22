<?php

/**
 * @file template.php
 */

/**** Preprocessing ****/

function matlock_preprocess_page(&$vars, $hook) {
	// Typekit Reference
	drupal_add_js('//use.typekit.net/joq3zvd.js');
	drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');

	if (!empty($vars['page']['sidebar'])) { $vars['has_sidebar'] = TRUE; $vars['node']->has_sidebar = TRUE; } // one for page, one for nodes
	
	return;
	  
    /*if (isset($vars['node'])) {
        $node = $vars['node'];
    } elseif (arg(0) == 'node' && is_numeric(arg(1)) && arg(2) !== 'edit') {
        $node = node_load(arg(1));
    }
    
    if (!empty($node)) {
    	$vars['theme_hook_suggestions'][] = 'page--'. str_replace('_', '--', $vars['node']->type);
    	if ($node->type != 'home_page') {
    		return;
    	}
		$pre_function = 'preprocess_' . $node->type;
		$ret = new stdClass;
			$ret->node = $node;
			$ret->vars = $vars;
			$ret->content = array();
			
		if (function_exists($pre_function)) {
			$vars['page_content'] = call_user_func($pre_function, $ret);
		}
		
		
	} // !empty $node
	
	*/
  
} // matlock_preprocess()

function matlock_preprocess_node(&$vars, $hook) {
    if (isset($vars['node'])) {
        $node = $vars['node'];
    } elseif (arg(0) == 'node' && is_numeric(arg(1)) && arg(2) !== 'edit') {
        $node = node_load(arg(1));
    }

    if (!empty($node)) {
		$pre_function = 'preprocess_' . $node->type;
		$ret = new stdClass;
			$ret->node = $node;
			$ret->vars = $vars;
			$ret->content = array();
			
		if (function_exists($pre_function)) {
			$vars['page_content'] = call_user_func($pre_function, $ret);
		}
		
		
	} // !empty $node
	
} // matlock_preprocess()


function preprocess_page($ret = object) {
	return preprocess_landing_page($ret);
} // preprocess_page()

function preprocess_home_page($ret = object) {
	return preprocess_homepage($ret);
}

function preprocess_landing_page($ret = object) {
	return preprocess_landingpage($ret);
}

function preprocess_news_home_page($ret = object) {
	return preprocess_newshomepage($ret);
}

function preprocess_news($ret = object) {
	return preprocess_news_item($ret);
}

function preprocess_homepage($ret = object) {
	$node = $ret->node;
	$lang = $node->language;

	//print_r($node);
	
	// Banners
	$ret->content['banners'] = array();
	for ($i = 1; (!empty($node->{'field_feature_img' . blank_first($i)})); $i++) {
		$ret->content['banners'][$i]['image'] = get_image_url($node->{'field_feature_img' . blank_first($i)},			$lang);
		$ret->content['banners'][$i]['title'] = get_text_value($node->{'field_feature_title' . blank_first($i)},		$lang);
		$ret->content['banners'][$i]['caption'] = get_text_value($node->{'field_feature_caption' . blank_first($i)},	$lang);
		$ret->content['banners'][$i]['link'] = get_url($node->{'field_feature_link' . blank_first($i)},					$lang);
	}
	
	// Featured Stories
	$ret->content['features'] = array();
	for ($i = 1; (!empty($node->{'field_feature_' . $i . '_title'})); $i++) {
		$ret->content['features'][$i]['title'] = get_text_value($node->{'field_feature_' . $i . '_title'},			$lang);
		$ret->content['features'][$i]['subtitle'] = get_text_value($node->{'field_feature_' . $i . '_subtitle'},	$lang);
		$ret->content['features'][$i]['image'] = get_image_url($node->{'field_feature_' . $i . '_image'},			$lang);
		$ret->content['features'][$i]['content'] = get_text_value($node->{'field_feature_' . $i . '_content'},		$lang);
		$ret->content['features'][$i]['link'] = get_url($node->{'field_feature_' . $i . '_link'},					$lang);
	}
	
	// Grey Bar features
	$ret->content['grey_features'] = array();
	for ($i = 1; (!empty($node->{'field_grey_bar_feature_' . $i . '_title'})); $i++) {
		$ret->content['grey_features'][$i]['title'] = get_text_value($node->{'field_grey_bar_feature_' . $i . '_title'},			$lang);
		$ret->content['grey_features'][$i]['subhead'] = get_text_value($node->{'field_grey_bar_feature_' . $i . '_subhead'},		$lang);
		$ret->content['grey_features'][$i]['image'] = get_image_url($node->{'field_feature_' . $i . '_image'},						$lang);
		$ret->content['grey_features'][$i]['text'] = get_text_value($node->{'field_grey_bar_feature_' . $i . '_text'},				$lang);
		$ret->content['grey_features'][$i]['link'] = get_url($node->{'field_grey_bar_feature_' . $i . '_link'},						$lang);
	}
	
	
	return $ret->content;
	
} // preprocess_home_page()

function preprocess_landingpage($ret = object) {

	$node = $ret->node;
	$lang = $node->language;
	
	$ret->content['banners'] = array();
	for ($i = 1; (!empty($node->{'field_feature_img' . blank_first($i)})); $i++) {
		$ret->content['banners'][$i]['image'] = get_image_url($node->{'field_feature_img' . blank_first($i)},			$lang);
		$ret->content['banners'][$i]['title'] = get_text_value($node->{'field_feature_title' . blank_first($i)},		$lang);
		$ret->content['banners'][$i]['caption'] = get_text_value($node->{'field_feature_caption' . blank_first($i)},	$lang);
		$ret->content['banners'][$i]['link'] = get_url($node->{'field_feature_link' . blank_first($i)},					$lang);
	}

	// Featured Stories
	$ret->content['features'] = array();
	for ($i = 1; ( (!empty($node->{'field_feature_' . $i . '_title'})) || (!empty($node->{'field_feature_' . $i . '_content'})) ); $i++) {
		$ret->content['features'][$i]['title'] = get_text_value($node->{'field_feature_' . $i . '_title'},			$lang);
		$ret->content['features'][$i]['subtitle'] = get_text_value($node->{'field_feature_' . $i . '_subtitle'},	$lang);
		$ret->content['features'][$i]['image'] = get_image_url($node->{'field_feature_' . $i . '_image'},			$lang);
		$ret->content['features'][$i]['content'] = get_text_value($node->{'field_feature_' . $i . '_content'},		$lang);
		$ret->content['features'][$i]['link'] = get_url($node->{'field_feature_' . $i . '_link'},					$lang);
	}
	
	// Pull from other fields because some things weren't put in the right place
	for ($i = 2; (!empty($node->{'field_feature_img_' . $i})); $i++) {
		$ret->content['features'][]['image'] = get_image_url($node->{'field_feature_img_' . $i},					$lang);
	}
	
	//print_r($node);
	$ret->content['body'] = get_text_value($node->body);
	
	return $ret->content;
} // preprocess_landing_page()

function preprocess_faculty_member($ret = object) {
	$node = $ret->node;
	$lang = $node->language;

	//print_r($node);
	
	$ret->content['firstname'] = get_text_value($node->field_firstname,			$lang);
	$ret->content['lastname'] = $node->title;
	$ret->content['title'] = get_text_value($node->field_staff_title,			$lang);
	$ret->content['education'] = get_text_value($node->field_education,			$lang);
	$ret->content['contact'] = get_array_values($node->field_phone_fax,			$lang);
	$ret->content['email'] = get_text_value($node->field_email,					$lang);
	//$ret->content['facebook'] = get_text_value($node->field_facebook_link,	$lang);
	//$ret->content['twitter'] = get_text_value($node->field_twitter_link,		$lang);
	$ret->content['subjects'] = get_array_values($node->field_subjects,			$lang);
	$ret->content['scholarship'] = get_text_value($node->field_scholarship,		$lang);
	$ret->content['teaching'] = get_text_value($node->field_teaching,			$lang);
	//$ret->content['overview'] = get_text_value($node->field_overview,			$lang);
	$ret->content['news'] = get_text_value($node->field_news,					$lang);
	$ret->content['awards'] = array_filter(explode("\n", trim(get_text_value($node->field_awards,	$lang))));
	$ret->content['links'] = get_array_values($node->field_links,				$lang);
	$ret->content['headshot'] = get_image_url($node->field_headshot,			$lang);

	return $ret->content;
} // preprocess_faculty_member()

function preprocess_event($ret = object) {
	$node = $ret->node;
	$lang = $node->language;

	//ts_data($node);
	
	$ret->content['title'] = $node->title;
	$ret->content['date'] = get_text_value($node->field_datetime,				$lang);
	$ret->content['location'] = get_text_value($node->field_location,			$lang);
	$ret->content['description'] = get_text_value($node->body,					$lang);
	$ret->content['speaker'] = get_text_value($node->field_speaker,				$lang);

	return $ret->content;
} // preprocess_event()

function preprocess_newshomepage($ret = object) {
	$node = $ret->node;
	$lang = $node->language;


	// Banners
	$ret->content['banners'] = array();
	for ($i = 1; (!empty($node->{'field_feature_img' . blank_first($i)})); $i++) {
		$ret->content['banners'][$i]['image'] = get_image_url($node->{'field_feature_img' . blank_first($i)},			$lang);
		$ret->content['banners'][$i]['title'] = get_text_value($node->{'field_feature_title' . blank_first($i)},		$lang);
		$ret->content['banners'][$i]['caption'] = get_text_value($node->{'field_feature_caption' . blank_first($i)},	$lang);
		$ret->content['banners'][$i]['link'] = get_url($node->{'field_link_feature_' . blank_first($i)},					$lang);
	}


	$ret->content['title'] = $node->title;
	
	return $ret->content;
} // preprocess_event()

function preprocess_news_item($ret = object) {
	$node = $ret->node;
	$lang = $node->language;
	$ret->content['date'] = $node->created;
	$ret->content['title'] = $node->title;
	$ret->content['body'] = get_text_value($node->body,	$lang);

	return $ret->content;
} // preprocess_event()


function matlock_preprocess_search_result(&$vars) {
	//print_r($vars);
    //dsm($vars['result']['node']->type);   
    $content = array();
    //print_r($vars);
      //getting default node search result
    $node = $vars['result']['node'];
		$vars['info'] = date('n/d/Y', $vars['result']['date']);
       
       //creating new variable and assign the value to it
        $vars['search_custom_content'] = $content;
    //getting the search keyword
    $vars['search_keyword'] = arg(2);
 
} // matlock_preprocess_search_result()



/**** UTILITY FUNCTIONS ****/

function blank_first($i = 0, $underscore = TRUE) {
	// For machine_names of something_something, something_something_2, something_something_3...
	if ($i == 1) {
		return '';
	} else {
		return (($underscore == TRUE) ? '_' : NULL) . $i;
	}
} // blank_first()

function all_empty() {
	foreach(func_get_args() as $variable) {
		if (!empty($variable)) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
} // all_not_empty()

function get_text_value($item = array(), $lang = 'und') {
	if (!array_key_exists($lang, $item)) { return FALSE; }
	return $item[$lang][0]['value'];
} // get_link()

function get_url($item = array(), $lang = 'und') {
	if (!array_key_exists($lang, $item)) { return FALSE; }
	return $item[$lang][0]['url'];
} // get_url()

function get_image_url($item = array(), $lang = 'und') {
	if (!array_key_exists($lang, $item)) { return FALSE; }
	return file_create_url($item[$lang][0]['uri']);
} // get_link()

function get_array_values($item = array(), $lang = 'und') {
	$ret = array();
	if (!array_key_exists($lang, $item)) { return FALSE; }
	foreach($item[$lang] as $it) {
		$ret[] = $it['value'];
	}
	
	return $ret;
} // get_array_values()


/**** CUSTOMIZATION SHIZ ****/

// Add arrows to menus
function matlock_menu_link(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}
	
	if ($_SERVER['REQUEST_URI'] == parse_url($element['#original_link']['link_path'], PHP_URL_PATH)) {
		$element['#attributes']['class'][] = 'current';
	} else {
		foreach($element['#below'] as $child) {
			if (!empty($child['#original_link']['link_path'])) {
				if ($_SERVER['REQUEST_URI'] == parse_url($child['#original_link']['link_path'], PHP_URL_PATH)) {
					$element['#attributes']['class'][] = 'current';
					break;
				}
			}
		}
	
	}
	
	$output = l(((($element['#original_link']['depth'] == 1) && ($element['#href'] != '<nolink>')) ? '<i class="icon-double-angle-right"></i> ' : NULL) . $element['#title'], $element['#href'], array_merge($element['#localized_options'], array('html' => TRUE)));
	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
} // matlock_menu_link()

// Override 'menu nav' classes from bootstrap
function matlock_menu_tree(&$variables) {
	return '<ul class="menu">' . $variables['tree'] . '</ul>';
}

function matlock_breadcrumb($bcs) {
	if (!empty($bcs['breadcrumb'])) {
		$bcs['breadcrumb'] = array_filter($bcs['breadcrumb']);
		$bcrumb = '<li>' . implode(' <span class="divider">/</span> </li>', $bcs['breadcrumb']) . ' <span class="divider">/</span> </li>';
    	return $bcrumb;
	}

} // matlock_breadcrumb()


/*
 * A useful troubleshooting function. Displays arrays in an easy to follow format in a textarea.
*/
if ( ! function_exists( 'ts_data' ) ) :
function ts_data($data){
	$ret = '<textarea class="troubleshoot" cols="100" rows="20">';
	$ret .= print_r($data,true);
	$ret .= '</textarea>';
	print $ret;
}
endif;
/*
 * A useful troubleshooting function. Dumps variable info in an easy to follow format in a textarea.
*/
if ( ! function_exists( 'ts_var' ) && function_exists( 'ts_data' ) ) :
function ts_var($var){
	ts_data(var_export( $var , true ));
}
endif;