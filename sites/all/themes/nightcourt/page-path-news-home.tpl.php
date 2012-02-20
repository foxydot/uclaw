<?php $add_css[] = 'news_page.css'; ?>
<?php $add_js[] = 'scrollable.js'; ?>
<?php $add_js[] = 'newspage_jquery.js'; ?>
<?php include_once('header.php');?> 	
 	
        <div id="content-area">
		<?php 
		$block = module_invoke('ddblock', 'block', 'view', 22);
		print $block['content'];
		 ?>		
		
		<div class="clear"></div>
		
		<div id="storiesWrap">
			<div id="stories">
				<h5>Highlighted Stories</h5>
				
				<?php 
				print views_embed_view('news','block_5');
				?>
				
			</div> <!-- stories -->
			
			<a class="prev browse left"></a>
			<a class="next browse right"></a>
			
		</div> <!-- storiesWrap -->
		
					
		<div class="clear"></div>
	<?php 	
	$sections = array(
		array('title' => 'Press Releases','slug' => 'pressrelease'),
		array('title' => 'Alumni News','slug' => 'alumni'),
		array('title' => 'Faculty News','slug' => 'faculty'),
		array('title' => 'Student News','slug' => 'student'),
		array('title' => 'Institutes &amp; Centers','slug' => 'institutes'),		
		array('title' => 'Publications','slug' => 'publication'),
		);
	$count = count($sections); 
	for ($j = 0; $j < $count; $j++){
		$class = $j%2==1?'third':'first third';
		?>
		<div class="<?php print $class; ?>">
			<h4><a href="/news-events/<?php print $sections[$j]['slug']; ?>" title=""<?php print $sections[$j]['title']; ?>><?php print $sections[$j]['title']; ?></a></h4>
				<?php 
				print views_embed_view('news','block_3',$sections[$j]['slug']); //can we set a variable PER VIEW to change?
				?>
		</div>
	<?php 
	}
	?>
					<div class="clear"></div>
				</div> <!-- content -->







		</div> <!-- /#content-area -->

          <?php print $feed_icons; ?>

<?php include_once('footer.php');?>