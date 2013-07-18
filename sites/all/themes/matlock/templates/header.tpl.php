<header>
	<!-- Banner -->
	<div class="row top-bar">
		<div class="container">
			<div class="row">
				<div class="span6">
					<?php if (theme_get_setting('logo')): ?>
				        <a class="brandmark" href="/" title="<?php print t('Home'); ?>">
				          <img src="<?php print theme_get_setting('logo'); ?>" alt="<?php print t('Home'); ?>" />
				        </a>
				      <?php endif; ?>
				</div>
				<div class="span6">
				
					<div class="row">
						<div class="span6">
							<ul class="inline quicklinks">
								<li><a href="http://www.law.uc.edu/prospective-students/admissions/application-materials-fall"><i class="icon-file"></i> Apply Now</a></li>
								<li><a href="http://www.law.uc.edu/prospective-students/admissions/visit-college-law "><i class="icon-calendar"></i> Schedule A Visit</a></li>
								<li><a href="http://www.cincinnatiusa.com/about"><i class="icon-map-marker"></i> Explore Cincinnati</a></li>
							</ul>	
						</div>
					</div>
					
					<div class="row">
						<div class="span6">
							<nav id="secondary-nav">
								<ul class="clearfix">
								
									<li><a href="http://www.law.uc.edu/faculty-staff">Faculty</a></li>
									
									<li><a href="http://www.law.uc.edu/directory/staff">Staff</a></li>
									
									
									<li><a href="http://www.law.uc.edu/alumni">Alumni</a></li>
									
									
									<li><a href="#">Library</a></li>
									
									<li><a href="#">Current Students</a></li>
									
									<li><a href="#"><i class="icon-search"></i></a>
										<ul class="sub search">
											<li>
												<form name="search" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
													<div class="input-append">
														<input type="text" name="search_terms" placeholder="Search..." class="input-medium">
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
	
	<!-- Main Navigation -->
	<div class="main-nav new">
		<div class="container">
			<nav id="newnav" class="row top-level">
				<a href="landing">About Us</a><!--
				--><a href="#">Admissions</a><!--
				--><a href="#">Academics</a><!--
				--><a href="#">Experiences</a><!--
				--><a href="http://law.uc.edu/career">Careers</a><!--
				--><a href="http://www.law.uc.edu/institutes">Centers</a><!--
				--><a href="#">International</a>
			</nav>										
		</div>
		
		<div class="row" id="main-dropdown">
			<section>
				<ul>
					<li><a href="http://www.law.uc.edu/about-us/fast-facts">Fast Facts</a></li>
					<li><a href="http://www.law.uc.edu/prospective-students/admissions/consumer-information">ABA Information</a></li>
					<li><a href="http://www.law.uc.edu/about-us/strategic-plan">Mission</a></li>
					<li><a href="http://www.law.uc.edu/about-us/history">History</a></li>
					<li><a href="http://www.uc.edu/about.html">Our University</a></li>
					<li><a href="http://law.uc.edu/advantage">Cincinnati and Region</a></li>
					<li><a href="http://www.law.uc.edu/about-us/board-of-visitors">Board of Visitors</a></li>
					<li><a href="http://www.law.uc.edu/alumni/new-building">New College of Law Building</a></li>
					<li><a href="http://law.uc.edu/prospective-students/admissions/visit-college-law">Visit Us</a></li>
					<li><a href="http://law.uc.edu/about-us/contact-us">Contact Us</a></li>
				</ul>
			</section><!--
			
			--><section>
				<ul>
					<li><a href="http://law.uc.edu/prospective-students/admissions">JD Admissions</a></li>
					<li><a href="http://law.uc.edu/institutes-centers/llm#">LLM Admissions</a></li>
					<li><a href="#">Certificate Admissions</a></li>
					<li><a href="http://law.uc.edu/prospective-students/admissions/transfer-and-visiting-students">Transfer/Visiting Students</a></li>
					<li><a href="http://www.law.uc.edu/flex-time-program">Flexible Time Program</a></li>
					<li><a href="http://law.uc.edu/prospective-students/admitted-students">Admitted Students</a></li>
					<li><a href="#">Guest Students</a></li>
					<li><a href="http://law.uc.edu/value">Financial Aid</a></li>
					<li><a href="http://law.uc.edu/prospective-students/admissions/visit-college-law">Visit Us</a></li>
					<li><a href="http://law.uc.edu/about-us/contact-us">Contact Us</a></li>
				</ul>
			</section><!--
			
			
			--><section>
				<ul>
					<li><a href="http://law.uc.edu/jd-program">JD Program</a></li>
					<li><a href="http://law.uc.edu/prospective-students/academic-programs/areas-study">Professional Pathways</a></li>
					<li><a href="#">Experiencess</a></li>
					 <li><a href="http://law.uc.edu/faculty-staff">Faculty</a></li>
					 <li><a href="#">Academic Calendar</a></li>
					 <li><a href="http://law.uc.edu/current-students/academic-success-program">Academic Success Program</a></li>
					 <li><a href="http://www.law.uc.edu/prospective-students/academic-programs/individualized-joint-degree-program">Joint Degree Programs</a></li>
					 <li><a href="#">Study Abroad Program</a></li>
					 <li><a href="#">Certificate Programs</a></li>
					 <li><a href="#">Lectures and Visitors</a></li>
					 <li><a href="http://law.uc.edu/about-us/contact-us">Contact Us</a></li>
				</ul>
			</section><!--
			
			
			--><section>
				<ul>
					<li><a href="#">Clinics</a></li>
					<li><a href="#">Externships</a></li>
					<li><a href="#">Journals</a></li>
					<li><a href="http://law.uc.edu/current-students/student-orgs/moot-court-program#">Moot Court</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/center-practice/trial-practice#">Trial Practice</a></li>
					<li><a href="http://www.law.uc.edu/current-students/practical-experiences/alternative-dispute-resolution">Alternate Dispute Resolution</a></li>
					<li><a href="#">Fellowships</a></li>
					<li><a href="http://www.law.uc.edu/current-students/practical-experiences/american-inn-court">American Inn of Court</a></li>
					<li><a href="#">Writing Competitions</a></li>
					<li><a href="http://www.law.uc.edu/current-students/student-organizations">Student Organizations</a></li>
					<li><a href="http://www.law.uc.edu/current-students/practical-experiences/volunteer-opportunities">Pro Bono/Volunteer</a></li>
				</ul>
			</section><!--
			
			--><section>
				<ul>
					<li><a href="http://law.uc.edu/career/student">Students</a></li>
					<li><a href="http://www.law.uc.edu/career/alumni">Alumni</a></li>
					<li><a href="http://www.law.uc.edu/career/employer">Employers</a></li>
					<li><a href="http://www.law.uc.edu/employment-statistics">Employment Statistics</a></li>
					<li><a href="http://www.law.uc.edu/career/reciprocity">Reciprocity</a></li>
					<li><a href="https://law-uc-csm.symplicity.com/">Symplicity</a></li>
					<li><a href="http://law.uc.edu/career/about-us">About Us</a></li>
				</ul>
			</section><!--
			
			--><section>
				<ul>
					<li><a href="http://www.law.uc.edu/institutes-centers/corporate-law-center">Corporate Law Center</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/center-practice">Center for Practice</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/center-practice">Ohio Innocence Project</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/rgsj">Center for Race, Gender, and Social Justice</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/urban-morgan-institute">Urban Morgan Institute for Human Rights</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/weaver-institute">Weaver Institute of Law and Psychiatry</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/IGPL">Institute for the Global Practice of Law</a></li>
				</ul>
			</section><!--
			
			--><section>
				<ul>
					<li><a href="http://www.law.uc.edu/institutes-centers/llm">LLM Program</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/IGPL">Institute for the Global Practice of Law</a></li>
					<li><a href="http://www.law.uc.edu/institutes-centers/urban-morgan-institute">Urban Morgan Institute for Human Rights</a></li>
					<li><a href="#">Study Abroad Program</a></li>
					<li><a href="#">Certificate in U.S. Legal Studies</a></li>
					<li><a href="#">Visiting Scholars</a></li>
				</ul>
			</section>					
		</div>
	</div>
</header>