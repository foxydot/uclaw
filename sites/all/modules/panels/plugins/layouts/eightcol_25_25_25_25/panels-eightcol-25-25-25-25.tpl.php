<?php
// $Id: panels-eightcol_25_25_25_25.tpl.php,v 1.1.2.1 2008/12/16 21:27:58 merlinofchaos Exp $
/**
 * @file
 * Template for the 8 column panel layout.
 *
 * This template provides a eight column 25%-25%-25%-25% panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['ctr_left']: Content in the center left column.
 *   - $content['ctr_right']: Content in the center right column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display panel-8col clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-panel panel-col panel-row-first panel-col-first">
    <div class="inside"><?php print $content['left_1']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-first panel-col-second">
    <div class="inside"><?php print $content['ctr_left_1']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-first panel-col-third">
    <div class="inside"><?php print $content['ctr_right_1']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-first panel-col-last">
    <div class="inside"><?php print $content['right_1']; ?></div>
  </div>
  <div class="clear"></div>
  <div class="panel-panel panel-col panel-row-last panel-col-first">
    <div class="inside"><?php print $content['left_2']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-last panel-col-second">
    <div class="inside"><?php print $content['ctr_left_2']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-last panel-col-third">
    <div class="inside"><?php print $content['ctr_right_2']; ?></div>
  </div>

  <div class="panel-panel panel-col panel-row-last panel-col-last">
    <div class="inside"><?php print $content['right_2']; ?></div>
  </div>
</div>
