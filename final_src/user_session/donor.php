<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
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

		<title>Donor Page</title>

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
					        <li><a href="">Hi <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
						<li><a href="user.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="before_eligibility.php">Fix an appointment</a></li>
						<li><a href="kuser_fixed_appointments.php">Fixed appointments</a></li>
						<li><a href="logout.php">Log Out</a></li>
						
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img2/aim.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
					        <ul>
						<h1 class="white-text">Be a Blood Donor</h1>
						</ul>
					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- blog post -->
						<div class="blog-post">
							<p>Blood donation is one of the most significant contribution that a person can make towards the society. It is not harmful for an adult person to donate blood. The body of the donor can regenerate the blood within few days. It poses no threat to the metabolism of the body.</p>
							<p>An ailing body needs blood for various reasons. He may be attacked with anemia, undergone an operation or may meet with an accident. But such a patient may die for want of blood as it is not always available. Even a pregnant mother may need blood in case of emergency situation.

</p>
							<p>The patient needs blood or his or her group of blood whenever necessary. It is another important thing. Blood has four groups namely, A. B, AB and O. The required group must be the same while transplanting otherwise the transplantation will go in vain and even the patient may die. The man with the O-group blood is called the universal donor as the people having others can accept it. On the contrary, the man with AB group of blood is called the universal receiver as he can accept all groups of blood.</p>
							<blockquote>
							  <p>The finest gesture one can make is to save life by donating Blood.</p>
							</blockquote>
							<p>Nowadays a public awareness is noticed to donate blood. Many clubs, colleges, societies, offices, etc. organize blood donation camps on different occasions. It is a healthy gesture. We must keep this aptitude up at any cost. Our blood banks are running short of required blood. By organizing such blood donation camps we may help them to enrich their capacity.</p>
							<p>However, it is very important that while taking blood from a certain person the concerned authority must make sure the the blood is not infected.</p>
							<p>Blood donation is our human duty. Our body does not get affected if we donate blood. The body can repair the loss within a few days. So we must come forward to donate blood as it can make sure the return of a dying man again into the light of life.</p>
						</div>
							<!-- Feedback form -->
							<!--<div class="blog-reply-form">
								<h3>Tell your experience to others</h3>
								<form action="/action_page.php">			
									<label for="feedback">Share Your Feedback</label>
									<textarea class="input" name="message" placeholder="Write Something"></textarea>
									<button class="main-button icon-button">Submit</button>
								</form>
							</div>-->
						</div>
					</div>
		</div>
		</div>
		<!-- /Blog -->

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
