<?php

	if ($teaser)
	{
		$link = url('node/' . $node->nid);
	
	/*
	?>
	
		<section>
			<a href="<?php echo $link; ?>" class="clearfix">
				<span class="cal-date pull-left"><?php echo date('j', $page_content['date']); ?> <span><?php echo date('M', $page_content['date']); ?></span></span>
				<i class="icon-chevron-right pull-right"></i>
				<h4><?php echo $page_content['title']; ?></h4>
			</a>		
		</section>
	*/
	?>	

		<a href="<?php echo $link; ?>"><?php echo $page_content['title']; ?></a>		
	
<?php } else {

		if ($has_sidebar) {
			$span = 9;
		} else {
			$span = 12;
		}
?>

		<div class="row">
			<div class="span<?php echo $span; ?>">
				<h1><?php echo $page_content['title']; ?></h1>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<p>
					<strong><?php echo date('F j, Y h:ia', $page_content['date']); ?></strong>
				</p>
			</div>
		</div>
		
		
		<div class="row">
			<div class="span<?php echo $span; ?>">
				<hr>
				<?php echo $page_content['body']; ?>
			</div>
		</div>
		

<?php } ?>