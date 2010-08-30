<?php
    
// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('uclaw_rebuild_registry')) {
  drupal_rebuild_theme_registry();
}

// Add Zen Tabs styles
if (theme_get_setting('uclaw_zen_tabs')) {
  drupal_add_css( drupal_get_path('theme', 'uclaw') .'/css/tabs.css', 'theme', 'screen');
}

/*
 *	 This function creates the body classes that are relative to each page
 *	
 *	@param $vars
 *	  A sequential array of variables to pass to the theme template.
 *	@param $hook
 *	  The name of the theme function being called ("page" in this case.)
 */

function uclaw_preprocess_page(&$vars, $hook) {
	if(in_array('page-node-edit',$vars['template_files'])){
		$edit = true;
	} else {
		$edit = false;
	}
  $node = $vars['node'];
  $vars['url'] = explode('/',$node->path);
  	$vars['edit'] = $edit;
  //create variable for node type faculty
  if ($node->type == "faculty") {
	if($node->field_staff_title[0]['value']){ $vars['staff_title'] = $node->field_staff_title[0]['value']; }
	if($node->field_phone_fax[0]['value'] || $node->field_email[0]['value']){ 
  		$vars['contact_info'] = '<h4>Contact Information</h4>';
  		$vars['contact_info'] .= '<ul class="listSquare">';
		if($node->field_phone_fax[0]['value']){ 
			foreach($node->field_phone_fax AS $item){
				$vars['contact_info'] .= '<li><address>'.$item['value'].'</address></li>'; 
			}
		}
	  	if($node->field_email[0]['value']){ 
			foreach($node->field_email AS $item){
				$vars['contact_info'] .= '<li><a href="mailto:'.$item['value'].'">'.$item['value'].'</a></li>'; 
			}
		}
  		$vars['contact_info'] .= '</ul>';
	}
  	if($node->field_education[0]['value']){ 
  		$vars['education'] = '<h4>Education</h4>';
  		$vars['education'] .= '<ul class="listSquare">';
		foreach($node->field_education AS $item){
			$vars['education'] .= '<li>'.$item['value'].'</li>'; 
		}
  		$vars['education'] .= '</ul>';
	}  	
	if($node->field_links[0]['value']){ 
  		$vars['links'] = '<h4>Links</h4>';
  		$vars['links'] .= '<ul class="listSquare">';
		foreach($node->field_links AS $item){
			$linky = explode("|",$item['value']);
			$vars['links'] .= '<li><a href="'.$linky[0].'">'.$linky[1].'</a></li>'; 
		}
  		$vars['links'] .= '</ul>';
	}  	
	if($node->field_subjects[0]['value']){ 
  		$vars['subjects'] = '<h4>Areas of Interest</h4>';
  		$vars['subjects'] .= '<ul class="listSquare">';
		foreach($node->field_subjects AS $item){
			$vars['subjects'] .= '<li>'.$item['value'].'</li>'; 
		}
  		$vars['subjects'] .= '</ul>';
	}
	$vars['image'] = preg_replace('/(class=")(image\s)/','$1grayBorder $2',$node->content['image_attach']['#value']);
	
	//tabs
	$vars['qt_tabs'] = '<li class="qtab-0 active first"><a href="javascript:void(0);" id="quicktabs-tab-0" class="qt_tab active" onclick="qtClick(0);">Overview</a></li>';
	$vars['qt_pages'] = '<div id="quicktabs_tabpage_100_0" class="quicktabs_tabpage">'.$node->content['body']['#value'].'</div>';
	$fields_to_test = array('field_scholarship','field_teaching','field_awards','field_news');
	$my_i = 0;
	if($node->field_scholarship[0]['value']){
		$my_i++;
		$vars['qt_tabs'] .= '<li class="qtab-'.$my_i.'"><a href="javascript:void(0);" id="quicktabs-tab-'.$my_i.'" class="qt_tab" onclick="qtClick('.$my_i.');">Scholarship</a></li>';
		$vars['qt_pages'] .= '<div id="quicktabs_tabpage_100_'.$my_i.'" class="quicktabs_tabpage quicktabs-hide">'.$node->field_scholarship[0]['value'].'</div>';			
	}
	if($node->field_teaching[0]['value']){
		$my_i++;
		$vars['qt_tabs'] .= '<li class="qtab-'.$my_i.'"><a href="javascript:void(0);" id="quicktabs-tab-'.$my_i.'" class="qt_tab" onclick="qtClick('.$my_i.');">Teaching</a></li>';
		$vars['qt_pages'] .= '<div id="quicktabs_tabpage_100_'.$my_i.'" class="quicktabs_tabpage quicktabs-hide">'.$node->field_teaching[0]['value'].'</div>';			
	}
	if($node->field_awards[0]['value']){
		$my_i++;
		$vars['qt_tabs'] .= '<li class="qtab-'.$my_i.'"><a href="javascript:void(0);" id="quicktabs-tab-'.$my_i.'" class="qt_tab" onclick="qtClick('.$my_i.');">Awards</a></li>';
		$vars['qt_pages'] .= '<div id="quicktabs_tabpage_100_'.$my_i.'" class="quicktabs_tabpage quicktabs-hide">'.$node->field_awards[0]['value'].'</div>';			
	}
	if($node->field_news[0]['value']){
		$my_i++;
		$vars['qt_tabs'] .= '<li class="qtab-'.$my_i.'"><a href="javascript:void(0);" id="quicktabs-tab-'.$my_i.'" class="qt_tab" onclick="qtClick('.$my_i.');">News</a></li>';
		$vars['qt_pages'] .= '<div id="quicktabs_tabpage_100_'.$my_i.'" class="quicktabs_tabpage quicktabs-hide">'.$node->field_news[0]['value'].'</div>';			
	}

  } elseif($node->type == 'institute') {
  		//institute specific stuff
  		$vars['sidebar_image'] = $node->field_sb_img[0];
  		$vars['sidebar_text'] = $node->field_sb_text[0]['value'];
  		
    } else {
    	$vars['attachments'] = $node->content['files']['#value'];
    	$vars['content'] = preg_replace("/".preg_quote($vars['attachments'],'/')."/",'',$vars['content']);
    }
  // Don't display empty help from node_help().
  if ($vars['help'] == "<div class=\"help\"><p></p>\n</div>") {
    $vars['help'] = '';
  }

  // Classes for body element. Allows advanced theming based on context
  // (home page, node of certain type, etc.)
  $body_classes = array($vars['body_classes']);
  if (user_access('administer blocks')) {
	  $body_classes[] = 'admin';
	}
	if (theme_get_setting('uclaw_wireframe')) {
    $body_classes[] = 'with-wireframes'; // Optionally add the wireframes style.
  }
  if (!empty($vars['primary_links']) or !empty($vars['secondary_links'])) {
    $body_classes[] = 'with-navigation';
  }
  if (!empty($vars['secondary_links'])) {
    $body_classes[] = 'with-secondary';
  }
  if (module_exists('taxonomy') && $vars['node']->nid) {
    foreach (taxonomy_node_get_terms($vars['node']) as $term) {
    $body_classes[] = 'tax-' . eregi_replace('[^a-z0-9]', '-', $term->name);
    }
  }
  if (!$vars['is_front']) {
    // Add unique classes for each page and website section
    $path = drupal_get_path_alias($_GET['q']);
    list($section, ) = explode('/', $path, 2);
    $body_classes[] = uclaw_id_safe('page-'. $path);
    $body_classes[] = uclaw_id_safe('section-'. $section);

    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        if ($section == 'node') {
          array_pop($body_classes); // Remove 'section-node'
        }
        $body_classes[] = 'section-node-add'; // Add 'section-node-add'
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        if ($section == 'node') {
          array_pop($body_classes); // Remove 'section-node'
        }
        $body_classes[] = 'section-node-'. arg(2); // Add 'section-node-edit' or 'section-node-delete'
      }
    }
  }
  /*  // Check what the user's browser is and add it as a body class
      // DEACTIVATED - Only works if page cache is deactivated
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
      if($user_agent) {
        if (strpos($user_agent, 'MSIE')) {
          $body_classes[] = 'browser-ie';
        } else if (strpos($user_agent, 'MSIE 6.0')) {
          $body_classes[] = 'browser-ie6';
        } else if (strpos($user_agent, 'MSIE 7.0')) {
          $body_classes[] = 'browser-ie7';
        } else if (strpos($user_agent, 'MSIE 8.0')) {
          $body_classes[] = 'browser-ie8'; 
        } else if (strpos($user_agent, 'Firefox/2')) {
          $body_classes[] = 'browser-firefox2';
        } else if (strpos($user_agent, 'Firefox/3')) {
          $body_classes[] = 'browser-firefox3';
        }else if (strpos($user_agent, 'Safari')) {
          $body_classes[] = 'browser-safari';
        } else if (strpos($user_agent, 'Opera')) {
          $body_classes[] = 'browser-opera';
        }
      }
  
  /* Add template suggestions based on content type
   * You can use a different page template depending on the
   * content type or the node ID
   * For example, if you wish to have a different page template
   * for the story content type, just create a page template called
   * page-type-story.tpl.php
   * For a specific node, use the node ID in the name of the page template
   * like this : page-node-22.tpl.php (if the node ID is 22)
   */
  
  if ($vars['node']->type != "") {
      $vars['template_files'][] = "page-type-" . $vars['node']->type;
    }
  if ($vars['node']->nid != "") {
      $vars['template_files'][] = "page-node-" . $vars['node']->nid;
    }
  $vars['body_classes'] = implode(' ', $body_classes); // Concatenate with spaces
}

