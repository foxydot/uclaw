<?php

/**
 * @file template.php
 */

/**** Preprocessing ****/

function matlock_preprocess_page(&$vars, $hook) {
	// Typekit Reference
	drupal_add_js('//use.typekit.net/joq3zvd.js');
	drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
	  
    if (isset($vars['node'])) {
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
	

  
} // matlock_preprocess()

function matlock_preprocess_node(&$vars, $hook) {
	// Typekit Reference
	//drupal_add_js('//use.typekit.net/joq3zvd.js');
	//drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
	  
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

function preprocess_home_page($ret = object){
	return preprocess_homepage($ret);
}

function preprocess_landing_page($ret = object){
	return preprocess_landingpage($ret);
}

function preprocess_news_home_page($ret = object){
	return preprocess_newshomepage($ret);
}

function preprocess_homepage($ret = object) {
	$node = $ret->node;
	$lang = $node->language;

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
	$ret->content['awards'] = explode("\n", get_text_value($node->field_awards,	$lang));
	$ret->content['links'] = get_array_values($node->field_links,				$lang);
	
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
     
     /*if ($node->nid) {
        switch ($node->type){
            case 'audio':  
                //get audio node info          
                $content[] = array(
                    'nid'				=> $node->nid,
                    'type'				=> $node->type,
                    'title' 			=> $node->title,
                     'thumbnail_url' 	=> $node->user_audio[0]['thumb_url'],
                    'type_img'			=> base_path() . drupal_get_path('module', 'front_page_content') . '/images/sound.png',
                    );
                break; 
              }
        }*/

		$vars['info'] = date('n/d/Y', $vars['result']['date']);
       
       //creating new variable and assign the value to it
        $vars['search_custom_content'] = $content;
    //getting the search keyword
    $vars['search_keyword'] = arg(2);
 
} // matlock_preprocess_search_result()

/* Needed?
function matlock_preprocess_calendar_datebox(&$vars) {
  $date = $vars['date'];
  $view = $vars['view'];
  $day_path = calendar_granularity_path($view, 'day');
  $vars['url'] = 'events/' . $date;
  $vars['link'] = !empty($day_path) ? l($vars['day'], $vars['url']) : $vars['day'];
}*/

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
	//print_r($element);
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}
	$output = l((($element['#original_link']['depth'] == 1) ? '<i class="icon-double-angle-right"></i> ' : NULL) . $element['#title'], $element['#href'], array_merge($element['#localized_options'], array('html' => TRUE)));
	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
} // matlock_menu_link()

// Override 'menu nav' classes from bootstrap
function matlock_menu_tree(&$variables) {
	return '<ul class="menu">' . $variables['tree'] . '</ul>';
}

function matlock_breadcrumb($bcs) {
	
	if (!empty($bcs['breadcrumb'])) {

		$bcrumb = '<li>' . implode(' <span class="divider">/</span></li>', $bcs['breadcrumb']) . ' <span class="divider">/</span> </li>';
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