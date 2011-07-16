		<!-- SUBNAV -->
		<?php if (!empty($secondary_links)): ?>
          <div id="subnav" class="menu with-sub-menu">
            <?php print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); ?>
          </div> <!-- /navigation -->
        <?php endif; ?>
		<!-- SUBNAV -->

    <!-- ______________________ HEADER _______________________ -->

    <div id="header">
<!-- HEADER -->
			<h2><a href="http://www.uc.edu" target="_blank">University of Cincinnati</a></h2>
			<h1><a href="/">College of Law</a></h1>
            <?php print $search_box; ?>		
            <?php if (!empty($primary_links)){ print theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
    </div> <!-- /header -->