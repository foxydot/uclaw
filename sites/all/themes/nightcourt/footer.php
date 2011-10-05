
				<?php if ($content_bottom): ?>
					<div id="content-bottom"  class="content-bottom">
						<?php print $content_bottom; ?>
					</div> <!-- /#content-bottom -->
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
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
<?php print $footer; ?>
<?php print $closure; ?>
</body>
</html>