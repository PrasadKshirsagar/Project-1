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
<html>
	 <head>
	 <link rel ="shortcut icon" href ="logo1.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Appointment Page</title>

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
                  <li><a href="#">Hi <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="homepage.php">Home</a></li>
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
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img2/test.jpg)"></div>
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
    <div id="blog" class="section">

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">

          <!-- main blog -->
          <div id="main" class="col-md-9">

            <!-- blog post -->
            <div class="blog-post">
  
<?php

    include_once  "dbh.inc.php";
    session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}

     
        $blood = $_POST['blood'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $gender = $_POST['gender'];
        $hl = $_POST['hl'];
        $ts = $_POST['ts'];
        $dbp = $_POST['dbp'];
        $sbp = $_POST['sbp'];
        $td = $_POST['td'];
        
  $username_hos = $_SESSION['username'];
  $password_hos = $_SESSION['password'];
  $num = 0;
  
  $query2 = "SELECT user_id FROM user WHERE username = '$username_hos'";  
  $r2 = $conn->query($query2); 
    
       
 if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        $num = $row["user_id"];
      //  echo " ".$row["user_id"];
        
     }
    
 }

 $per=0;
 $query4 = "SELECT user_blood_group,age,height,weight,blood_pressure_systolic,blood_pressure_diastolic,haemoglobin FROM user_info WHERE user_id = '$num'";  
 $r4 = $conn->query($query4); 
 if ($r4->num_rows > 0) {
   
    // output data of each row
    while($row = $r4->fetch_assoc()) {
        $bg = $row["user_blood_group"];
        $age = $row["age"];
        $height = $row["height"];
        $weight = $row["weight"];
        $blood_pressure_systolic = $row["blood_pressure_systolic"];
        $blood_pressure_diastolic = $row["blood_pressure_diastolic"];
        $haemoglobin = $row["haemoglobin"];
        echo "<b>Your Previous record is as follows :<br><br></b>";
        echo "1. Blood Group : ". $bg."<br>";
        echo "2. Age : ". $age."<br>";
       // echo "Height :". $height;
        echo "3. Weight : ". $weight."<br>";
        echo "4. Systolic Blood Pressure : ". $blood_pressure_systolic."<br>";
        echo "5. Diastolic Blood Pressure  : ". $blood_pressure_diastolic."<br>";
        echo "6. Haemoglobin Level  : ". $haemoglobin."<br>";
        echo '<br> <a href="eligible.php">Click here </a>to update record <br>';
        echo'<h4> OR </h4>';
        
        echo ' <a href="kuser_appointment.php?res='.$per.'">Click here </a>to fix an appointment. <br>';

      //  echo " ".$row["user_id"];
        
     }
    
 }
 else{
  echo "No Previous Record Found .<br>";
  echo '<a href="eligible.php">Click here </a>to check eligibility <br>';
  echo'<h4> OR </h4>';
        
        echo ' <a href="kuser_appointment.php?res='.$per.'">Click here </a>to fix an appointment. <br>';

 }
 
 

?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Adding footer Have to modify-->
	
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
