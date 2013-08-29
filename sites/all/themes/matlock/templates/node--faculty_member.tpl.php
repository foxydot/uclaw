<?php
	if ($teaser) {
		
		$link = url('node/' . $node->nid);
	?>
	
		<div class="thumbnail">
			
			<a class="thumb-wrap" href="<?php echo $link; ?>">
				<img src="<?php echo (!empty($page_content['headshot'])) ? $page_content['headshot'] : '/sites/all/themes/matlock/img/no-photo.jpg'; ?>" alt="Headshot of <?php echo $page_content['firstname'], ' ', $page_content['lastname']; ?>">
			</a>
			
			<h3>
				<a href="<?php echo $link; ?>"><?php echo $page_content['firstname'], ' ', $page_content['lastname']; ?></a>
			</h3>
			<p class="title"><?php echo $page_content['title']; ?></p>	
		</div>
	
	<?php } else { ?>

<div class="row">

	<div class="span3">
		<?php if (!empty($page_content['headshot'])) { ?>
			<img src="<?php echo $page_content['headshot']; ?>" class="img-polaroid" alt="<?php echo $page_content['firstname'], ' ', $page_content['lastname']; ?>">
		<?php } ?>
		
				
	<?php // Awards
			if (!empty($page_content['awards'])) { ?>
		<h3>Awards</h3>
		<ul class="nobullet list-space icons-ul">
			<?php foreach($page_content['awards'] as $award) {
				if (empty($award)) { continue; }
			?>
				<li><i class="icon-legal"></i> <?php echo strip_tags($award); ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
		
		<?php // Links
		if (!empty($page_content['links'])) { ?>
		<h3>Links</h3>
		<ul class="nobullet list-space icons-ul">
			<?php foreach($page_content['links'] as $link) {
				if (strpos($link, '|') !== FALSE) {
					list($href, $title) = explode('|', $link);
				} else {
					$href = $title = $link;
				}
				
			?>
				<li><a href="<?php echo $href; ?>"><?php echo $title; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
		
	</div> <!-- /.span3 -->
	
	<div class="span9">
		<h1><?php echo $page_content['firstname'], ' ', $page_content['lastname']; ?></h1>
		<h3><?php echo $page_content['title']; ?></h3>
		
		<hr>
		
		<div class="row">
		
		<?php
			if (!empty($page_content['education'])) { ?>
			<div class="span3">
				<h3>Education</h3>
			
				<p>
				<?php foreach($page_content['education'] as $edu) {
					echo $edu, '<br>';
				} ?>
				</p>
			</div>
		<?php } // education not empty
		
		
			if ( !empty($page_content['contact']) || !empty($page_content['email']) ) { ?>
			<div class="span3">

				<h3>Contact</h3>
				<ul class="unstyled">
		<?php
			if (!empty($page_content['contact'])) {
				foreach($page_content['contact'] as $con) {
			?>
				<li><?php echo $con; ?></li>
		<?php }
			}
			
			if (!empty($page_content['email'])) { ?>
				<li><abbr title="Email">e:</abbr> <a href="mailto:<?php echo $page_content['email']; ?>"><?php echo $page_content['email']; ?></a></li>
			<?php } ?>
				</ul>
			</div>
		<?php } // contact || email not empty
		
			if ( !empty($page_content['facebook']) || !empty($page_content['twitter']) ) { ?>
			
			<div class="span3 faculty-social">
				<h3>Social</h3>
			<?php if (!empty($page_content['facebook'])) { ?>
				<a href="http://facebook.com/<?php echo $page_content['facebook']; ?>" target="_blank" class="fb"><i class="icon-facebook"></i><?php echo $page_content['facebook']; ?></a>
				<br>
			<?php } ?>
			
			<?php if (!empty($page_content['twitter'])) { ?>
				<a href="http://twitter.com/<?php echo $page_content['twitter']; ?>" target="_blank" class="tw"><i class="icon-twitter"></i><?php echo $page_content['twitter']; ?></a>
			<?php } ?>

			</div>
		<?php } // social not empty ?>
			
		</div> <!-- /.row -->
		
		<hr>
		<div class="row">
		
		<?php
			if (!empty($page_content['subjects'])) { ?>
			<div class="span3">
				<h3>Areas of Interest</h3>
				
				<ul class="nobullet">
				<?php foreach($page_content['subjects'] as $s) { ?>
					<li><?php echo $s; ?></li>
				<?php } ?>
				</ul>
			</div>
		<?php } // teaching not empty 
		

			if (!empty($page_content['teaching'])) { ?>
			<div class="span3">
				<?php echo $page_content['teaching']; ?>
			</div>
			<?php } // teaching not empty ?>
						
			
		</div> <!-- /.row -->
		
	</div> <!-- /.span9 -->
	
</div> <!-- /.row -->

	<hr>

<div class="row">
	<div class="span12">
	
		<?php
		if (!empty($page_content['overview'])) { ?>
			<h2>Overview</h2>
			<?php echo $page_content['overview']; ?>
			<hr>
		<?php
		}
		
		if (!empty($page_content['scholarship'])) { ?>
			<h2>Scholarship</h2>
			<?php echo $page_content['scholarship']; ?>
			<hr>
		<?php
		} // scholarship not empty
		

		if (!empty($page_content['news'])) { ?>
			<h2>News</h2>
			<?php echo $page_content['news'];
		} ?>
		
		
		
	</div> <!-- /.span12 -->
</div> <!-- /.row -->

<?php } // not teaser ?>