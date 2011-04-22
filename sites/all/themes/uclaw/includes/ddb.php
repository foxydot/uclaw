<?php 
function uclaw_preprocess_ddblock_cycle_block_content(&$vars){
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
		$slider_items[$key1]['slide_title'] =  $result->node_title;
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
	
	
function uclaw_preprocess_ddblock_cycle_pager_content(&$vars){
    if ($vars['pager_settings']['view_name'] == 'news') {
      if (!empty($vars['content'])) {
        foreach ($vars['content'] as $key1 => $result) {
          // add pager_item_image variable
          if (isset($result->node_data_field_news_feature_img_field_news_feature_img_fid)) {
            $fid = $result->node_data_field_news_feature_img_field_news_feature_img_fid;
            $filepath = db_result(db_query("SELECT filepath FROM {files} WHERE fid = %d", $fid));
            //  use imagecache (imagecache, preset_name, file_path, alt, title, array of attributes)        
          }
          // add pager_item _text variable from imagefield alternative text
          if (isset($result->node_data_field_news_feature_img_field_news_feature_img_data)) {
		    $data=unserialize($result->node_data_field_news_feature_img_field_news_feature_img_data);
		  if (isset($data['alt'])) {
		    $pager_items[$key1]['text'] =  $data['alt'];
            }          
		  }
      if (isset($result->node_title)) {
		$slider_items[$key1]['slide_title'] =  $result->node_title;
      }
        }
      }
      $vars['pager_items'] = $pager_items;
    }
 }