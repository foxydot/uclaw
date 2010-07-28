<?php
// $Id: fourcol_25_25_25_25.inc,v 1.1.2.3 2010/01/13 06:25:15 merlinofchaos Exp $

/**
 * implementation of hook_panels_layouts
 */
// Plugin definition
$plugin = array(
  'title' => t('Four column 25/25/25/25'),
  'icon' => 'fourcol_25_25_25_25.png',
  'theme' => 'panels_fourcol_25_25_25_25',
  'theme arguments' => array('id', 'content'),
  'css' => 'fourcol_25_25_25_25.css',
  'panels' => array(
    'left' => t('Left side'),
    'ctr_left' => t('Center left'),
    'ctr_right' => t('Center right'),
    'right' => t('Right side')
  ),
);

