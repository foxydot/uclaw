<?php $add_css[] = 'homepage.css'; ?>
<?php include_once('header.php');?>
			<div class="content-area">
				<?php if ($content_top): ?>
					<div id="content-top"  class="content-top">
						<?php print $content_top; ?>
					</div> <!-- /#content-top -->
				<?php endif; ?>
<?php //new chunk ?>
		<div id="home-carousel" class="carousel slide">
		    <div class="carousel-inner">
		        
	<?php foreach($header_feature AS $key => $feature): ?>
			 <div class="item<?php print $key == 1?' active':''; ?>" style="background: url('<?php print $feature['feature_img']; ?>') center top no-repeat #000000;">
		            <div class="container">
		                <div class="carousel-caption">
		                    <h1><?php print $feature['feature_title']; ?></h1>
		                    <div class="white-box clearfix">
			                    <?php print $feature['feature_caption']; ?>	
			<?php if(!empty($feature['feature_link']['url'])): ?>
				<?php $target = isset($feature['feature_link']['attributes']['target'])?' target="'.$feature['feature_link']['attributes']['target'].'"':''; ?>
				<a href="<?php print $feature['feature_link']['url']; ?>"<?php print $target?>></a>
			<?php endif; ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		
	<?php endforeach; ?>

		
		    </div>
		    <a class="left carousel-control" href="#home-carousel" data-slide="prev">&lsaquo;</a>
		    <a class="right carousel-control" href="#home-carousel" data-slide="next">&rsaquo;</a>
		    
		</div> <!-- /#home-carousel -->
		
		<!-- Numbers -->
		
		<div class="row numbers">
			<div class="container">

				
				<div class="row">
					
					<div class="span4">
						<h4><?php print $sb1_title; ?><span><?php print $sb1_subtitle; ?></span></h4>
						<?php print $sb1_content; ?>
						<?php print $sb1_link['view']; ?>
					</div>
					<div class="span4">
						<h4><?php print $sb2_title; ?><span><?php print $sb2_subtitle; ?></span></h4>
						<?php print $sb2_content; ?>
						<?php print $sb2_link['view']; ?>
					</div>
					<div class="span4">
						<h4><?php print $sb3_title; ?><span><?php print $sb3_subtitle; ?></span></h4>
						<?php print $sb3_content; ?>
						<?php print $sb3_link['view']; ?>
					</div>
					
				</div>
			</div>
		</div>	
			
			<div class="container">
			<div class="row">
			
				<div class="span4 events">
					<!-- Events -->
					<?php 
					$block = module_invoke('views', 'block', 'view', 'Events-block_1');
					print '<h3>'.$block['subject'].'</h3>
					'.$block['content'];
					 ?>
				</div>
				
				<div class="span8 news clearfix">
					<!-- News -->
					<h3 class="red">Highlights</h3>
					
					<section class="story clearfix">
						<?php print $feature_1_image; ?>
						<h4 class="title"><?php print $feature_1_title; ?></h4>
						<h4><?php print $feature_1_readmore['view']?preg_replace('/full-width/i','half-width',$feature_1_link['view']):$feature_1_link['view']; ?></h4>
						<a class="more" href="<?php print ($feature_4_link['url']); ?>">Read More</a>
					</section>
					<section class="story clearfix">
						<?php print $feature_2_image; ?>
						<h4 class="title"><?php print $feature_2_title; ?></h4>
						<h4><?php print $feature_2_readmore['view']?preg_replace('/full-width/i','half-width',$feature_2_link['view']):$feature_2_link['view']; ?></h4>
						<a class="more" href="<?php print ($feature_4_link['url']); ?>">Read More</a>
					</section>
					<section class="story clearfix">
						<?php print $feature_3_image; ?>
						<h4 class="title"><?php print $feature_3_title; ?></h4>
						<h4><?php print $feature_3_readmore['view']?preg_replace('/full-width/i','half-width',$feature_3_link['view']):$feature_3_link['view']; ?></h4>
						<a class="more" href="<?php print ($feature_4_link['url']); ?>">Read More</a>
					</section>
					<section class="story clearfix">
						<?php print $feature_4_image; ?>
						<h4 class="title"><?php print $feature_4_title; ?></h4>
						<h4><?php print $feature_4_readmore['view']?preg_replace('/full-width/i','half-width',$feature_4_link['view']):$feature_4_link['view']; ?></h4>
						<a class="more" href="<?php print ($feature_4_link['url']); ?>">Read More</a>
					</section>
					
					<a href="/news/home" class="pull-right">> <strong>More News</strong></a>
					
				</div>
				
			</div>
		</div> <!-- /.container -->
		
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
    jQuery(document).ready(function(){
		$('#home-carousel').carousel({'interval' : 8000});
	});
    </script>      	
<?php include_once('footer.php');?>	   