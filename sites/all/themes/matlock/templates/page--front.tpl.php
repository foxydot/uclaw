		<div id="home-carousel" class="carousel slide">
		   
		    <div class="carousel-inner">
		    
		        <?php $i = 0; foreach($content['banners'] as $banner) { ?>
				 <div class="item<?php echo (($i == 0) ? ' active' : NULL); ?>" style="background: url('<?php echo $banner['image']; ?>') center top no-repeat #000000;background-size: cover;">
		            <div class="container">
		                <div class="carousel-caption">
		                    <h1><?php echo $banner['title']; ?></h1>
		                    <div class="white-box clearfix">
			                    <p><?php echo $banner['caption']; ?></p>
			                    <?php if (!empty($banner['link'])) { ?>
								<a href="<?php echo $banner['link']; ?>" target="_blank"></a>
								<?php } ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <?php $i++; } ?>
					
		    </div>
		    <a class="left carousel-control" href="#home-carousel" data-slide="prev">&lsaquo;</a>
		    <a class="right carousel-control" href="#home-carousel" data-slide="next">&rsaquo;</a>
		    
		</div> <!-- /#home-carousel -->
		
		
		<!-- Content -->
		<section id="content">
			<div class="container">
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


				<div class="row">

					<div id="main" class="span12">
						<?php //print render($page['content']); ?>
					</div>
				</div>
		</section>
			

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

  </div>
</div>


