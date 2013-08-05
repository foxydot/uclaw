
	<div class="row">
		<div class="span12 events-cont">
			<h2>Upcoming Events</h2>
	<?php
	// Upcoming Events
		$args = array();
		$view = views_get_view('Events');
			$view->set_items_per_page(3);
		echo $view->preview('block', $args);
		
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
					echo views_embed_view('News', 'block', $section['slug']);
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
