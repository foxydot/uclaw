<?php $add_css[] = 'facultypage.css'; ?>
<?php $add_css[] = '../../../modules/quicktabs/css/quicktabs.css'; ?>
<?php $add_css[] = '../../../modules/quicktabs/tabstyles/uclaw/uclaw.css'; ?>
<?php $add_js[] = 'quicktabs.js'; ?>

<?php include_once('header.php');?>

    <script type="text/javascript">
	<!--//--><![CDATA[//><!--
	jQuery.extend(Drupal.settings, { "quicktabs": { "qt_100": { "tabs": [ 0, 0, 0, 0, 0 ] } } });
	//--><!]]>
	</script>
<!-- start here -->
    <!-- ______________________ MAIN _______________________ -->

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>
          
    <div id="main" class="clearfix"></div>

          <div id="content-area">
             <?php if($edit){ print $content; } else { ?>
          	<div id="sd_content_left">
          		<div class="resources">
          		<?php print_r($image); ?>
          		<?php print $contact_info.$teaching.$education.$links.$subjects; ?>
          		</div>
          	</div>
          	<div id="sd_content_right">
          	  <?php if ($title): ?>
                <h2><span class="feature"><?php print $title; ?></span><br />
                <?php print $staff_title; ?></h2>
              <?php endif; ?>
              <br />
              <?php print $the_content; ?>
<?php /* ?>              
<div id="block-quicktabs-100" class="clearfix">
    <div class="content">
      <div id="quicktabs-100" class="quicktabs_wrapper quicktabs-style-uclaw quicktabs-processed">
      	<ul class="quicktabs_tabs quicktabs-style-uclaw">
			<?php print $qt_tabs; ?>
      	</ul>
      <div id="quicktabs_container_100" class="quicktabs_main quicktabs-style-uclaw">
      		<?php print $qt_pages; ?>
	</div>
</div>
<?php */ ?>

  </div> <!-- /block-inner -->
</div> <!-- /block -->
          <?php //print $content; ?>
          	<?php } ?>
          	<div class="clearfix"></div>

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

	         <div class="clear"></div>
<?php include_once('footer.php');?>	   