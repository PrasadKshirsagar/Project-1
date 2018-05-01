<?php 
         
        include_once  "dbh.inc.php";
	session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}

$res = $_GET['res'];
if($res == 1)
{

//echo 'Sorry, you are not eligible.';

}

else{
//echo $res;

if (isset($_POST['submit'])) 
{
       //echo "hi2222222222222222";
	$username = $_SESSION['username'];
	$hospital_id = $_POST['hospital'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	$query1 = "SELECT user_id FROM user WHERE username = '$username'";  
       $r1 = $conn->query($query1); 
       if ($r1->num_rows > 0) {
   
    // output data of each row
    while($row = $r1->fetch_assoc()) {
        
        $user_id = $row["user_id"];
        
      //  echo " ".$row["user_id"];
        
    }
    }else {
		echo "Wrong happen";}

	
        //echo "hi";  
	$query2 = "INSERT into appointment(user_id,hospital_id,starting_time,ending_time,starting_date,ending_date) values('$user_id' , '$hospital_id','$start_time','$end_time','$start_date','$end_date')";
        //echo $query2;
	$conn->query($query2);
	
        header("location: donor.php");

}
}

?>
 
<!DOCTYPE html>
<html lang="en">
    <style>
	body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box}
	/* Full-width input fields */

	input[type=text], select {
	    width: 50%;
	    padding: 12px 20px;
	    margin:  8px 0;
	    display: block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	    align: center;

	}

	input[type=text], input[type=TIME],input[type=DATE] {
	    width: 100%;
	    padding: 15px;
	    margin: 5px 0 22px 0;
	    display: inline-block;
	    border: none;
	    background: #f1f1f1;
	}
	input[type=text]:focus, input[type=TIME]:focus,input[type=DATE]:focus {
	    background-color: #ddd;
	    outline: none;
	}
	
	hr {
	    border: 1px solid #f1f1f1;
	    margin-bottom: 25px;
	}
	/* Set a style for all buttons */
	button {
	    background-color: #4CAF50;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    cursor: pointer;
	    width: 100%;
	    opacity: 0.9;
	}
	button:hover {
	    opacity:1;
	}
	/* Extra styles for the cancel button */
	.cancelbtn {
	    padding: 14px 20px;
	    background-color: #f44336;
	}
	
	/* Float cancel and signup buttons and add an equal width */
	.cancelbtn, .signupbtn {
	  float: left;
	  width: 50%;
	}
	/* Add padding to container elements */
	.container {
	    padding: 16px;
	}
	/* Clear floats */
	.clearfix::after {
	    content: "";
	    clear: both;
	    display: table;
	}
	/* Change styles for cancel button and signup button on extra small screens */
	@media screen and (max-width: 300px) {
	    .cancelbtn, .signupbtn {
	       width: 100%;
	    }
	}
	</style>
<head>
<link rel ="shortcut icon" href ="logo1.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Fix an appointment</title>

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
                    <a class="logo" href="fhomepage.php">
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

    <!-- Home -->
    <div class="hero-area section">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/img11.jpg)"></div>
      <!-- /Backgound Image -->
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h1 class="white-text">Fix An Appointment</h1>
            </div>
          </div>
        </div>
      </div>

    </div>
<!--</head>
<body>-->

<?php

