<?php $add_css[] = 'homepage.css'; ?>
<?php if(count($header_feature)>1): ?>
<?php $add_css[] = 'nivo-slider.css'; ?>
<?php $add_js[] = 'jquery.nivo.slider.pack.js'; ?>
<?php $add_js[] = 'homepage_jquery.js'; ?>
<?php endif; ?>
<?php include_once('header.php');?>
			<div class="content-area">
				<?php if ($content_top): ?>
					<div id="content-top"  class="content-top">
						<?php print $content_top; ?>
					</div> <!-- /#content-top -->
				<?php endif; ?>

<div id="homepage-header-area" class="homepage-header-area">
	<div id="homepage-header-feature" class="homepage-header-feature nivoSlider">
	<?php foreach($header_feature AS $key => $feature): ?>
			<?php if(!empty($feature['feature_link']['url'])): ?>
				<?php $target = isset($feature['feature_link']['attributes']['target'])?' target="'.$feature['feature_link']['attributes']['target'].'"':''; ?>
				<a href="<?php print $feature['feature_link']['url']; ?>"<?php print $target?>>
			<?php endif; ?>
		<?php print preg_replace('@title=\".*?\"@i','title="#slider-caption-'.$key.'"',$feature['feature_img']); ?>
			<?php if(!empty($feature['feature_link']['url'])): ?>
				</a>
			<?php endif; ?>
		<div id="slider-caption-<?php print $key;?>" class="nivo-html-caption">
			<h3><?php print $feature['feature_title']; ?></h3>
			<div><?php print $feature['feature_caption']; ?></div>
		</div>
	<?php endforeach; ?>
	</div>
	<div id="homepage-header-sidebar" class="homepage-header-sidebar">
		<ul>
			<li>
				<h3><?php print $sb1_title; ?></h3>
				<div><?php print $sb1_content; ?></div>
				<?php print $sb1_link['view']; ?>
			</li>
			<li>
				<h3><?php print $sb2_title; ?></h3>
				<div><?php print $sb2_content; ?></div>
				<?php print $sb2_link['view']; ?>
			</li>
			<li>
				<h3><?php print $sb3_title; ?></h3>
				<div><?php print $sb3_content; ?></div>
				<?php print $sb3_link['view']; ?>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<div id="homepage-content-area" class="homepage-content-area">
	<div id="homepage-content-features" class="homepage-content-features">
		<ul>
			<li>
				<h3><?php print $feature_1_title; ?></h3>
				<?php print $feature_1_image; ?>
				<h4><?php print $feature_1_subtitle; ?></h4>
				<div><?php print $feature_1_content; ?></div>
				<?php print $feature_1_link['view']; ?>
			</li>
			<li>
				<h3><?php print $feature_2_title; ?></h3>
				<?php print $feature_2_image; ?>
				<h4><?php print $feature_2_subtitle; ?></h4>
				<div><?php print $feature_2_content; ?></div>
				<?php print $feature_2_link['view']; ?>
			</li>
			<li>
				<h3><?php print $feature_3_title; ?></h3>
				<?php print $feature_3_image; ?>
				<h4><?php print $feature_3_subtitle; ?></h4>
				<div><?php print $feature_3_content; ?></div>
				<?php print $feature_3_link['view']; ?>
			</li>
			<li>
				<h3><?php print $feature_4_title; ?></h3>
				<?php print $feature_4_image; ?>
				<h4><?php print $feature_4_subtitle; ?></h4>
				<div><?php print $feature_4_content; ?></div>
				<?php print $feature_4_link['view']; ?>
			</li>
		</ul>
	</div>
	<div id="homepage-content-sidebar" class="homepage-content-sidebar">
		<?php 
		$block = module_invoke('views', 'block', 'view', 'Events-block_1');
		print '<h3>'.$block['subject'].'</h3>
		'.$block['content'];
		 ?>
	</div>
	<div class="clear"></div>
				<?php print $content; ?>
	          	<?php print $feed_icons; ?>
</div>
<div id="homepage-footer-area" class="homepage-footer-area">
</div>



	          	
<?php include_once('footer.php');?>	          	