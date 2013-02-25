<?php $add_css[] = 'news_page_new.css'; ?>
<?php $add_js[] = 'scrollable.js'; ?>
<?php $add_js[] = 'newspage_jquery.js'; ?>
<?php include_once('header.php');?> 	
 	
        <div id="content-area">
		<div class="header-block">
			<div class="header-slides">
				<?php 
				$block = module_invoke('ddblock', 'block', 'view', 21);
				print $block['content'];
				 ?>		
		 	</div>
			<div class="header-links">
				<ul>
					<?php foreach($sb AS $item){ ?>
					<?php //ts_data($item);?>
					<li style="background: url(/<?php print $item['image']; ?>) no-repeat center top">
						<div class="sb-title"><?php print $item['title']; ?></div>
						<div class="sb-content"><?php print $item['content']; ?></div>
						<?php print $item['link']['view']; ?>
					</li>
					<?php }//end foreach; ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div id="events" class="events">
			<div class="events-title">
				<h3>Featured</h3>
				<h2>Events</h2>
				<a href="/events">See more events ></a>
			</div>
			<div class="events-events">
		<?php 
		$block = module_invoke('views', 'block', 'view', 'Events2-block_2');
		print '<h3>'.$block['subject'].'</h3>
		'.$block['content'];
		 ?>
		 	</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>

	<?php 	
	$sections = array(
		array('title' => 'Press Releases','slug' => 'pressrelease'),
		array('title' => 'Student/Faculty News','slug' => 'student'),
		array('title' => 'Alumni News','slug' => 'alumni'),
		);
	$count = count($sections); 
	for ($j = 0; $j < $count; $j++){
		$class = $j%3==1?'third':'first third';
		?>
		<div class="<?php print $class; ?>">
			<h4><a href="/news-events/<?php print $sections[$j]['slug']; ?>" title="<?php print $sections[$j]['title']; ?>"><?php print $sections[$j]['title']; ?></a></h4>
				<?php 
				print views_embed_view('news','block_3',$sections[$j]['slug']); //can we set a variable PER VIEW to change?
				?>
			<div class="news_more"><a href="/news-events/<?php print $sections[$j]['slug']; ?>" title="<?php print $sections[$j]['title']; ?>">More ></a></div>
		</div>
	<?php 
	}
	?>
					<div class="clear"></div>
					
	<div id="storiesWrap">
			<div id="stories">
				<h5>Around The College of Law</h5>
				
				<?php 
				print views_embed_view('news','block_5');
				?>
				
			<a class="prev browse left"></a>
			<a class="next browse right"></a>
			</div> <!-- stories -->
			
			
		</div> <!-- storiesWrap -->
		
		<div class="clear"></div>
				</div> <!-- content -->







		</div> <!-- /#content-area -->

          <?php print $feed_icons; ?>

<?php include_once('footer.php');?>