if($res == 1)
{
  echo'<br><br><br><br><br>';
  echo'<div style="border:2px solid red;padding:10px; margin: 30px 5px 30px 350px; width: 40%">';
  echo'<h4 style="text-align:center">Sorry, you are not eligible to donate blood ...</h4>';
  echo'</div>';
  echo'<br><br><br><br><br>';
    
}
else{


?>

<!-- Contact -->
    <div id="contact" class="section">

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">

          <!-- contact form -->
          <div >
            <div class="contact-form">
            <h1>Fix An Appointment</h1>
    <p>Please fill in this form to fix an appointment.</p>

    
    	<form action="" method="POST" style="border:1px solid #ccc">
		  <div class="container">
		    <label for="hospital"><b>Name Of Hospital</b></label><br>
		    <select id="hospital" name="hospital">
		    	<?php
		    	    $sql="select hospital_id,hospital_name from hospital";
		    	    $result = mysqli_query($conn,$sql);

						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						    echo "<html><option value=\"".$row["hospital_id"]."\">".$row["hospital_name"]."</option></html>";
						}
						} else {
						echo "0 results";
						}

		    	?>
		    	
		    </select><br>
		   <b> <p> Please, Enter your preferred date range :</p> </b>
		    <label for="start_date"><b>Start date</b></label> <br>
		    <input type="DATE" placeholder="start_date" name="start_date" required><br>

		    <label for="end_date"><b>End date</b></label> <br>
		    <input type="DATE" placeholder="end_date" name="end_date" required><br>

             <b> <p> Please, Enter your preferred time range :</p> </b>
			  <label for="start_time"><b>Start time</b></label> <br>
    		  <input type="TIME" placeholder="HH:MM:SS" name="start_time" required> <br>

    		  <label for="end_time"><b>End time</b></label> <br>
    		  <input type="TIME" placeholder="HH:MM:SS" name="end_time" required> <br>
     
	    	<div class="clearfix">
		      <button type="button" class="cancelbtn" style="color: black">Cancel</button>
		      <button type="submit" class="signupbtn" name = "submit" style="color: black">Submit</button>
		    </div>
	      </div>
		</form>
	</div>
            </div>
          </div>
    </div>
    </div>

		<!-- Footer -->
<?php
   
   }
?>
		<div id="footer">
  		<div id="footer_content">
  			<div class="footer_item">
  				<p class="footer_heading">
  					Donate Blood				<!-- Footer Item We can add any link here-->
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="https://en.wikipedia.org/wiki/Blood_donation">Blood Donation</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.mayoclinic.org/patient-visitor-guide/minnesota/blood-donor-program/faq">Blood Donation FAQs</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://www.cbcc.us/donate-blood/types-of-blood-donation">Types of Blood Donations</a>		<!-- Have to add any link here-->
  					</li>
  				</ul>
  				<p class="footer_heading">
  					About Blood
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="https://www.oneblood.org/about-donating/blood-donor-basics/what-is-blood/">What is Blood?</a>			<!--Have to add the wipedia link -->
  					</li>
  					<li>
  						<a href="https://www.sandiegobloodbank.org/why-blood-donors-are-always-needed">Blood is Always Needed</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://blog.stridehealth.com/post/save-3-lives-with-1-blood-donation">How Blood Saves Life</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.oneindia.com/india/world-blood-donor-day-2017-every-year-india-requires-5-crore-units-of-blood-2464097.html">Facts & Figures</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  				<p class="footer_heading">
  				Get Involved
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="http://www.americasblood.org/get-involved/plan-a-blood-drive.aspx">Plan a Blood Drive</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="https://www.facebook.com/events/499975100119550">Blood Donation Programs</a>	<!-- Have to add any link here-->
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
  						<a href="http://www.iitrpr.ac.in/blood-donation-camp">What We Do</a>				<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="http://www.iitrpr.ac.in/blood-donation-camp">Our Programmes</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  			<p class="footer_heading">
  				Tools & Resources
  			</p>
  			<ul class="footer_list">
  				<li>
  					<a href="https://bloodconnect.wordpress.com/">Publications</a>					<!-- Have to add any link here-->
  				</li>
  				<li>
  					<a href="https://bloodconnect.wordpress.com/">Blog</a>							<!-- Have to add any link here-->
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
							<li><a href="https://www.facebook.com/prasad.kshirsagar.33449" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/Apple/status/989802699465089024" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://plus.google.com/u/1/115258054141875614692" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://www.instagram.com/kshirsagar_prasad/" class="instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/user/narendramodi" class="youtube"><i class="fa fa-youtube"></i></a></li>
							<li><a href="https://www.linkedin.com/feed/?trk=" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
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

