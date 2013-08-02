<?php

	if ($teaser)
	{
		$link = url('node/' . $node->nid);
	?>
	
	<h3><?php echo $page_content['title']; ?></h3>
	<p>
		<strong><?php echo date('F j, Y h:ia', $page_content['date']); ?></strong>
		<?php
			if ($page_content['location'])
			{
				echo '<br>', $page_content['location'];
			}		
		?>
	</p>
	<a href="<?php echo $link; ?>" class="pull-right"><strong>View More</strong> <i class="icon-double-angle-right"></i></a>
	
<?php } else { ?>

		<div class="row">
			<div class="span12">
				<h1><?php echo $page_content['title']; ?></h1>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<p>
					<strong><?php echo date('F j, Y h:ia', $page_content['date']); ?></strong>
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