<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <?php print $scripts; ?>
    <script type="text/javascript">
    jQuery(document).ready(function(){
		$('ul.nice-menu-right>li.menuparent>a').click(function() {
			$(this).next().toggle('slow');
			return false;
		}).next().hide();
		$('ul.nice-menu-right>li.menuparent>span.nolink').click(function() {
			$(this).next().toggle('slow');
			return false;
		}).next().hide();
	});
    </script>
  </head>

  <body class="<?php print $body_classes; ?>">
    
    <div id="page">
		<div id="container">
			<div id="wrapper">
<?php include_once('header.php');?>
    
    <!-- +++++++++++++++++++++ BANNER ++++++++++++++++++++++ -->
    
    <?php if ($banner): ?>
			<?php print $banner; ?>
	<?php else: ?>
	    <div id="bannerHome"><script type="text/javascript" src="<?php print $base_path . path_to_theme() ?>/assets/js/randHome.js"></script> </div>
    <?php endif; ?>
        
<!-- start here -->
    <!-- ______________________ MAIN _______________________ -->
    
    
          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>
          
    <div id="main" class="clearfix"></div>
      <div id="content">
        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
              <?php print $left; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-left -->
        <div id="content-inner" class="inner column<?php print $left?' center':'';?>">

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">

              <?php // print $breadcrumb; ?>

              <?php if ($title&&!$is_front): ?>
                <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>

              <?php if ($mission): ?>
                <div id="mission"><?php print $mission; ?></div>
              <?php endif; ?>

              <?php print $messages; ?>

              <?php print $help; ?> 

              <?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>

            </div> <!-- /#content-header -->
          <?php endif; ?>

          <div id="content-area">
            
           <?php if(!empty($sidebar_image['filepath']) || $sidebar_text){?>           
                <div class="right-sidebar resources">
                <?php if(!empty($sidebar_image['filepath'])){ ?>
                	<img src="/<?php print $sidebar_image['filepath']; ?>" alt="<?php print $sidebar_image['data']['alt']; ?>" title="<?php print $sidebar_image['data']['title']; ?>" />
                <?php } ?>
          		<?php print $sidebar_text; ?>
          		</div>
          		<div class="content-col-narrow">
          		 <?php print $content; ?>
          		</div>
          	<?php } else {?>
          	 <?php print $content; ?>
          	<?php } ?>
          
           
          </div> <!-- /#content-area -->

          <?php print $feed_icons; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>

          </div>
          <div class='clearfix'></div>
        </div> <!-- /content-inner /content -->
		
        <?php if ($right): ?>
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner">
              <?php print $right; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-second -->

      </div> <!-- /main -->
      
      </div> <!-- /wrapper -->
</div> <!-- /container -->
<!-- end here -->
      <!-- ______________________ FOOTER _______________________ -->

        <div id="footer">
	      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
          <?php print $footer_message; ?>
          <?php print $footer_block; ?>
 	     <?php endif; ?>
 	     	<ul>
		<li class="highlight">&copy; University of Cincinnati <?php print date("Y"); ?>.</li>
		<li>All Rights Reserved.</li>
	</ul>
	<ul>
		<li>PO Box 210040</li>
		<li>Clifton Avenue & Calhoun Street</li>
		<li>Cincinnati, OH 45221-0040</li>
	</ul>
	<ul>
		<li>513-556-6805 (p) / 513-556-2391 (f)</li>
		<li><a href="mailto:webmaster@law.uc.edu">webmaster@law.uc.edu</a></li>
	</ul>
	<div class="clear"></div>
        </div> <!-- /footer -->

    </div> <!-- /page -->
    <?php print $closure; ?>
  </body>
</html>