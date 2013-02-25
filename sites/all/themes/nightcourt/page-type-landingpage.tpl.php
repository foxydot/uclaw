<?php $add_css[] = 'landingpage.css'; ?>
<?php $add_css[] = 'jquery.cookie.js'; ?>
<?php if(count($header_feature)>1): ?>
<?php $add_css[] = 'nivo-slider.css'; ?>
<?php $add_js[] = 'jquery.nivo.slider.pack.js'; ?>
<?php $add_js[] = 'homepage_jquery.js'; ?>
<?php endif; ?>
<?php include_once('header.php');?>
			
			<?php if ($sidebar_left_1 || $sidebar_left_2 || $sidebar_left_3): ?>
				<div id="sidebar-left"  class="sidebar sidebar-left equalize">
					<?php if ($sidebar_left_1): ?>
						<div id="sidebar-left-1"  class="sidebar-left-1">
							<?php print $sidebar_left_1; ?>
						</div> <!-- /#sidebar-left-1 -->
					<?php endif; ?>
					<?php if ($sidebar_left_2): ?>
						<div id="sidebar-left-2"  class="sidebar-left-2">
							<?php print $sidebar_left_2; ?>
						</div> <!-- /#sidebar-left-2 -->
					<?php endif; ?>
					<?php if ($sidebar_left_3): ?>
						<div id="sidebar-left-3"  class="sidebar-left-3">
							<?php print $sidebar_left_3; ?>
						</div> <!-- /#sidebar-left-3 -->
					<?php endif; ?>
				</div> <!-- /#sidebar-left -->
			<?php endif; ?>
<div class="content-area equalize">
	<?php if ($content_top): ?>
		<div id="content-top"  class="content-top">
			<?php print $content_top; ?>
		</div> <!-- /#content-top -->
	<?php endif; ?>

<div id="landingpage-header-area" class="landingpage-header-area">
	<div id="landingpage-header-feature" class="landingpage-header-feature nivoSlider">
	<?php foreach($header_feature AS $key => $feature): ?>
			<?php if(!empty($feature['feature_link']['url'])): ?>
				<?php $target = isset($feature['feature_link']['attributes']['target'])?' target="'.$feature['feature_link']['attributes']['target'].'"':''; ?>
				<a href="<?php print $feature['feature_link']['url']; ?>"<?php print $target?>>
			<?php endif; ?>
		<?php print trim($feature['feature_title']) != '' || trim($feature['feature_caption']) != ''?preg_replace('@title=\".*?\"@i','title="#slider-caption-'.$key.'"',$feature['feature_img']):preg_replace('@title=\".*?\"@i','title=""',$feature['feature_img']); ?>
			<?php if(!empty($feature['feature_link']['url'])): ?>
				</a>
			<?php endif; ?>
		<div id="slider-caption-<?php print $key;?>" class="nivo-html-caption"><?php 
			print trim($feature['feature_title']) != ''?'<h3>'.$feature['feature_title'].'</h3>':'';
			print trim($feature['feature_caption']) != ''?'<div>'.$feature['feature_caption'].'</div>':'';
		?></div>
	<?php endforeach; ?>
	</div>
	<div class="clear"></div>
</div>
<div id="landingpage-content-area" class="landingpage-content-area">
	<div id="landingpage-content-features" class="landingpage-content-features layout-<?php print $features_layout;?>">
		<ul>
			<li class="feature_1<?php if(empty($feature_1_title) && empty($feature_1_subtitle) && empty($feature_1_image)){ print ' plain-content'; } ?>">
				<?php if($feature_1_title){ ?><h3><?php print $feature_1_title; ?></h3><?php } ?>
				<?php print $feature_1_image; ?>
				<?php if($feature_1_subtitle){ ?><h4><?php print $feature_1_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_1_content; ?></div>
				<?php print $feature_1_link['view']; ?>
			</li>
			<li class="feature_2<?php if(empty($feature_2_title) && empty($feature_2_subtitle) && empty($feature_2_image)){ print ' plain-content'; } ?>">
				<?php if($feature_2_title){ ?><h3><?php print $feature_2_title; ?></h3><?php } ?>
				<?php print $feature_2_image; ?>
				<?php if($feature_2_subtitle){ ?><h4><?php print $feature_2_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_2_content; ?></div>
				<?php print $feature_2_link['view']; ?>
			</li>
			<li class="feature_3<?php if(empty($feature_3_title) && empty($feature_3_subtitle) && empty($feature_3_image)){ print ' plain-content'; } ?>">
				<?php if($feature_3_title){ ?><h3><?php print $feature_3_title; ?></h3><?php } ?>
				<?php print $feature_3_image; ?>
				<?php if($feature_3_subtitle){ ?><h4><?php print $feature_3_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_3_content; ?></div>
				<?php print $feature_3_link['view']; ?>
			</li>
			<li class="feature_4<?php if(empty($feature_4_title) && empty($feature_4_subtitle) && empty($feature_4_image)){ print ' plain-content'; } ?>">
				<?php if($feature_4_title){ ?><h3><?php print $feature_4_title; ?></h3><?php } ?>
				<?php print $feature_4_image; ?>
				<?php if($feature_4_subtitle){ ?><h4><?php print $feature_4_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_4_content; ?></div>
				<?php print $feature_4_link['view']; ?>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
				<?php print $content; ?>
	          	<?php print $feed_icons; ?>
</div>
</div>
	<div class="clear"></div>
	<style type="text/css">
                                #highlight-cycle {
                                        left: 0;
                                        position: relative;
                                        top: 0;
                                }
                                
                                #highlight-cycle .hl {
                                        background: #FFFFFF;
                                        left: 0;
                                        position: absolute;
                                        top: 0;
                                }
                                
                                #highlight-cycle .hl .bio { margin-top: 0; }
                                #highlight-cycle .hl h4 { font-size: 14px; }
                                #highlight-cycle .hl p { font-size: 12px; }
                        </style>
	
<?php include_once('footer.php');?>  	