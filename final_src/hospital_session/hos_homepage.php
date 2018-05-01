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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Hospital Page</title>

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
                    <a class="logo" href="homepage.php">
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
            <li><a href="">Hi <?php echo htmlspecialchars($_SESSION['username']); ?> </a></li>
            <li><a href="">HOME</a></li>
            <li><a href="vhospital_form.php">Update Data</a></li>
            <li><a href="vhospitalFixed.php">Show Fixed Appointments</a></li>
            <li><a href="vhospital_appointment.php">Check Appointments</a></li>
            <li><a href="hcontact.php">Contact Us</a></li>
            <li><a href="logout.php">SignOut</a></li>
          </ul>
        </nav>
        <!-- /Navigation -->

      </div>
    </header>
    <!-- /Header -->

    <!-- Home -->
    <div id="home" class="hero-area">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/b1.jpg)"></div>
      <!-- /Backgound Image -->

      <div class="home-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h1 class="white-text">Welcome To Blood Connect Web App</h1>
              <a class="main-button icon-button" href="vhospital_form.php">Update Your Data</a>
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
                <h4>Update Your Blood Information</h4>
                <p>Update the blood groups information and help the patients in need of blood to find you.</p>
              </div>
            </div>
            <!-- /feature -->

            <!-- feature -->
            <div class="feature">
              <i class="feature-icon fa fa-user-md"></i>
              <div class="feature-content">
                <h4>Confirm The Appointments</h4>
                <p>Confirm the appointments of the donor. Also provide them suitable time.</p>
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
              <img src="./img/img1.jpg" alt="">
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
                  <img src="./img/img8.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">People spreading awareness.</a>
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
                  <img src="./img/img2.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Doctors consulting the patient.</a>
                <div class="course-details">
                  <span class="course-category">Patient in need of blood.</span>
                </div>
              </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="course">
                <a href="#" class="course-img">
                  <img src="./img/img5.jpg" alt="">
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
                  <img src="./img/img9.jpg" alt="">
                  <i class="course-link-icon fa fa-link"></i>
                </a>
                <a class="course-title" href="#">Children promoting blood donation.</a>
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

        <div class="row">
          <div class="center-btn">
            <a class="main-button icon-button" href="#">Join Us</a>
          </div>
        </div>

      </div>
      <!-- container -->

    </div>
    <!-- /Courses -->

    <!-- Call To Action -->
    <div id="cta" class="section">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/img3.jpg)"></div>
      <!-- /Backgound Image -->

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">

          <div class="col-md-6">
            <h2 class="white-text">Rural Hospitals</h2>
            <p class="lead white-text">Rural hospitals condition are  critical in India. We recommend rural hospitals to connect with us as much as possible. It will help and promote the blood donation in rural parts.</p>
          </div>

        </div>
        <!-- /row -->

      </div>
      <!-- /container -->

    </div>
    <!-- /Call To Action -->

    <!-- Why us -->
    <div id="why-us" class="section">

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">
          <div class="section-header text-center">
            <h2>Get Involved</h2>
            <p class="lead">Accidents and medical emergencies don’t take holidays. We need blood every minute, every day Of the year.</p>
          </div>

          <!-- feature -->
          <div class="col-md-4">
            <div class="feature">
              <i class="feature-icon fa fa-calendar"></i>
              <div class="feature-content">
                <h4>Schedule</h4>
                <p>Schedule a blood donation camp regularly.</p>
              </div>
            </div>
          </div>
          <!-- /feature -->

          <!-- feature -->
          <div class="col-md-4">
            <div class="feature">
              <i class="feature-icon fa fa-users"></i>
              <div class="feature-content">
                <h4>Update Blood Data</h4>
                <p>Update the blood data regularly and help the patients and recipient.</p>
              </div>
            </div>
          </div>
          <!-- /feature -->

          <!-- feature -->
          <div class="col-md-4">
            <div class="feature">
              <i class="feature-icon fa fa-plus-square"></i>
              <div class="feature-content">
                <h4>Organize</h4>
                <p>Host a blood drive.</p>
              </div>
            </div>
          </div>
          <!-- /feature -->

        </div>
        <!-- /row -->

        <hr class="section-hr">

        <!-- row -->
        <div class="row">

          <div class="col-md-6">
            <h3> Useful Information About Blood Donation.</h3>
            <p class="lead"></p>
            <p>See which blood groups can be used for blood donation.</p>
          </div>

          <div class="col-md-5 col-md-offset-1">
            <img  src = "./img/info.gif"/>
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
            <a class="main-button icon-button" href="hcontact.php">Connect With Us Now</a>
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

