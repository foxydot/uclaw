<?php 
function mcbeal_preprocess_ddblock_cycle_block_content(&$vars){
	//ts_data($vars);
	if ($vars['settings']['view_name'] == 'news') {
      if (!empty($vars['content'])) {
        foreach ($vars['content'] as $key1 => $result) {
          // add slide_image variable 
		  if (isset($result->node_data_field_news_feature_img_field_news_feature_img_fid)) {
            // get image id
            $fid = $result->node_data_field_news_feature_img_field_news_feature_img_fid;
            // get path to image
            $filepath = db_result(db_query("SELECT filepath FROM {files} WHERE fid = %d", $fid));
            //  use imagecache (imagecache, preset_name, file_path, alt, title, array of attributes)
            if (module_exists('imagecache') && is_array(imagecache_presets()) && $vars['imgcache_slide'] <> '<none>'){
              $slider_items[$key1]['slide_image'] = 
              theme('imagecache', 
                    $vars['imgcache_slide'], 
                    $filepath,
                    $result->node_title);
            }
            else {          
              $slider_items[$key1]['slide_image'] = 
                '<img src="' . base_path() . $filepath . 
                '" alt="' . $result->node_title . 
                '"/>';         
            }   
            
              $slider_items[$key1]['slide_url'] =  base_path() . $filepath ;   
          }      
    //  add slide_title and slide_text variable from imagefield title and description
    if (isset($result->node_data_field_news_feature_img_field_news_feature_img_data)) {
      $data=unserialize($result->node_data_field_news_feature_img_field_news_feature_img_data);
      if (isset($data['description'])) {
       $slider_items[$key1]['slide_text'] = $data['description'];
	  }
    }
        
      if (isset($result->node_title)) {
		$slider_items[$key1]['slide_title'] =  l($result->node_title,'node/' . $result->nid);
      }
	// add slide_read_more variable and slide_node variable
          if (isset($result->nid)) {
            $slider_items[$key1]['slide_read_more'] =  l('> Read more', 'node/' . $result->nid);
            $slider_items[$key1]['slide_node'] =  'node/' . $result->nid;
          }
        }
        $vars['slider_items'] = $slider_items;
      }
    }
}
	
	
function mcbeal_preprocess_ddblock_cycle_pager_content(&$vars){
    if ($vars['pager_settings']['view_name'] == 'news') {
      if (!empty($vars['content'])) {
        foreach ($vars['content'] as $key1 => $result) {
	      if (isset($result->node_title)) {
			$pager_items[$key1]['slide_title'] =  $result->node_title;
	      }
	      $pager_items[$key1]['text'] = mcbeal_trim_headline($result->node_revisions_teaser, 20);
	      $pager_items[$key1]['slide_read_more'] =  l('> Read more', 'node/' . $result->nid);
        }
      }
      $vars['pager_items'] = $pager_items;
    }
 }

function mcbeal_trim_headline($text, $length = 35) {
		$text = preg_replace("/<img[^>]+\>/i", "", $text); 
		$text = preg_replace("/\[img_assist[^\]]+\\]/i", "", $text); 
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$words = preg_split("/[\n\r\t ]+/", $text, $length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $length ) {
			array_pop($words);
		} 
		$text = implode(' ', $words);
	return $text;
}