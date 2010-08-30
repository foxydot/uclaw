<?php
// $Id: eightcol_25_25_25_25.inc,v 1.1.2.3 2010/01/13 06:25:15 merlinofchaos Exp $

/**
 * implementation of hook_panels_layouts
 */
// Plugin definition
$plugin = array(
  'title' => t('Eight column 25/25/25/25'),
  'icon' => 'eightcol_25_25_25_25.png',
  'theme' => 'panels_eightcol_25_25_25_25',
  'theme arguments' => array('id', 'content'),
  'css' => 'eightcol_25_25_25_25.css',
  'panels' => array(
    'left_1' => t('Left side'),
    'ctr_left_1' => t('Center left'),
    'ctr_right_1' => t('Center right'),
    'right_1' => t('Right side'),
    'left_2' => t('Left side'),
    'ctr_left_2' => t('Center left'),
    'ctr_right_2' => t('Center right'),
    'right_2' => t('Right side'),
  ),
);

