		<?php if (!all_empty( $page['highlighted'], $messages, $tabs, $page['help'])) { ?>
		
		<div class="container space-min">
			<?php if (!empty($page['highlighted'])) { ?>
				<div class="row">
					<div class="span12">
						<div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
					</div>
				</div>
			<?php } ?>

			<?php if (!empty($messages)) { ?>
				<div class="row">
					<div class="span12">
						<?php print $messages; ?>
					</div>
				</div>
			<?php } ?>


			<?php if (!empty($tabs)) { ?>
				<div class="row">
					<div class="span12">
						<?php print render($tabs); ?>
					</div>
				</div>
			<?php } ?>


			<?php if (!empty($page['help'])) { ?>
				<div class="row">
					<div class="span12">
						<div class="well"><?php print render($page['help']); ?></div>
					</div>
				</div>
			<?php } ?>

		</div>
		<?php } // all_not_empty() ?>	
		
		<?php if (!empty($page_content['banners'])) { ?>
		<div id="home-carousel" class="carousel slide hidden-phone">
		   
		    <div class="carousel-inner">
		    
		        <?php $i = 0; foreach($page_content['banners'] as $banner) { ?>
				 <div class="item<?php echo (($i == 0) ? ' active' : NULL); ?>" style="background: url('<?php echo $banner['image']; ?>') center top no-repeat #000000;background-size: cover;">
	                <div class="carousel-caption">
	                    <?php if (!empty($banner['title'])) { ?><h1><?php echo strip_tags($banner['title']); ?></h1><?php } ?>
	                     
	                    <?php if ((!empty($banner['caption'])) || (!empty($banner['link']))) { ?>
	                    <div class="white-box clearfix">
		                    <?php if (!empty($banner['caption'])) { ?> <p><?php echo strip_tags($banner['caption']); ?></p><?php } ?>
		                    <?php if (!empty($banner['link'])) { ?><a href="<?php echo $banner['link']; ?>" target="_blank"></a><?php } ?>
	                    </div>
	                    <?php } ?>
	                    
	                </div>
		        </div>
		        <?php $i++; } ?>
					
		    </div>
		    <a class="left carousel-control" href="#home-carousel" data-slide="prev">&lsaquo;</a>
		    <a class="right carousel-control" href="#home-carousel" data-slide="next">&rsaquo;</a>
		    
		</div> <!-- /#home-carousel -->
		<?php } ?>
		
		<!-- Numbers -->
		
		<div class="row numbers">
			<div class="container">

				
				<div class="row">
					<?php foreach($page_content['grey_features'] as $grey) { ?>
					
					<div class="span4">
						<a href="<?php echo $grey['link']; ?>">
							<h4>
								<?php echo $grey['title']; ?>
								<span><?php echo $grey['subhead']; ?></span>
							</h4>
							<p><?php echo $grey['text']; ?></p>
						</a>
						
					</div>
					
					<?php } ?>
					
					
					
				</div>
			</div>
		</div> <!-- /.numbers -->
		
		<div class="container">
			<div class="row">

				<div class="span4 date-list">
				
					<!-- Events -->
					<h3 class="red">Upcoming Events</h3>
					
						<?php 
							echo views_embed_view('Events', 'home_events_block');
						?>
					
					<a href="/events/" class="pull-right"><strong>More Events</strong> <i class="icon-double-angle-right"></i></a>

				</div>
				
				<?php if (!empty($page_content['features'])) { ?>

				<div class="span8 news clearfix">
					<!-- News -->
					<h3 class="red">Law School Highlights</h3>
					
					<?php
						foreach($page_content['features'] as $feature) { ?>
						
						<section class="story clearfix">
							<a href="<?php echo $feature['link']; ?>">
							
								<?php if (!empty($feature['image'])) { ?><img src="<?php echo $feature['image']; ?>" alt="<?php echo $feature['title']; ?>" title="" width="75" height="75"><?php } ?>			
								<h4 class="title"><?php echo $feature['title']; ?></h4>
								<p><?php echo $feature['content']; ?></p>
							</a>
						</section>
						
						<?php } ?>
					
					
					<div class="clearfix"></div>
					<a href="/news/home" class="pull-right"><strong>More News</strong> <i class="icon-double-angle-right"></i></a>
					
				</div>
				<?php } // !empty $page_content['features'] ?>
				
			</div>
		</div> <!-- /.container -->		
			

<?php /*
  
  <div class="row-fluid">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="span3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>  

    <section class="<?php print _bootstrap_content_span($columns); ?>">  
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <div class="well"><?php print render($page['help']); ?></div>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>
*/ ?>
