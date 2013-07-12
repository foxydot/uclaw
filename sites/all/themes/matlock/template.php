<?php

/**
 * @file template.php
 */

 // Typekit Reference
 function matlock_preprocess_html(&$variables) {
 	drupal_add_js('//use.typekit.net/joq3zvd.js');
 	drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
 }