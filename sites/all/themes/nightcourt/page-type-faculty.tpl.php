<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/quicktabs/css/quicktabs.css" />
	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/quicktabs/tabstyles/nightcourt/nightcourt.css" />
    
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <?php print $scripts; ?> 
    <script src="<?php print $base_path . path_to_theme() ?>/assets/js/quicktabs.js?" type="text/javascript"></script>
    <script type="text/javascript">
	<!--//--><![CDATA[//><!--
	jQuery.extend(Drupal.settings, { "quicktabs": { "qt_100": { "tabs": [ 0, 0, 0, 0, 0 ] } } });
	//--><!]]>
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
        <div id="content-inner" class="inner column<?php print $left?' center':'';?>">


          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">

              <?php // print $breadcrumb; ?>

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
             <?php if($edit){ print $content; } else { ?>
          	<div id="sd_content_left">
          		<div class="resources">
          		<?php print_r($image); ?>
          		<?php print $contact_info.$education.$links.$subjects; ?>
          		</div>
          	</div>
          	<div id="sd_content_right">
          	  <?php if ($title): ?>
                <h2><span class="feature"><?php print $title; ?></span><br />
                <?php print $staff_title; ?></h2>
              <?php endif; ?>
              <br />
              
<div id="block-quicktabs-100" class="clearfix">
    <div class="content">
      <div id="quicktabs-100" class="quicktabs_wrapper quicktabs-style-nightcourt quicktabs-processed">
      	<ul class="quicktabs_tabs quicktabs-style-nightcourt">
			<?php print $qt_tabs; ?>
      	</ul>
      <div id="quicktabs_container_100" class="quicktabs_main quicktabs-style-nightcourt">
      		<?php print $qt_pages; ?>
	</div>
</div>


  </div> <!-- /block-inner -->
</div> <!-- /block -->
              
              
              
              
              
              
              
          	
            <?php //print $content; ?>
          	</div>
          	<?php } ?>
          	<div class="clearfix"></div>
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

        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
              <?php print $left; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-left -->

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