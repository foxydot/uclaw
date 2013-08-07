<?php
		if (!empty($page_content['banners'])) {
			// Banners
?>						
						
			<div id="landingCarousel" class="carousel slide">
				<ol class="carousel-indicators">
					<?php
						$count = count($page_content['banners']);
						if ($count > 1) {
							for ($i=0; $i<$count; $i++) { ?>
								<li data-target="#landingCarousel" data-slide-to="<?php echo $i; ?>"<?php echo (($i == 0) ? ' class="active"' : NULL); ?>></li>
						<?php }
						}
						?>
				</ol>
				
				<!-- Carousel items -->
				<div class="carousel-inner">
				
				<?php
					$i = 0;
					foreach ($page_content['banners'] as $banner) {
						if (empty($banner['image'])) { continue; }
					?>
					
					<div class="<?php echo (($i == 0) ? 'active ' : NULL); ?>item">
					<img src="<?php echo $banner['image']; ?>" class="img-polaroid">
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
			
			<script>
				// Resize captions to not overflow on image
				(function($) {
					$(window).load(function() {
						$('#landingCarousel .item').each(function() {
							var imgwidth = $(this).find('img').outerWidth();
							var caption = $(this).find('.carousel-caption');
							var less_padding = parseInt(caption.css('padding-left')) + parseInt(caption.css('padding-right'));
							$(this).find('.carousel-caption').css('width', (imgwidth - less_padding));
						});
					});
				})(jQuery);			
			</script>
			
		<?php }
		
		if (count($page_content['banners']) > 1) { ?>
		
		<script>
			// Start Carousel
			(function($) {
				$(document).ready(function() {
					$('#landingCarousel').carousel();
				});	
			})(jQuery);
		</script>
		
		<?php } ?>
	
	
	
	
	<div class="row">
		<div class="span12 events-cont">
			<h2>Upcoming Events</h2>
	<?php
	// Upcoming Events
		echo views_embed_view('Events', 'news_events_block', $section['slug']);
		
		//print_r($ret); 
	?>
		
			<div class="clearfix"></div>
			<hr>

		</div>
	</div>
	
	<div class="row" id="previews">
	<?php
		$sections = array(
			array('title' => 'Press Releases',			'slug' => 'pressrelease'),
			array('title' => 'Student &amp; Faculty',	'slug' => 'student'),
			array('title' => 'Alumni',					'slug' => 'alumni'),
		);
	
	foreach ($sections as $section)
	{
		?>
		<div class="span4 news-list<?php /* date-list*/ ?>">
			<h2><?php print $section['title']; ?></h2>
				<?php 
					echo views_embed_view('news', 'newsblock', $section['slug']);
				?>
				<a href="/news/<?php echo $section['slug']; ?>" class="pull-right"><strong>View More</strong> <i class="icon-double-angle-right"></i></a>
		</div>
	<?php 
	}
	?>

	</div>
	
	
	<script>
	// Run Through each row and check if heights match
	(function($) {
		$(document).ready(function() {
			var maxheight = 0;
			var row = 0;
			var heights = Array();
			
			$('#previews .span4').each(function() {
				maxheight = 0;
				row = 0;
				
				$(this).find('.views-row').each(function() {
					row = $(this).index();
					if (($(this).height() > heights[row]) || (!heights[row])) {
						heights[row] = $(this).height();
					}
					
					
				}); // rows
				
				
			}); // cols
			
			for (var i=0; heights[i]; i++) {
				$('#previews .span4').each(function() {
					$(this).find('.views-row:eq("' + i + '") a').css('height', heights[i]);
				});
			}
			
		});
	})(jQuery);
	</script>
