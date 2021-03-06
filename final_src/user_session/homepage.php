<?php

    include_once  "dbh.inc.php";
    session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<link rel ="shortcut icon" href ="logo1.png"/>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Online Blood Bank</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
					<div>
				        <div class="inline-block">
				            <a class="logo" href="homepage.html">
							<img src="./img/homeimg1.jpg" alt="Blood is life">
						</a>
				        </div>
				        <!--<div class="inline-block"> 
				            <h1 style="text-align:center;color:red;"><em>Blood Connect Web App</em></h1>
				        </div>-->
				      </div>
						
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="user.php"></span>Hello <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
						<li><a href="user.php">Profile </a></li>
						<li><a href="about.php">About Us</a></li>
						
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

		<!-- Home -->
		<div id="home" class="hero-area">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/img11.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 text-center">
							<h1 class="white-text" >WELCOME TO</h1>
							<h1 class="white-text" >BLOOD CONNECT WEB APP</h1>
							<!--<a class="main-button icon-button" href="#">Donate Blood</a>-->
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Home -->

		<!-- About -->
		<div id="about" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<div class="section-header">
							<h2>Welcome to Blood Connect</h2>
							<p class="lead">A nonprofit project made under CSP203 course.</p>
						</div>

						<!-- feature -->
						<div class="feature">
							<i class="feature-icon fa fa-medkit"></i>
							<div class="feature-content">
								<h4>Donate Blood</h4>
								<p>The majority of the population is eligible to donate blood, less than four percent donates annually.</p>
							</div>
						</div>
						<!-- /feature -->

						<!-- feature -->
						<div class="feature">
							<i class="feature-icon fa fa-user-md"></i>
							<div class="feature-content">
								<h4>Organize Blood Drive</h4>
								<p>Host blood drive in your locality regularly.</p>
							</div>
						</div>
						<!-- /feature -->

						<!-- feature -->
						<div class="feature">
							<i class="feature-icon fa fa-users"></i>
							<div class="feature-content">
								<h4>Help Community</h4>
								<p>Spread the message of blood donation in the community. Help million of patients in need of blood.</p>
							</div>
						</div>
						<!-- /feature -->

					</div>

					<div class="col-md-6">
						<div class="about-img">
							<img src="./img/benifits.jpg" alt="">
						</div>
					</div>

				</div>
				<!-- row -->

			</div>
			<!-- container -->
		</div>
		<!-- /About -->

		<!-- Courses -->
		<div id="courses" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="section-header text-center">
						<h2>Some Moments</h2>
            <p class="lead">Blood donation in society is increasing. Youths are participating in it. This is a good sign for society.</p>
          </div>
        </div>
        <!-- /row -->

        <!-- courses -->
        <div id="courses-wrapper">
          <!-- row -->
          <div class="row">

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="course">
                <a href="#" class="course-img">
                  <img src="./img2/blood1.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Students at IIT Ropar</a>
                <div class="course-details">
                  <span class="course-category">Promoting Blood Donation.</span>
                </div>
              </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="course">
                <a href="#" class="course-img">
                  <img src="./img2/blood2.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Blood Camp at IIT Ropar</a>
                <div class="course-details">
                  <span class="course-category">Promoting Blood Donation.</span>
                </div>
              </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="course">
                <a href="#" class="course-img">
                  <img src="./img2/blood3.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Give Blood Give Life.</a>
                <div class="course-details">
                  <span class="course-category">Awareness</span>
                </div>
              </div>
            </div>
            <!-- /single course -->


            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="course">
                <a href="#" class="course-img">
                  <img src="./img2/blood4.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Students promoting blood donation.</a>
                <div class="course-details">
                  <span class="course-category">Blood Donation Camp.</span>
                </div>
              </div>
            </div>
            <!-- /single course -->

          </div>
          <!-- /row -->

        </div>
        <!-- /courses -->

       <!-- <div class="row">
          <div class="center-btn">
            <a class="main-button icon-button" href="contact.php">Join Us</a>
          </div>
        </div>-->

      </div>
      <!-- container -->

    </div>
		<!-- /Courses -->

		<!-- Call To Action -->
		<div id="cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/bg1.jpg)"></div>
			<!-- /Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<!--<h2 class="white-text">O-Negative Blood Donors Needed</h2>-->
						<p class="lead white-text">Even though you must have seen a lot of your friends donating blood, there is still an acute shortage of blood in blood banks and hospitals.<br><br>A major reason for this is still that people have a lot of misunderstanding associated with blood donation. Black market transactions and poor storage facilities add up for the rest.</p>
						<!--<a class="main-button icon-button" href="#">Donate Now</a>-->
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Call To Action -->

		<!-- Why us -->
		<div id="why-us" class="section">

			<div class="container">

				
				<div class="row">
					<div class="section-header text-center">
						<h2>Get Involved</h2>
						<p class="lead">Accidents and medical emergencies don’t take holidays. We need blood every minute, every day Of the year.</p>
					</div>

					 
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-calendar"></i>
							<div class="feature-content">
								<h4>Schedule</h4>
								<p>Donate blood and save lives.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-users"></i>
							<div class="feature-content">
								<h4>Volunteer</h4>
								<p>Spread the message of blood donation.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-plus-square"></i>
							<div class="feature-content">
								<h4>Organize</h4>
								<p>Host a blood drive.</p>
							</div>
						</div>
					</div>
					

				</div>
				<!-- /row -->
				<hr class="section-hr">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<h3> Find the hero in you. Donate today.</h3>
						<p class="lead">See what it means to be a hero.</p>
						<p>The Blood You Donate Gives Someone Another Chance At Life. One Day That Someone May Be A Close Relative, A Friend, A Loved One—Or Even You.</p>
					</div>

					<div class="col-md-5 col-md-offset-1">
						<iframe width="450" height="300" src="https://www.youtube.com/embed/rolXvtMg7CI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Why us -->

		<!-- Contact CTA -->
		<div id="contact-cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/img6.jpg)"></div>
			<!-- Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-8 col-md-offset-2 text-center">
						<h2 class="white-text">Connect With Us</h2>
						<p class="lead white-text">Millions of the people have joined us to make the world free from blood scarcity. Join us.</p>
						<a class="main-button icon-button" href="contact.php">Connect With Us Now</a>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact CTA -->

		<!-- Footer -->

		<div id="footer">
  		<div id="footer_content">
  			<div class="footer_item">
  				<p class="footer_heading">
  					Donate Blood				<!-- Footer Item We can add any link here-->
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="https://en.wikipedia.org/wiki/Blood_donation" target = "_blank">Blood Donation</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.mayoclinic.org/patient-visitor-guide/minnesota/blood-donor-program/faq" target = "_blank">Blood Donation FAQs</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://www.cbcc.us/donate-blood/types-of-blood-donation" target = "_blank">Types of Blood Donations</a>		<!-- Have to add any link here-->
  					</li>
  				</ul>
  				<p class="footer_heading">
  					About Blood
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="https://www.oneblood.org/about-donating/blood-donor-basics/what-is-blood/" target = "_blank">What is Blood?</a>			<!--Have to add the wipedia link -->
  					</li>
  					<li>
  						<a href="https://www.sandiegobloodbank.org/why-blood-donors-are-always-needed" target = "_blank">Blood is Always Needed</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://blog.stridehealth.com/post/save-3-lives-with-1-blood-donation" target = "_blank">How Blood Saves Life</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.oneindia.com/india/world-blood-donor-day-2017-every-year-india-requires-5-crore-units-of-blood-2464097.html" target = "_blank">Facts & Figures</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  				<p class="footer_heading">
  				Get Involved
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="http://www.americasblood.org/get-involved/plan-a-blood-drive.aspx" target = "_blank">Plan a Blood Drive</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.facebook.com/events/499975100119550" target = "_blank">Blood Donation Programs</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  					<br/>
  					</li>
  				</ul>
  				<p class="footer_heading">
  					About Us
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="http://www.iitrpr.ac.in/blood-donation-camp" target = "_blank">What We Do</a>				<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://www.iitrpr.ac.in/blood-donation-camp" target = "_blank">Our Programmes</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  			<p class="footer_heading">
  				Tools & Resources
  			</p>
  			<ul class="footer_list">
  				<li>
  					<a href="https://bloodconnect.wordpress.com/" target = "_blank">Publications</a>					<!-- Have to add any link here-->
  				</li>
  				<li>
  					<a href="https://bloodconnect.wordpress.com/" target = "_blank">Blog</a>							<!-- Have to add any link here-->
  				</li>
  				<li>
  					<a href="contact.php">Contact Us</a>					<!-- Have to add any link here-->
  				</li>
  			</ul>
  			</div>
  			<div class="footer_item">
  				<p class="footer_heading1">   </p>
  			</div>
  			<div class="footer_item_info">
  				<h3>Online blood bank</h3>
  				<ul class="footer_list">
  					<li>Developed and maintained by:</li>
  					<li>Vivek Verma</li>
  					<li>Komal Chugh</li>
  					<li>Ram Krishna</li>
            <li>Prasad Kshirsagar</li>
  				</ul>
  			</div>
  		</div>
  		<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<ul class="footer-social">
							<li><a href="https://www.facebook.com/prasad.kshirsagar.33449" class="facebook"target = "_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/Apple/status/989802699465089024" class="twitter"target = "_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://plus.google.com/u/1/115258054141875614692" class="google-plus"target = "_blank"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://www.instagram.com/kshirsagar_prasad/" class="instagram"target = "_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/user/narendramodi" class="youtube" target = "_blank"><i class="fa fa-youtube"></i></a></li>
							<li><a href="https://www.linkedin.com/feed/?trk=" class="linkedin" target = "_blank"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
		<div class="clear"></div>
			<div id="footer_bottom">
				<div class="wrapper">
					<p>This site has been made under CSP203 Project</p>
				</div>
			</div>
		</div>
	</div>			
		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script type="text/javascript" src="js/google-map.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>

