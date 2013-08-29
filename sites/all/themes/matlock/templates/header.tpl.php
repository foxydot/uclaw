<header>
	<!-- Banner -->
	<div class="top-bar">
	
		<div class="container visible-phone visible-tablet hidden-desktop">
			<div class="row">
				<div class="span12">
					<?php if (theme_get_setting('logo')): ?>
				        <a class="brandmark" href="/" title="<?php print t('Home'); ?>">
				          <img src="<?php print theme_get_setting('logo'); ?>" alt="<?php print t('Home'); ?>" width="275">
				        </a>
				      <?php endif; ?>
				</div>
			</div>
		</div>
	
		<div class="container hidden-tablet hidden-phone">
			<div class="row">
				<div class="span5">
					<?php if (theme_get_setting('logo')): ?>
				        <a class="brandmark" href="/" title="<?php print t('Home'); ?>">
				          <img src="<?php print theme_get_setting('logo'); ?>" alt="<?php print t('Home'); ?>" />
				        </a>
				      <?php endif; ?>
				</div>
				<div class="span7">
				
					<div class="row">
						<div class="span7">
							<ul class="inline quicklinks">
								<li><a href="http://www.law.uc.edu/prospective-students/admissions/application-materials-fall"><i class="icon-file"></i> Apply Now</a></li>
								<li><a href="http://www.law.uc.edu/prospective-students/admissions/visit-college-law "><i class="icon-calendar"></i> Schedule A Visit</a></li>
								<li><a href="http://www.cincinnatiusa.com/about" target="_blank"><i class="icon-map-marker"></i> Explore Cincinnati</a></li>
							</ul>	
						</div>
					</div>
					
					<div class="row">
						<div class="span7">
							<nav id="secondary-nav">
								<ul class="clearfix">
								
									<li><a href="/faculty-staff">Faculty</a></li>
									
									<li><a href="/directory/staff">Staff</a></li>
									
									
									<li><a href="/alumni">Alumni</a></li>
									
									
									<li><a href="/library">Library</a></li>
									
									<li><a href="/current-students">Current Students</a></li>
									
									<li><a href="#"><i class="icon-search"></i></a>
										<ul class="sub search">
											<li>
												<form name="search" action="/search/node" method="post" id="header-search">
													<div class="input-append">
														<input type="text" name="search" placeholder="Search..." class="input-medium">
														<button class="btn" type="submit">Go</button>
													</div>
												</form>
											</li>
										</ul>
									</li>
								</ul>


							</nav>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	
	<a id="main-menu-toggle" class="visible-tablet visible-phone" href="#newnav"><span>Toggle menu</span></a>
	 
	<script>
		(function($) {
			$(document).ready(function() {
				$('#main-menu-toggle').sidr({'source': '#newnav, #secondary-nav', 'side': 'right'});
			});
		})(jQuery);
	</script>

	<!-- Main Navigation -->
	<div class="main-nav new  hidden-tablet hidden-phone">
		<div class="container">
			<nav id="newnav" class="row top-level">
				<a href="/about-us">About Us</a><!--
				--><a href="/admissions">Admissions</a><!--
				--><a href="/academics">Academics</a><!--
				--><a href="/experiences">Experiences</a><!--
				--><a href="/career">Careers</a><!--
				--><a href="/centers">Centers</a><!--
				--><a href="/international">International</a>
			</nav>
		</div>
		
		<div class="row  hidden-tablet hidden-phone" id="main-dropdown">
			<section>
				<ul>
					<li><a href="/about-us/fast-facts">Fast Facts</a></li>
					<li><a href="/prospective-students/admissions/consumer-information">ABA Information</a></li>
					<li><a href="/about-us/history">History</a></li>
					<li><a href="/our-university">Our University</a></li>
					<li><a href="/advantage">Cincinnati and Region</a></li>
					<li><a href="/about-us/board-of-visitors">Board of Visitors</a></li>
					<li><a href="/alumni/new-building">New College of Law Building</a></li>
					<li><a href="/prospective-students/admissions/visit-college-law">Visit Us</a></li>
					<li><a href="/about-us/contact-us">Contact Us</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="/jd-admissions">JD Admissions</a></li>
					<li><a href="/value">Financial Aid</a></li>
					<li><a href="/prospective-students/admissions/transfer-and-visiting-students">Transfer/Visiting Students</a></li>
					<li><a href="/flex-time-program">Flexible Time Program</a></li>
					<li><a href="/prospective-students/admitted-students">Admitted Students</a></li>
					<li><a href="/guest-students">Guest Students</a></li>
					<li><a href="/institutes-centers/llm/application">LLM Admissions</a></li>
					<li><a href="/admissions-certificate-programs">Certificate Admissions</a></li>
					<li><a href="/prospective-students/admissions/visit-college-law">Visit Us</a></li>
					<li><a href="/prospective-students/contact-us">Contact Us</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="/jd-program">JD Program</a></li>
					<li><a href="/prospective-students/academic-programs/areas-study">Professional Pathways</a></li>
					<li><a href="#">Faculty</a></li>

					<li><a href="/academic-calendar">Academic Calendar</a></li>
					<li><a href="/joint-degree">Joint Degree Programs</a></li>
					<li><a href="/lectures-visitors">Lectures and Visitors</a></li>
					<li><a href="/current-students/academic-success-program">Academic Success Program</a></li>
					<li><a href="/institutes-centers/llm">LLM Program</a></li>
					<li><a href="/graduate-certificate-program">Certificate Programs</a></li>
					<li><a href="/current-students/department-of-curriculum-and-student-affairs">Contact Us</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="/clinics">Clinics</a></li>
					<li><a href="/externships">Externships</a></li>
					<li><a href="/journals">Journals</a></li>
					<li><a href="/current-students/student-orgs/moot-court-program#">Moot Court</a></li>
					<li><a href="/institutes-centers/center-practice/trial-practice#">Trial Practice</a></li>
					<li><a href="/current-students/practical-experiences/alternative-dispute-resolution">Alternative Dispute Resolution</a></li>
					<li><a href="/fellowships">Fellowships</a></li>
					<li><a href="/current-students/practical-experiences/american-inn-court">American Inn of Court</a></li>
					<li><a href="/sites/default/files/writingcompetition_0.xls">Writing Competitions</a></li>
					<li><a href="/current-students/student-orgs">Student Organizations</a></li>
					<li><a href="/current-students/practical-experiences/volunteer-opportunities">Pro Bono/Volunteer</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="https://law-uc-csm.symplicity.com/" target="_blank">Symplicity</a></li>
					<li><a href="/career/student">Students</a></li>
					<li><a href="/career/alumni">Alumni</a></li>
					<li><a href="/career/employer">Employers</a></li>
					<li><a href="/employment-statistics">Employment Statistics</a></li>
					<li><a href="/career/about-us">About Us</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="/o-i-p">Ohio Innocence Project</a></li>
					<li><a href="/institutes-centers/urban-morgan-institute">Urban Morgan Institute for Human Rights</a></li>
					<li><a href="/institutes-centers/weaver-institute">Weaver Institute of Law and Psychiatry</a></li>
					<li><a href="/institutes-centers/rgsj">Center for Race, Gender, and Social Justice</a></li>
					<li><a href="/institutes-centers/corporate-law-center">Corporate Law Center</a></li>
					<li><a href="/institutes-centers/center-practice">Center for Practice</a></li>
					<li><a href="/institutes-centers/IGPL">Institute for the Global Practice of Law</a></li>
				</ul>
			</section><!--
			--><section>
				<ul>
					<li><a href="/institutes-centers/llm">LLM Program</a></li>
					<li><a href="/institutes-centers/IGPL">Institute for the Global Practice of Law</a></li>
					<li><a href="/graduate-certificate-program">Certificate Programs</a></li>
					<li><a href="/institutes-centers/urban-morgan-institute">Urban Morgan Institute for Human Rights</a></li>
					<li><a href="/international-jd-students">International JD Students</a></li>
					<li><a href="/visiting-scholars">Visiting Scholars</a></li>
					<li><a href="http://ilreports.blogspot.com/" target="_blank">International Law Reporter Blog</a></li>
					
					
				</ul>
			</section>				
		</div>
	</div>
</header>