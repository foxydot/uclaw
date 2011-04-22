<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <link type="text/css" href="<?php print $base_path . path_to_theme() ?>/css/news_page.css" rel="stylesheet" />
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <?php print $scripts; ?>
    <script type="text/javascript" src="<?php print $base_path . path_to_theme() ?>/assets/js/scrollable.js"></script>
    <script type="text/javascript" src="<?php print $base_path . path_to_theme() ?>/assets/js/homepage_jquery.js"></script>
  </head>

  <body class="<?php print $body_classes; ?>">
    
    <div id="page">
		<div id="container">
			<div id="wrapper">
<?php include_once('header.php');?>
<!-- start here -->
    <!-- ______________________ MAIN _______________________ -->
    <div id="main" class="clearfix"></div>
 	<div id="content">
        <div id="content-area">
<?php print $banner; ?>
		<?php $featuredimage = '<img src="" />'?>
		<div id="homeFeatured">
			<?php print $featuredimage;?>
			<div>
				<h2><?php print 'News Item Title'; ?></h2>
				<a href="#">&gt; Read more</a>
			</div>
		</div>	
		
		<?php ?>
		
		<div class="headlines other">			
			<ul>
			
	<?php 
	//$args = array( 'numberposts' => 3, 'category_name' => 'featured-headlines', );
	//$headlines = get_posts($args);
	$headlines = array();
	for($i=0;$i<3;$i++){
		$headlines[$i] = new stdClass;
		$headlines[$i]->post_title = "News Item Title";
		$headlines[$i]->post_excerpt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse adipiscing, tellus vitae accumsan.";
	}
     foreach($headlines AS $hl){
     	//here we pull in one type of view OR am I using DDBlock?
     	?>
     	<li>
			<h3><a href="#" title=" <?php print $hl->post_title; ?>" ><?php print $hl->post_title; ?></a></h3>
			<p><?php print $hl->post_excerpt; ?></p>
			<a class="more" href="#">&gt; Read More</a>
			<div class="clear"></div>
		</li>
		<?php 
     } ?>

			</ul>
		</div> 
		<!-- headlines -->
	
		
		<div class="clear"></div>
		
		<div id="storiesWrap">
			<div id="stories">
				<h5>Highlighted Stories</h5>
				
				<?php 
				print views_embed_view('news','block_5');
				?>
				
				<ul class="items">
				
					<?php 
					$recent_posts = array();
					for($i=0;$i<10;$i++){
						$recent_posts[$i] = new stdClass;
						$recent_posts[$i]->post_title = "News Item Title";
						$recent_posts[$i]->post_excerpt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse adipiscing, tellus vitae accumsan.";
					}					
					foreach($recent_posts AS $rp){ 
					$rpimage = '/sites/all/themes/uclaw/assets/images/production/secondary/news_slider_demo.png';
					?>
					<li>
					<?php //ts_data($rpimage);?>
						<div class="popular-stories"><a href="<?php print '#'; ?>"><img src="<?php print $rpimage; ?>"/></a></div>
						<a href="<?php print '#'; ?>"><?php print $rp->post_title; ?></a>
					</li>
					<?php } ?>
				</ul> <!-- items -->
			</div> <!-- stories -->
			
			<a class="prev browse left"></a>
			<a class="next browse right"></a>
			
		</div> <!-- storiesWrap -->
		
					
		<div class="clear"></div>
	<?php 	
	$sections = array(
		array('title' => 'Press Releases','slug' => 'pressrelease'),
		array('title' => 'Alumni News','slug' => 'alumni'),
		array('title' => 'Faculty News','slug' => 'faculty'),
		array('title' => 'Student News','slug' => 'student'),
		array('title' => 'Publications','slug' => 'publication'),
		array('title' => 'Archives','slug' => 'archive'),
		);
	$count = count($sections); 
	for ($j = 0; $j < $count; $j++){
		$class = $j%2==1?'third':'first third';
		?>
		<div class="<?php print $class; ?>">
			<h4><?php print $sections[$j]['title']; ?></h4>
				<?php 
				print views_embed_view('news','block_3',$sections[$j]['slug']);
				?>
		</div>
	<?php 
	}
	?>
					<div class="clear"></div>
				</div> <!-- content -->







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