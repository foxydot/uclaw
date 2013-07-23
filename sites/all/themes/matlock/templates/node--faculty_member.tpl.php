<div class="row">

	<div class="span3">
		<img src="http://placehold.it/240x365" class="img-polaroid" alt="Name">
	</div> <!-- /.span3 -->
	
	<div class="span9">
		<h1><?php echo $page_content['firstname'], ' ', $page_content['lastname']; ?></h1>
		<h2><?php echo $page_content['title']; ?></h2>
		
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
		<?php
			if (!empty($page_content['contact'])) {
				foreach($page_content['contact'] as $con) {
			?>
				<p><?php echo $con; ?></p>
		<?php }
			}
			
			if (!empty($page_content['email'])) { ?>
				<p><abbr title="Email">e:</abbr> <?php echo $page_content['email']; ?></p>
			<?php } ?>
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
	<?php if (!empty($page_content['overview'])) { ?>
	<div class="span8">
		<h2>Overview</h2>
		<?php echo $page_content['overview']; ?>
	</div> <!-- /.span8 -->
<?php } ?>
	
	<div class="span4">
		<div class="well">
			<h3>Awards</h3>
			<ul class="nobullet list-space icons-ul">
				<li><i class="icon-legal"></i> Goldman Prize for Excellence in Teaching, University of Cincinnati College of Law, April 2010</li>
				<li><i class="icon-legal"></i> University President’s Excellence Award for Teaching, University of Cincinnati, May 2006.</li>
				<li><i class="icon-legal"></i> American College of Civil Trial Mediators, 1998 Education/Training Achievement Award</li>
				<li><i class="icon-legal"></i> Center for Public Resources (CPR) Institute for Dispute Resolution, 1995 Second Prize for Excellence, Articles, "The Value of Decision Analysis in Mediation Practice," Negotiation Journal 11.2: 123-134 (1995)</li>
			</ul>
			
			<h3>Links</h3>
			
			<ul class="nobullet list-space">
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
			</ul>
		</div> <!-- /.well -->

	</div> <!-- /.span3 -->
</div> <!-- /.row -->