/*
 *	 This function creates the NODES classes, like 'node-unpublished' for nodes
 *	 that are not published, or 'node-mine' for node posted by the connected user...
 *	
 *	@param $vars
 *	  A sequential array of variables to pass to the theme template.
 *	@param $hook
 *	  The name of the theme function being called ("node" in this case.)
 */

function uclaw_preprocess_node(&$vars, $hook) {
  // Special classes for nodes
  $classes = array('node');
  if ($vars['sticky']) {
    $classes[] = 'sticky';
  }
  // support for Skinr Module
  if (module_exists('skinr')) {
    $classes[] = $vars['skinr'];
  }
  if (!$vars['status']) {
    $classes[] = 'node-unpublished';
    $vars['unpublished'] = TRUE;
  }
  else {
    $vars['unpublished'] = FALSE;
  }
  if ($vars['uid'] && $vars['uid'] == $GLOBALS['user']->uid) {
    $classes[] = 'node-mine'; // Node is authored by current user.
  }
  if ($vars['teaser']) {
    $classes[] = 'node-teaser'; // Node is displayed as teaser.
  }
  //$classes[] = 'clearfix';
  
  // Class for node type: "node-type-page", "node-type-story", "node-type-my-custom-type", etc.
  $classes[] = uclaw_id_safe('node-type-' . $vars['type']);
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces
}

