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
	
	
	<?php /* End old stuff */ ?>

		<footer>
			<div class="container">
				<div class="row">
					
					<div class="span3 offset2">
						<img src="<?php global $theme_path;echo $theme_path;?>/images/footer-logo.jpg" alt="UC College of Law, Est. 1833">
						<p>&copy; University of Cincinnati 2013<br />All Rights Reserved.</p>
						
						<div class="social">
							<a class="facebook" href="#"></a>
							<a class="twitter" href="#"></a>
							<a class="youtube" href="#"></a>
						</div>

					</div>
					
					<div class="span4 offset2">
						<p>PO Box 210040<br />Clifton Avenue &amp; Calhoun Street<br />Cincinnati, OH 45221-0040</p>
						<p>
							<abbr title="Phone">P: </abbr>513-556-6805<br />
							<abbr title="Fax">F: </abbr>513-556-2391<br />
							<abbr title="Email">E: </abbr><a href="mailto:webmaster@law.uc.edu">webmaster@law.uc.edu</a>
						</p>
					</div>
					
				</div>
				
				<div class="row">
					<nav>
						<a href="/prospective-students/admissions/directions">Directions</a>
						<a href="/sites/default/files/WestCampus-July2006-clr.pdf" target="_blank">Maps</a>
						<a href="/alumni/support">Giving</a>
						<a href="http://www.cincinnatiusa.com/about/">Explore Cincinnati</a>
						<a href="/prospective-students/admissions/visit-college-law">Schedule A Visit</a>
						<a href="/prospective-students/admissions/application-materials-fall">Apply Now</a>
					</nav>
				</div>
			</div>
		</footer>	
		
<?php print $footer; ?>
<?php print $closure; ?>
</body>
</html>