	
		<!-- Content -->
		<section id="content">
			<div class="container">
				
				<?php if (!empty($breadcrumb)) { ?>
					<div class="row">
						<div class="span12">
							<ul class="breadcrumb">

					<?php
					
						echo $breadcrumb;
						
						$title = drupal_get_title();
						if ($title) { ?><li class="active"><?php echo $title; ?></li><?php } ?>
								
							</ul>
						</div>
					</div>

					<?php } // !empty $breadcrumb ?>
				
				
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

				    <?php if (!empty($page['sidebar'])) { $has_sidebar = TRUE; ?>
				    <div id="sidebar" class="span3">
				        <?php print render($page['sidebar']); ?>
				    </div>
				    <?php } ?>  

					<div id="main" class="<?php if (!empty($page['sidebar'])) { ?>span9<?php } else { ?>span12<?php } ?>">
						<?php print render($page['content']); ?>
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


