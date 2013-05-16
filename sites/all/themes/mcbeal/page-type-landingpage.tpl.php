<?php $add_css[] = 'landingpage.css'; ?>
<?php $add_js[] = 'jquery.cookie.js'; ?>
<?php include_once('header.php');?>
			
			<?php if ($sidebar_left_1 || $sidebar_left_2 || $sidebar_left_3): ?>
				<div id="sidebar-left"  class="sidebar sidebar-left equalize">
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
<div class="content-area equalize">
	<?php if ($content_top): ?>
		<div id="content-top"  class="content-top">
			<?php print $content_top; ?>
		</div> <!-- /#content-top -->
	<?php endif; ?>

	
	
	
	

	
	
	
	
	
<div id="landingpage-header-area" class="landingpage-header-area clearfix carousel slide">
	<div id="landingpage-header-feature" class="carousel-inner landingpage-header-feature">
		<?php $num_features=0; ?>
		<?php foreach($header_feature AS $key => $feature): ?>
			 <div class="item<?php print $key == 1?' active':''; ?>" style="background: url('/<?php print $feature['feature_img']; ?>') center top no-repeat #000000;">
		            <div class="container">
		                <div class="carousel-caption">
		                    <?php if(!empty($feature['feature_title'])): ?>
		                    <h1><?php print $feature['feature_title']; ?></h1>
		                    <?php endif; ?>
		                    <?php if(!empty($feature['feature_caption'])): ?>
		                    <div class="white-box clearfix">
			                    <?php print $feature['feature_caption']; ?>	
			<?php if(!empty($feature['feature_link']['url'])): ?>
				<?php $target = isset($feature['feature_link']['attributes']['target'])?' target="'.$feature['feature_link']['attributes']['target'].'"':''; ?>
				<a href="<?php print $feature['feature_link']['url']; ?>"<?php print $target?>></a>
			<?php endif; ?>
		                    </div>
		                    <?php endif; ?>
		                </div>
		            </div>
		        </div>
		        <?php $num_features++; ?>
	<?php endforeach; ?>
	</div>
	<?php if($num_features>1):?>
		    <a class="left carousel-control" href="#landingpage-header-area" data-slide="prev">&lsaquo;</a>
		    <a class="right carousel-control" href="#landingpage-header-area" data-slide="next">&rsaquo;</a>
	<?php endif; ?>
	<div class="clear"></div>
</div>
<div id="landingpage-content-area" class="landingpage-content-area">
	<div id="landingpage-content-features" class="landingpage-content-features layout-<?php print $features_layout;?>">
		<ul>
			<li class="feature_1<?php if(empty($feature_1_title) && empty($feature_1_subtitle) && empty($feature_1_image)){ print ' plain-content'; } ?>">
				<?php if($feature_1_title){ ?><h3><?php print $feature_1_title; ?></h3><?php } ?>
				<?php print $feature_1_image; ?>
				<?php if($feature_1_subtitle){ ?><h4><?php print $feature_1_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_1_content; ?></div>
				<?php print $feature_1_link['view']; ?>
			</li>
			<li class="feature_2<?php if(empty($feature_2_title) && empty($feature_2_subtitle) && empty($feature_2_image)){ print ' plain-content'; } ?>">
				<?php if($feature_2_title){ ?><h3><?php print $feature_2_title; ?></h3><?php } ?>
				<?php print $feature_2_image; ?>
				<?php if($feature_2_subtitle){ ?><h4><?php print $feature_2_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_2_content; ?></div>
				<?php print $feature_2_link['view']; ?>
			</li>
			<li class="feature_3<?php if(empty($feature_3_title) && empty($feature_3_subtitle) && empty($feature_3_image)){ print ' plain-content'; } ?>">
				<?php if($feature_3_title){ ?><h3><?php print $feature_3_title; ?></h3><?php } ?>
				<?php print $feature_3_image; ?>
				<?php if($feature_3_subtitle){ ?><h4><?php print $feature_3_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_3_content; ?></div>
				<?php print $feature_3_link['view']; ?>
			</li>
			<li class="feature_4<?php if(empty($feature_4_title) && empty($feature_4_subtitle) && empty($feature_4_image)){ print ' plain-content'; } ?>">
				<?php if($feature_4_title){ ?><h3><?php print $feature_4_title; ?></h3><?php } ?>
				<?php print $feature_4_image; ?>
				<?php if($feature_4_subtitle){ ?><h4><?php print $feature_4_subtitle; ?></h4><?php } ?>
				<div><?php print $feature_4_content; ?></div>
				<?php print $feature_4_link['view']; ?>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
				<?php print $content; ?>
	          	<?php print $feed_icons; ?>
</div>
</div>
	<div class="clear"></div>
	<?php 
	$my_page = $_SERVER['REQUEST_URI']; 
	if($my_page == '/jd-program' || $my_page == '/faculty-staff' ): ?>
	<style type="text/css">
		#highlight-cycle {
			left: 0;
			position: relative;
			top: 0;
		}
		#highlight-cycle .hl {
			display:none;
		}
		#highlight-cycle .hl .bio { margin-top: 0; }
		#highlight-cycle .hl h4 { font-size: 14px; }
		#highlight-cycle .hl p { font-size: 12px; }
	</style>
	<script src="<?php print $base_path . path_to_theme(); ?>/js/jquery.cookie.js" type="text/javascript"></script>    
	<script type="text/javascript">
<!--
function randomInt (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
} // randomint();

var slide_time = 12;
var tallest = 0;
var viewed = 0;
var display_index = 0;
   
$jq(document).ready(function($) {
    // Resize bios to cover all
   
   
    // Select random image based on what's been seen
    if ($.cookie('highlights')) {
        viewed = $.cookie('highlights').split(',');
        viewed.pop();
        if ((viewed.length == 1) && (viewed[0] == '')) {
            viewed.length = 0;
        }
    }
   
    if (viewed.length > 0) {
        var next = parseInt(viewed.pop());
        if (viewed.length >= $('#highlight-cycle .hl').length - 1) {
            display_index = 0;
            $.cookie('highlights', '');
        } else {
            display_index = next + 1;
        }
    }
    
   
    $('#highlight-cycle .hl:eq(' + display_index + ')').addClass('save');
    $.cookie('highlights', $.cookie('highlights') + display_index + ',');
    $('#highlight-cycle .hl').each(function() {
    	if (!$(this).hasClass('save')) {
    		$(this).remove();
    	} else {
    		$(this).css('display', 'block');
    	}
    });

      
});

//-->
</script>
     <?php endif; ?>
	    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
    $jq(document).ready(function($){
		$('#landingpage-header-area').carousel({'interval' : 8000});
	});
    </script>  
<?php include_once('footer.php');?>  	