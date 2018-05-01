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
<html>
	<head>
		<title>UserPage</title>
		<link rel="stylesheet" type="text/css" href="user.css"/>					<!-- Links the css file -->
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">		 For fitting in all devices -->
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	</head>
	<body>
	<!-- 
		<h1 style="text-align:center;color:red;"><em>Welcome To Blood Connect Web App</em></h1>
		<img class="home1" src="homeimg1.jpg" alt="Blood is Life">					--><!--Sample Image Added-->
		<div id="container" style="white-space:nowrap">
      <div>
		    <div class="inline-block">
		        <img class="home1" src="homeimg1.jpg" alt="Blood is Life"/>
		    </div>

		    <div class="inline-block"> 
		        <h1 style="text-align:center;color:red;"><em>Welcome To Blood Connect Web App</em></h1>
		    </div>
      </div>
		</div> 
		<div class="container">
		<div class="page-header">
	  <div class = "section">
	  <div class="btn-group btn-group-lg btn-group-justified">
	    <div class="btn-group">
	      <a href="homepage.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Home</button></a>
	    </div>
	    <div class="btn-group">
	      <a href="about.php" type="button" class="btn btn-primary">About Us</a>
	    </div>
      <div class="btn-group">
        <a href="#" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Hello <?php echo htmlspecialchars($_SESSION['username']); ?></button></a>  <!--For sign Up It will open into a sign up form -->
      </div>
	    <div class="btn-group">
        <a href="donor.php" class="btn btn-primary">Donor</a>    <!--For contacting -->
    </div>
    <div class="btn-group">
        <a href="kreceiver.php" class="btn btn-primary">Recipient</a>    <!--For contacting -->
    </div>
      <div class="btn-group">
	      <a href="logout.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log Out</button></a>	<!--For login It will open into a login link -->
	    </div>    
	  </div>    
	</div>
	</div>
  <h2 align = "center">Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h2>
  <hr>
  <div>
  <img width="300px" height="200px" src="user1.png" alt="Blood Donation Image" align="right">
  <p>Thanks for being a part of Blood Connect. You are serving humankind. A life may depend on a gesture from you, a bottle of Blood.</p>
  </div>
  <div> 
  <h2>Want to Donate Blood</h2>
  <hr>
  <p>You can be donor also. Have to add more content.</p>
  <p>For more information you can go <a href="donor.php" style="color: red;">here.</a></p>
  </div>

  <div> 
  <h2>Are you in need of Blood?</h2>
  <hr>
  <p>You can find the nearest blood availability centers. Have to add more content.</p>
  <p>For more information you can go <a href="receiver.php" style="color: red;">here.</a></p>
  </div>
  </div>
	<!-- Adding footer Have to modify-->
	<div id="footer">
      <div id="footer_content">
        <div class="footer_item">
          <p class="footer_heading">
            Donate Blood        <!-- Footer Item We can add any link here-->
          </p>
          <ul class="footer_list">
            <li>
              <a href="">Blood Donation</a>   <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">Blood Donation FAQs</a>  <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">Types of Blood Donations</a>   <!-- Have to add any link here-->
            </li>
          </ul>
          <p class="footer_heading">
            About Blood
          </p>
          <ul class="footer_list">
            <li>
              <a href="">What is Blood?</a>     <!--Have to add the wipedia link -->
            </li>
            <li>
              <a href="">Blood is Always Needed</a> <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">How Blood Saves Life</a>   <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">Facts & Figures</a>      <!-- Have to add any link here-->
            </li>
          </ul>
        </div>
        <div class="footer_item">
          <p class="footer_heading">
          Get Involved
          </p>
          <ul class="footer_list">
            <li>
              <a href="">Plan a Blood Drive</a>   <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">Blood Donation Programs</a>  <!-- Have to add any link here-->
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
              <a href="">What We Do</a>       <!-- Have to add any link here-->
            </li>
            <li>
              <a href="">Our Programmes</a>     <!-- Have to add any link here-->
            </li>
          </ul>
        </div>
        <div class="footer_item">
        <p class="footer_heading">
          Tools & Resources
        </p>
        <ul class="footer_list">
          <li>
            <a href="">Publications</a>         <!-- Have to add any link here-->
          </li>
          <li>
            <a href="">Blog</a>             <!-- Have to add any link here-->
          </li>
          <li>
            <a href="">Contact Us</a>         <!-- Have to add any link here-->
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
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
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
    <script type="text/javascript" src="js/main.js"></script>					<!--End of footer -->
	</body>
</html>