/*
 *	This function create the EDIT LINKS for blocks and menus blocks.
 *	When overing a block (except in IE6), some links appear to edit
 *	or configure the block. You can then edit the block, and once you are
 *	done, brought back to the first page.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called ("block" in this case.)
 */ 

function uclaw_preprocess_block(&$vars, $hook) {
    $block = $vars['block'];
    
    //adjust for quicktabs
   // print "<pre>";
   // print_r($block);
    if ($block->module == 'quicktabs'){
   // $vars['block'] = $node->content['files']['#value'];
   // $vars['content'] = preg_replace("/".preg_quote($vars['attachments'],'/')."/",'',$vars['content']);
    }

    // special block classes
    $classes = array('block');
    $classes[] = uclaw_id_safe('block-' . $vars['block']->module);
    $classes[] = uclaw_id_safe('block-' . $vars['block']->region);
    $classes[] = uclaw_id_safe('block-id-' . $vars['block']->bid);
    $classes[] = 'clearfix';
    
    // support for Skinr Module
    if (module_exists('skinr')) {
      $classes[] = $vars['skinr'];
    }
    
    $vars['block_classes'] = implode(' ', $classes); // Concatenate with spaces
        
    //if (theme_get_setting('uclaw_block_editing') && user_access('administer blocks')) {
    if (user_access('administer blocks')) {
    	// Display 'edit block' for custom blocks.
        if ($block->module == 'block') {
          $edit_links[] = l('<span>' . t('edit block') . '</span>', 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
            array(
              'attributes' => array(
                'title' => t('edit the content of this block'),
                'class' => 'block-edit',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'configure' for other blocks.
        else {
          $edit_links[] = l('<span>' . t('configure') . '</span>', 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
            array(
              'attributes' => array(
                'title' => t('configure this block'),
                'class' => 'block-config',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'edit menu' for Menu blocks.
        if (($block->module == 'menu' || ($block->module == 'user' && $block->delta == 1)) && user_access('administer menu')) {
          $menu_name = ($block->module == 'user') ? 'navigation' : $block->delta;
          $edit_links[] = l('<span>' . t('edit menu') . '</span>', 'admin/build/menu-customize/' . $menu_name,
            array(
              'attributes' => array(
                'title' => t('edit the menu that defines this block'),
                'class' => 'block-edit-menu',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'edit menu' for Menu block blocks.
        elseif ($block->module == 'menu_block' && user_access('administer menu')) {
          list($menu_name, ) = split(':', variable_get("menu_block_{$block->delta}_parent", 'navigation:0'));
          $edit_links[] = l('<span>' . t('edit menu') . '</span>', 'admin/build/menu-customize/' . $menu_name,
            array(
              'attributes' => array(
                'title' => t('edit the menu that defines this block'),
                'class' => 'block-edit-menu',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        $vars['edit_links_array'] = $edit_links;
        $vars['edit_links'] = '<div class="edit">' . implode(' ', $edit_links) . '</div>';
      }
  }

/*
 * Override or insert PHPTemplate variables into the block templates.
 *
 *  @param $vars
 *    An array of variables to pass to the theme template.
 *  @param $hook
 *    The name of the template being rendered ("comment" in this case.)
 */

function uclaw_preprocess_comment(&$vars, $hook) {
  // Add an "unpublished" flag.
  $vars['unpublished'] = ($vars['comment']->status == COMMENT_NOT_PUBLISHED);

  // If comment subjects are disabled, don't display them.
  if (variable_get('comment_subject_field_' . $vars['node']->type, 1) == 0) {
    $vars['title'] = '';
  }

  // Special classes for comments.
  $classes = array('comment');
  if ($vars['comment']->new) {
    $classes[] = 'comment-new';
  }
  $classes[] = $vars['status'];
  $classes[] = $vars['zebra'];
  if ($vars['id'] == 1) {
    $classes[] = 'first';
  }
  if ($vars['id'] == $vars['node']->comment_count) {
    $classes[] = 'last';
  }
  if ($vars['comment']->uid == 0) {
    // Comment is by an anonymous user.
    $classes[] = 'comment-by-anon';
  }
  else {
    if ($vars['comment']->uid == $vars['node']->uid) {
      // Comment is by the node author.
      $classes[] = 'comment-by-author';
    }
    if ($vars['comment']->uid == $GLOBALS['user']->uid) {
      // Comment was posted by current user.
      $classes[] = 'comment-mine';
    }
  }
  $vars['classes'] = implode(' ', $classes);
}

/* 	
 * 	Customize the PRIMARY and SECONDARY LINKS, to allow the admin tabs to work on all browsers
 * 	An implementation of theme_menu_item_link()
 * 	
 * 	@param $link
 * 	  array The menu item to render.
 * 	@return
 * 	  string The rendered menu item.
 */ 	

function uclaw_menu_item_link($link) {
  if (empty($link['localized_options'])) {
    $link['localized_options'] = array();
  }

  // If an item is a LOCAL TASK, render it as a tab
  if ($link['type'] & MENU_IS_LOCAL_TASK) {
    $link['title'] = '<span class="tab">' . check_plain($link['title']) . '</span>';
    $link['localized_options']['html'] = TRUE;
  }

  return l($link['title'], $link['href'], $link['localized_options']);
}


/*
 *  Duplicate of theme_menu_local_tasks() but adds clear-block to tabs.
 */

function uclaw_menu_local_tasks() {
  $output = '';
  if ($primary = menu_primary_local_tasks()) {
    if(menu_secondary_local_tasks()) {
      $output .= '<ul class="tabs primary with-secondary clearfix">' . $primary . '</ul>';
    }
    else {
      $output .= '<ul class="tabs primary clearfix">' . $primary . '</ul>';
    }
  }
  if ($secondary = menu_secondary_local_tasks()) {
    $output .= '<ul class="tabs secondary clearfix">' . $secondary . '</ul>';
  }
  return $output;
}

/* 	
 * 	Add custom classes to menu item
 */	
	
function uclaw_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
#New line added to get unique classes for each menu item
  $css_class = uclaw_id_safe(str_replace(' ', '_', strip_tags($link)));
  return '<li class="'. $class . ' ' . $css_class . '">' . $link . $menu ."</li>\n";
}

/*	
 *	Converts a string to a suitable html ID attribute.
 *	
 *	 http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 *	 valid ID attribute in HTML. This function:
 *	
 *	- Ensure an ID starts with an alpha character by optionally adding an 'n'.
 *	- Replaces any character except A-Z, numbers, and underscores with dashes.
 *	- Converts entire string to lowercase.
 *	
 *	@param $string
 *	  The string
 *	@return
 *	  The converted string
 */	

function uclaw_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}

/*
 *  Return a themed breadcrumb trail.
 *	Alow you to customize the breadcrumb markup
 */

function uclaw_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' » ', $breadcrumb) .'</div>';
  }
}

/**
* Override or insert PHPTemplate variables into the search_theme_form template.
*
* @param $vars
*   A sequential array of variables to pass to the theme template.
* @param $hook
*   The name of the theme function being called (not used in this case.)
*/
function uclaw_preprocess_search_theme_form(&$vars, $hook) {
  // Note that in order to theme a search block you should rename this function
  // to yourthemename_preprocess_search_block_form and use
  // 'search_block_form' instead of 'search_theme_form' in the customizations
  // bellow.

  // Modify elements of the search form
  $vars['form']['search_theme_form']['#title'] = t('');
 
  // Set a default value for the search box
  $vars['form']['search_theme_form']['#value'] = t('Search UC College of Law');
 
  // Add a custom class and placeholder text to the search box
  $vars['form']['search_theme_form']['#attributes'] = array('class' => '',
                                                              'onfocus' => "if (this.value == 'Search UC College of Law') {this.value = '';}",
                                                              'onblur' => "if (this.value == '') {this.value = 'Search UC College of Law';}");
 
  // Change the text on the submit button
  //$vars['form']['submit']['#value'] = t('Go');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_theme_form']['#printed']);
  $vars['search']['search_theme_form'] = drupal_render($vars['form']['search_theme_form']);

  $vars['form']['submit']['#type'] = 'image_button';
  $vars['form']['submit']['#src'] = path_to_theme() . '/assets/images/production/global/icons/go.jpg';
   
  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}

function escape_string_for_regex($str)
{
        //All regex special chars (according to arkani at iol dot pt below):
        // \ ^ . $ | ( ) [ ]
        // * + ? { } ,
       
        $patterns = array('/\//', '/\^/', '/\./', '/\$/', '/\|/',
 '/\(/', '/\)/', '/\[/', '/\]/', '/\*/', '/\+/',
'/\?/', '/\{/', '/\}/', '/\,/');
        $replace = array('\/', '\^', '\.', '\$', '\|', '\(', '\)',
'\[', '\]', '\*', '\+', '\?', '\{', '\}', '\,');
       
        return preg_replace($patterns,$replace, $str);
}