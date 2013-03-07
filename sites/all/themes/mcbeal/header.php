<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php if($add_css){ 
    	foreach($add_css AS $this_css){
    		print '<link href="'.$base_path . path_to_theme().'/css/'.$this_css.'" media="screen" rel="stylesheet" type="text/css">'; 
    	}
    }?>
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <!--[if gte IE 8]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie.css";</style><![endif]-->
    <?php print $scripts; ?>
    <?php if($add_js){ 
    	foreach($add_js AS $this_js){
    		print '<script type="text/javascript" src="'.$base_path . path_to_theme().'/js/'.$this_js.'"></script>';
       	}
    }?>
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
</head>
<body class="<?php print $body_classes; ?>">
<header>
		
			<!-- Header bar -->
			<div class="row top-nav">
				<div class="container">
					<div class="row">
						<!-- SUBNAV -->
						<?php if (!empty($secondary_links)): ?>
				          <nav id="subnav" class="span8 wrapper menu with-sub-menu">
				            <?php print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); ?>
				          </nav> <!-- /navigation -->
				        <?php endif; ?>
						<!-- SUBNAV -->

						<div class="span3 pull-right">
							<?php print $search_box; ?>	
						</div>
					</div>
				</div>
			</div>
			
			<!-- Banner -->
			<div class="row top-bar">
				<div class="container">
					<div class="row">
						<div class="span7 logos">
							<h2 class="university-of-cincinnati"><a href="http://www.uc.edu" target="_blank">University of Cincinnati</a></h2>
							<h1 class="college-of-law"><a href="/">College of Law</a></h1>
						</div>
						<div class="span5">
							<a href="/prospective-students/admissions/application-materials-fall" class="block apply">Apply<br>Now</a>
							<a href="/prospective-students/admissions/visit-college-law " class="block visit">Schedule<br>A Visit</a>
							<a href="http://www.cincinnatiusa.com/about" target="_blank" class="block explore">Explore<br>Cincinnati</a>
						</div>
					</div>
				</div>
			</div>
			
						<!-- Main Navigation -->
			<div class="row main-nav">
				<div class="container">
					<nav class="row">
						<?php if (!empty($primary_navigation)){ print $primary_navigation; } ?>
					</nav>
				</div>
			</div>
			
		</header>


<?php /* Old stuff */ ?>
<div class="clear"></div>
	<div id="body" class="body<?php if (!$sidebar_left_1 && !$sidebar_left_2 && !$sidebar_left_3): ?>
	full_width
	<?php endif;?>">
		<div class="wrapper<?php print drupal_is_front_page()?'':' container'; ?>">
		<?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">
				<?php print $is_front?'':$breadcrumb; ?>

              <?php if ($mission): ?>
                <div id="mission"><?php print $mission; ?></div>
              <?php endif; ?>

              <?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>

              <?php print $messages; ?>

              <?php print $help; ?> 

            </div> <!-- /#content-header -->
          <?php endif; ?>		