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
	          		<div class="content">
					<h1 class="title"><?php print $title; ?></h1>
				<?php if(!empty($sidebar_image['filepath']) || $sidebar_text){?>           
					<div class="right-sidebar resources">
	                <?php if(!empty($sidebar_image['filepath'])){ ?>
	                	<img src="/<?php print $sidebar_image['filepath']; ?>" alt="<?php print $sidebar_image['data']['alt']; ?>" title="<?php print $sidebar_image['data']['title']; ?>" />
	                <?php } ?>
	          		<?php print $sidebar_text; ?>
	          		</div>
	          	<?php } ?>
	          		 <?php print $content; ?>
	          		</div>
	          	<?php print $feed_icons; ?>
	         </div>
	         <div class="clear"></div>
<?php include_once('footer.php');?>	          	