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
		$('ul.nice-menu-right a.active').parent().parent().show();
	});
    </script>
 
<style>
@import 'css/reset.css';
@import 'css/nice_menus.css';
address {font-style: normal;}

body {background: url('images/law-school-pg-bkg.jpg') repeat scroll center top #D2C7A0;}
.page_wrapper {margin: .8em 0 0 0;}
.full_width {display: block;float: none;width: 100%;position:relative;}
.wrapper {display: block;float:none;margin:0 auto;width: 980px;}

.header.full_width {background: #ffffff;
-webkit-box-shadow: 0px 0px 6px 0 #000000;
-moz-box-shadow: 0px 0px 6px 0 #000000;
box-shadow: 0px 0px 6px 0 #000000;
z-index: 1000;
  }
.primary-nav.full_width {background: #CF0101;height: 44px;z-index:600;}

.header .wrapper {background: url('images/law-school-hdr-bkg.jpg') no-repeat center top;
height: 135px;}
.body .wrapper {background: #ffffff;}
.body .breadcrumb {height: 50px;}
.body .sidebar {width: 200px;}
.body .sidebar-left {float:left;margin-right: 20px;background:purple;}
.body .content-area {float: left;width:760px;background:aqua;}
.footer .wrapper {background: url('images/law-school-ftr-bkg.png') repeat-x center top; padding: 12px 0 0 0;}

.clear {clear:both;float:none;}

.header .university-of-cincinnati a {
    display: block;
    float: left;
    height: 135px;
    text-indent: -9000px;
    width: 180px;
}
.header .college-of-law a {
    display: block;
    float: left;
    height: 135px;
    text-indent: -9000px;
    width: 180px;
}


body {color: #555555;
    font-family: 'Trebuchet MS',Arial,Tahoma,Verdana;
    font-size: .75em;}
.footer, .footer a {color: #897458;}
.footer {font-size:.9em;line-height:1.2em;}
.footer ul li {display:inline;float: left;margin:0 30px 0 0;width:200px;}

</style>
</head>
<body class="<?php print $body_classes; ?>">
<div class="page_wrapper">
	<div id="header" class="header full_width">
		<div class="wrapper">
			<h2 class="university-of-cincinnati"><a href="http://www.uc.edu" target="_blank">University of Cincinnati</a></h2>
			<h1 class="college-of-law"><a href="/">College of Law</a></h1>
		</div>
	</div>
	<div id="primary-nav" class="primary-nav navigation full_width">
		<div class="wrapper">
			<?php if (!empty($primary_navigation)){ print theme('links', $primary_navigation, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
		</div>
	</div>
	<div id="body" class="body full_width">
		<div class="wrapper">
			<?php if ($breadcrumb): ?>
				<div id="breadcrumb"  class="breadcrumb">
					<?php print $breadcrumb; ?>
				</div> <!-- /#breadcrumb -->
			<?php endif; ?>
			<?php if ($sidebar_left_1 || $sidebar_left_2 || $sidebar_left_3): ?>
				<div id="sidebar-left"  class="sidebar sidebar-left">
					<?php if ($sidebar_left_1): ?>
						<div id="sidebar-left-1"  class="sidebar-left-1">
							<?php print $sidebar_left_1; ?>
						</div> <!-- /#sidebar-left-1 -->
					<?php endif; ?>
					<?php if ($sidebar_left_2): ?>
						<div id="sidebar-left-2"  class="sidebar-left-2">
							<?php print $sidebar_left_2; ?>
						</div> <!-- /#sidebar-left-2 -->
					<?php endif; ?>
					<?php if ($sidebar_left_3): ?>
						<div id="sidebar-left-3"  class="sidebar-left-3">
							<?php print $sidebar_left_3; ?>
						</div> <!-- /#sidebar-left-3 -->
					<?php endif; ?>
				</div> <!-- /#sidebar-left -->
			<?php endif; ?>
			<div class="content-area">
				<?php if ($content_top): ?>
					<div id="content-top"  class="content-top">
						<?php print $content_top; ?>
					</div> <!-- /#content-top -->
				<?php endif; ?>
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
	          		<div class="content">
						<?php print $content; ?>
					</div>
	          	<?php } ?>
	          	<?php print $feed_icons; ?>
				<?php if ($content_bottom): ?>
					<div id="content-bottom"  class="content-bottom">
						<?php print $content_bottom; ?>
					</div> <!-- /#content-bottom -->
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="footer" class="footer full_width">
		<div class="wrapper">
			<?php if(!empty($footer_message) || !empty($footer_block)): ?>
				<?php print $footer_message; ?>
				<?php print $footer_block; ?>
			<?php endif; ?>
			<ul>
				<li class="highlight">&copy; University of Cincinnati <?php print date("Y"); ?><br />
				All Rights Reserved.</li>
				<li><address>PO Box 210040<br />
				Clifton Avenue &amp; Calhoun Street<br/>
				Cincinnati, OH 45221-0040</address></li>
				<li><address>513-556-6805 (p) / 513-556-2391 (f)</address><br />
				<a href="mailto:webmaster@law.uc.edu">webmaster@law.uc.edu</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php print $closure; ?>
</body>
</html>