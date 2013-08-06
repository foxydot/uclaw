<?php
	/* Page template */
		if (!empty($page_content['banners'])) {
			// Banners
?>						
						
			<div id="landingCarousel" class="carousel slide">
				<ol class="carousel-indicators">
					<?php
						$count = count($page_content['banners']);
						for ($i=0; $i<$count; $i++) { ?>
							<li data-target="#landingCarousel" data-slide-to="<?php echo $i; ?>"<?php echo (($i == 0) ? ' class="active"' : NULL); ?>></li>
					<?php } ?>
				</ol>
				
				<!-- Carousel items -->
				<div class="carousel-inner img-polaroid">
				
				<?php
					$i = 0;
					foreach ($page_content['banners'] as $banner) {
						if (empty($banner['image'])) { continue; }
					?>
					
					<div class="<?php echo (($i == 0) ? 'active ' : NULL); ?>item">
					<img src="<?php echo $banner['image']; ?>">
					<?php if ( (!empty($banner['title'])) || (!empty($banner['caption']))) { ?>
						<div class="carousel-caption">
							<?php if (!empty($banner['title'])) { ?><h4><?php echo $banner['title']; ?></h4><?php } ?>
							<?php if (!empty($banner['caption'])) { ?><p class="small muted"><?php echo $banner['caption']; ?></p><?php } ?>
						</div>
				<?php } ?>
					</div> <!-- /.item -->
					 
				<?php
				$i++; } ?>
				
				</div> <!-- /.carousel-inner -->
			
			</div> <!-- /.carousel.slide -->
		<?php }
		
				echo '<h1>', drupal_get_title(), '</h1>';
				// Body
				if (!empty($page_content['body'])) {
					print $page_content['body'];
				}	
				
				// Features
					if (!empty($page_content['features'])) { ?>
						<?php if (!empty($page_content['features'][1]['title'])) { ?><h1><?php echo $page_content['features'][1]['title']; ?></h1><?php } ?>
						<?php if (!empty($page_content['features'][1]['content'])) { echo $page_content['features'][1]['content']; }
						
						array_shift($page_content['features']);
					?>
					
						<div class="row">
						
						<?php foreach($page_content['features'] as $feature) { ?>
							
							<div class="span4">
								<?php if (!empty($feature['title'])) { ?><h3><?php echo $feature['title']; ?></h3><?php } else { ?><h3>&nbsp;</h3><?php } ?>
								<?php if (!empty($feature['content'])) { echo $feature['content'];  } ?>
							</div>
							
						<?php } ?>
						
						</div>
					<?php } ?>
