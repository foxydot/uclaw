<?php

/**
 * @file template.php
 */

 // Typekit Reference
 function matlock_preprocess_html(&$variables) {
 	drupal_add_js('//use.typekit.net/joq3zvd.js');
 	drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
 }
 
 
 // Add arrows to menus
 function matlock_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l('<i class="icon-double-angle-right"></i> ' . $element['#title'], $element['#href'], array_merge($element['#localized_options'], array('html' => TRUE)));
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}