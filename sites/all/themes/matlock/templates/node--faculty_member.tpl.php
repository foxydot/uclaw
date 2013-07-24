<div class="row">

	<div class="span3">
		<img src="http://placehold.it/240x365" class="img-polaroid" alt="Name">
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
				<p><?php echo $page_content['education']; ?></p>
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
				<li><abbr title="Email">e:</abbr> <?php echo $page_content['email']; ?></li>
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
		<?php } // subjects not empty
		
		if (!empty($page_content['scholarship'])) { ?>

			<div class="span3">
				<h3>Scholarship</h3>
				<p><?php echo $page_content['scholarship']; ?></p>
			</div>
		<?php } // scholarship not empty
		
		if (!empty($page_content['teaching'])) { ?>

			<div class="span3">
				<h3>Teaching</h3>
				<p><?php echo $page_content['teaching']; ?></p>
			</div>
		<?php } // teaching not empty ?>
			
		</div> <!-- /.row -->
		
	</div> <!-- /.span9 -->
	
</div> <!-- /.row -->

	<hr>

<div class="row">
	<div class="span12">
		<?php if (!empty($page_content['overview'])) { ?>
			<h2>Overview</h2>
			<?php echo $page_content['overview'];
		} ?>
		
		<?php if (!empty($page_content['news'])) { ?>
			<h2>News</h2>
			<?php echo $page_content['news'];
		} ?>
		
		
		
	</div> <!-- /.span12 -->
</div> <!-- /.row -->

<div class="row">
	
	<div class="span12">
		
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
			<?php foreach($page_content['links'] as $link) { ?>
				<li><a href="<?php echo $link; ?>"><?php echo $link; ?></a></li>
			<?php } ?>
		</ul>
		<?php } ?>
		
	</div> <!-- /.span3 -->
</div> <!-- /.row -->