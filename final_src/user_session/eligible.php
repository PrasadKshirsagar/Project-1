<?php

    include_once  "dbh.inc.php";
    session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}

    if (isset($_POST['submit'])) 
{

   	    $blood = $_POST['blood'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $gender = $_POST['gender'];
        $hl = $_POST['hl'];
        $ts = $_POST['ts'];
        $dbp = $_POST['dbp'];
        $sbp = $_POST['sbp'];
        $td = $_POST['td'];

        $age = (float)$age;
        $weight = (float)$weight;
        $hl = (float)$hl;
        $dbp = (float)$dbp;
        $sbp = (float)$sbp;
        $ts = (float)$ts;

        
	$username_hos = $_SESSION['username'];
	$password_hos = $_SESSION['password'];
	
	$query2 = "SELECT user_id FROM user WHERE username = '$username_hos'";  
        $r2 = $conn->query($query2); 
     //  echo 'outside3';
      // $rr = $r2["user_id"];
       //echo $r2;
       
       
 if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        $num = $row["user_id"];
      //  echo " ".$row["user_id"];
        
     }
    
 }
 $x = 0;

 if($age<18 || $age>60)
 {
  $x = 1;
 }
 if($weight<50)
 {
  $x = 1;
 }
  if($td =="YES")
 {
  $x = 1;
 }
 if($hl < 13)
 {
  $x = 1;
 }
 if($ts < 3)
 {
  $x = 1;
 }

if($dbp < 50 || $dbp > 100)
 {
  $x = 1;
 }
 if($sbp < 100 || $sbp > 180)
 {
  $x = 1;
 }


 if($x == 0)
 {
 
 $query5 = "SELECT user_id FROM user_info WHERE user_id = '$num'";  
        $r5 = $conn->query($query5); 
if ($r5->num_rows > 0) {

  $query3 = "UPDATE user_info SET user_blood_group = '$blood', age= '$age', weight= '$weight',blood_pressure_systolic = '$sbp',  blood_pressure_diastolic = '$dbp', haemoglobin ='$hl' WHERE user_id = '$num'";
     $r3 = $conn->query($query3);  
     
}
else 
{
 $query3 = "INSERT INTO user_info(user_blood_group,age,weight,blood_pressure_systolic,blood_pressure_diastolic,haemoglobin,user_id) VALUES ('$blood', '$age','$weight', '$sbp', '$dbp', '$hl', '$num')";
      $r3 = $conn->query($query3);  
     
      
     	 if ($r3 == 1) 
   	 {
   	             
       		
    
   	 } 
   	 else
   	 {
   	     	echo "second query failed";
   	 }
  }   
  }
  header('location: kuser_appointment.php?res='.$x);
           
 //}
 /*
 else{

   echo "Sorry, you are not eligible. <br>";

 }*/
    
}

?>

<!DOCTYPE html>
<html>
  <style>
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.donorinfo {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
  </style>
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
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/img11.jpg)"></div>
      <!-- /Backgound Image -->

      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
                  <ul>
            <h1 class="white-text">Am I Eligible ?</h1>
            <h3 class="white-text">Be a Blood Donor</h3>
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
  <!--<div class="Details">Check Eligibility</div>-->
  <h2>Check Eligibility</h2>
  <hr style="margin:0 0 5px 0;display: block;">
  <div class="donorinfo">
  <form action="" method="POST">
     <label for="blood">Blood Group</label>
    <select id="blood" name="blood">
    
      <option value="A+">(A+) A Positive</option>
      <option value="A-">(A-) A Negative</option>
      <option value="B+">(B+) B Positive</option>
      <option value="B-">(B-) B Negative</option>
      <option value="O+">(O+) O Positive</option>
      <option value="O-">(O-) O Negative</option>
      <option value="AB+">(AB+) AB Positive</option>
      <option value="AB-">(AB-) AB Negative</option>
    </select>
   
    <label for="age">Age</label>
    <input type="number" id="age" name="age" placeholder="Your age in years.." required>
    <label for="weight">Weight</label>
    <input type="number" id="weight" name="weight" placeholder="Your weight in KG.." required>
    
     <label for="gender">Gender</label>
    <select id="gender" name="gender" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    
    <label for="hl">Hemoglobin Level</label>
    <input type="text" id="hl" name="hl" placeholder="Your Hemoglobin level in percentage (eg. 12)" required>
    <label for="ts">Time span after the last blood donation</label>
    <input type="text" id="ts" name="ts" placeholder="Time span in months (eg. 6)" required>
    <label for="dbp"> Diastolic BP</label>
    <input type="text" id="dbp" name="dbp" placeholder="Your Diastolic BP in mm Hg (eg. 80)" required>
    <label for="sbp"> Systolic BP</label>
    <input type="text" id="sbp" name="sbp" placeholder="Your Systolic BP in mm Hg (eg. 120)" required>
    
     <label for="td">Any transmittable disease</label>
    <select id="td" name="td" required>
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    </select>
    <br><br>
    <input type="submit" value="Check Eligibility" name = "submit">
  </form>
          </div>
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
				<!--End of footer -->
	</body>
</html>
