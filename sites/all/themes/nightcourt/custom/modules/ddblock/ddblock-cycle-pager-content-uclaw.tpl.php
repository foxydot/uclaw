<?php
// $Id$ 

/*!
 * Dynamic display block module template: aimmro - pager template
 * Copyright (c) 2008 - 2009 P. Blaauw All rights reserved.
 * Version 1.1 (11-FEB-2009)
 * Licenced under GPL license
 * http://www.gnu.org/licenses/gpl.html
 */

 /**
 * @file
 * Dynamic display block module template: aimmro - pager template
 * - Custom pager with images
 *
 * Available variables:
 * - $delta: Block number of the block.
 * - $pager: Type of pager to add
 * - $pager_items: pager item array
 * - $pager_position: position of the slider (top | bottom) 
 *
 * notes: don't change the ID names, they are used by the jQuery script.
 */
$number_of_items = 6;        // total number of items to show  
$number_of_items_per_row=6;  // number of items to show in a row
?>
<!-- custom pager with images. --> 
<div id="ddblock-custom-pager-<?php print $delta ?>" class="<?php print $pager ?> clear-block border">
 <ul class="<?php print $pager ?>-inner clear-block border">
  <?php if ($pager_items): ?>
   <?php $item_counter=0; ?>
   <?php foreach ($pager_items as $pager_item): ?>
    <li class="<?php print $pager ?>-item <?php print $pager ?>-item-<?php print $item_counter ?>">
     <div class="<?php print $pager ?>-item-inner">
      <h3><a href="#" title="view image larger" class="pager-link"><?php print $pager_item['slide_title'];?></a></h3> 
      <?php //print '<p>'.$pager_item['text'].'</p>';?>
      <div class="read-more"><?php print $pager_item['slide_read_more'];?></div>
     </div>
    </li> <!-- /custom-pager-item -->
   <?php endforeach; ?>
  <?php endif; ?>
 </ul> <!-- /pager-inner-->
</div>  <!-- /pager-->
