<?php

	if ($teaser)
	{
		$link = url('node/' . $node->nid);
	
	
		if ($node->view->current_display == 'home_events_block')
		{ ?>
		
			<section>
				<a href="<?php echo $link; ?>" class="clearfix">
					<span class="cal-date pull-left"><?php echo date('j', strtotime($page_content['date'])); ?> <span><?php echo date('M', $page_content['date']); ?></span></span>
					<i class="icon-chevron-right pull-right"></i>
					<h4><?php echo $page_content['title']; ?></h4>
					
					<?php if (!empty($page_content['speaker'])) { ?>
					<p><?php echo $page_content['speaker']; ?></p>
					<?php } ?>
				</a>		
			</section>
		<?php
		
		}
		else
		{
		?>
		
		<h3><?php echo $page_content['title']; ?></h3>
		<p>
			<strong><?php echo date('F j, Y h:ia', strtotime($page_content['date'])); ?></strong>
			<?php
				if ($page_content['location'])
				{
					echo '<br>', $page_content['location'];
				}		
			?>
		</p>
		<a href="<?php echo $link; ?>" class="pull-right"><strong>View More</strong> <i class="icon-double-angle-right"></i></a>
		
<?php
		} // not home_events_block
	
	} else { ?>

		<div class="row">
			<div class="span12">
				<h1><?php echo $page_content['title']; ?></h1>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<p>
					<strong><?php echo date('F j, Y h:ia', strtotime($page_content['date'])); ?></strong>
				<?php if ($page_content['location']) { ?><br><?php echo $page_content['location']; } ?>
				</p>
			</div>
			
			<?php if ($page_content['speaker']) { ?>
			<div class="span6">
				<h3>Speaker: <?php echo $page_content['speaker']; ?></h3>
			</div>
			<?php } ?>
		</div>
		
		<?php if ($page_content['description']) { ?>
		
		<div class="row">
			<div class="span12">
				<hr>
				<?php echo $page_content['description']; ?>
			</div>
		</div>
		
		<?php } ?>

<?php } ?>