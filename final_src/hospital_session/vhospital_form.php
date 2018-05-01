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

	$username_hos = $_SESSION['username'];
	$password_hos = $_SESSION['password'];

 //   echo "$username_hos";
    $APA = $_POST['APA'];
//    $APS = $_POST['APS']; 
    $ANA = $_POST['ANA'];
//    $ANS = $_POST['ANS'];
    $BPA = $_POST['BPA'];
//<!--    $BPS = $_POST['BPS'] -->
    $BNA = $_POST['BNA'];
//<!--    $BNS = $_POST['BNS'] -->
    $OPA = $_POST['OPA'];
//<!--    $OPS = $_POST['OPS'] -->
    $ONA = $_POST['ONA'];
//<!--    $ONS = $_POST['ONS'] -->
    $ABPA = $_POST['ABPA'];
//<!--    $ABPS = $_POST['ABPS'] -->
    $ABNA = $_POST['ABNA'];
//<!--    $ABNS = $_POST['ABNS'] $get_hospital_id = "select hospital_id from hospital where username = '$username_hos' and password = '$password_hos';";
//$sql_query = "INSERT into blood availablity(blood_group,quantity) values("A+" , '$APA');";	

$query2 = "SELECT hospital_id FROM hospital WHERE username = '$username_hos'";  
       $r2 = $conn->query($query2); 
     //  echo 'outside3';
      // $rr = $r2["user_id"];
     // echo $r2;
        $num = 1;
       
       if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        
        $num = $row["hospital_id"];
        
      //  echo " ".$row["user_id"];
        
    }
    }else {
		echo "Wrong happen";}
 


$sql_check_query4 = "SELECT hospital_id FROM blood_availability WHERE hospital_id = '$num'";	
$resultcheck2 = $conn->query($sql_check_query4);


 if ($resultcheck2->num_rows == 0) {
 //echo "I am in insert"; 
$sql_query1 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('A+' , '$APA','$num')";	
$r1 = $conn->query($sql_query1);
	 
$sql_query2 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('A-' , '$ANA','$num')";	
$conn->query($sql_query2);
$sql_query3 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('B+' , '$BPA','$num')";	
$conn->query($sql_query3);
$sql_query4 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('B-' , '$BNA','$num')";	
$conn->query($sql_query4);
$sql_query5 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('O+' , '$OPA','$num')";	
$conn->query($sql_query5);
$sql_query6 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('O-' , '$ONA','$num')";	
$conn->query($sql_query6);
$sql_query7 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('AB+' , '$ABPA','$num')";	
$conn->query($sql_query7);
$sql_query8 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('AB-' , '$ABNA','$num')";
$conn->query($sql_query8);
}
else if($resultcheck2->num_rows > 0){
 //echo "I am in update";
$sql_query1_update = "UPDATE blood_availability set  quantity = '$APA' where hospital_id = '$num' and  blood_group = 'A+'";	
$conn->query($sql_query1_update);	 
$sql_query2_update = "UPDATE blood_availability set  quantity = '$ANA' where hospital_id = '$num' and  blood_group = 'A-'";	
$conn->query($sql_query2_update);
$sql_query3_update = "UPDATE blood_availability set quantity = '$BPA' where hospital_id = '$num' and  blood_group = 'B+'";	
$conn->query($sql_query3_update);
$sql_query4_update = "UPDATE blood_availability set  quantity = '$BNA' where hospital_id = '$num' and  blood_group = 'B-'";	
$conn->query($sql_query4_update);
$sql_query5_update = "UPDATE blood_availability set quantity = '$OPA' where hospital_id = '$num' and  blood_group = 'O+'";	
$conn->query($sql_query5_update);
$sql_query6_update = "UPDATE blood_availability set quantity = '$ONA' where hospital_id = '$num' and  blood_group = 'O-'";	
$conn->query($sql_query6_update);
$sql_query7_update = "UPDATE blood_availability set quantity = '$ABPA' where hospital_id = '$num' and  blood_group = 'AB+'";	
$conn->query($sql_query7_update);
$sql_query8_update = "UPDATE blood_availability set quantity = '$ABNA' where hospital_id = '$num' and  blood_group = 'AB-'";
$conn->query($sql_query8_update);
}
else {
echo 'Wrong in updation';}

}
?>

<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin:  0 25%;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    text-align: center;
    position:relative;

}

input[type=button] {
    width: 50%;
    background-color: #508abb;
    color: white;
    padding: 14px 20px;
    margin: 0 25%;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    position:relative;

}

input[type=button]:hover {
    background-color: red;
}




</style>
<style type="text/css">
table.space {
  border:1px solid black;
  border-spacing: 25px 15px;
  background-color:red;
  }
td {
  border:1px solid black;
  }
</style>
<!--
	<head>
		<title>Nearest Hospitals</title>
		<link rel="stylesheet" type="text/css" href="user.css"/>					<!-- Links the css file -->
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">		 For fitting in all devices 
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	</head>
	<body>
		<div id="container" style="white-space:nowrap">
      <div>
		    <div class="inline-block">
		        <img class="home1" src="homeimg1.jpg" alt="Blood is Life"/>
		    </div>

		    <div class="inline-block"> 
		        <h1 style="text-align:right;color:red;"><em>Nearest Hospitals</em></h1>
		    </div>
      </div>
		</div> 
-->
    <head>
        <link rel="stylesheet" href="vhomepage.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> Update Information</title>

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
            <li><a href="hos_homepage.php">Hello <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="hos_homepage.php">HOME</a></li>
            <li><a href="">Update Data</a></li>
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

    <!-- Hero-area -->
    <div class="hero-area">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/hospital2.jpg)"></div>
      <!-- /Backgound Image -->

      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h1 class="white-text">Blood Availability Info</h1>
         </div>
        </div>
      </div>

    </div>
    <!-- /Hero-area -->


    <div>
      <br><br><br><br>
    <div class="w3-row w3-center w3-display-container w3-row-padding">
        <div class="container w3-center" style="margin 0 auto">
            <form method="POST" action="">
            <div class="container w3-center" style="margin: 0 38% ;width :50%">
                <h2 style="text-align: center;margin-right: 45%">Availability</h2>
               <table class = \"w3-center\"id = \"AppTable\" width=50% bgcolor=\"#f0ffff\" cellpadding=\"10\" cellspacing=\"20\"  style=\"empty-cells: hide ;\">
                   <!-- <tr>
                        <th></th>
                        <th><b>Availability</b></th>
                        <br>
<!--                        <th><b>Scarcity</b></th>
                    </tr>-->
                    <tr>
                        <th><b>A+</b></th>
                        <td><input type="number" placeholder="units"name="APA" required></td> <!--in placeholder show previous value using php-->
  <!--                      <td><input type="number" placeholder="units" name="APS" required></td>
      -->              </tr>

                    <tr>
                        <th><b>A-</b></th>
                        <td><input type="number" placeholder="units" name="ANA" required></td>
  <!--                      <td><input type="number" placeholder="units" name="ANS" required></td>
      -->              </tr>
                    <tr>
                        <th><b>B+</b></th>
                        <td><input type="number" placeholder="units" name="BPA" required></td>
  <!--                      <td><input type="number" placeholder="units" name="BPS" required></td>
      -->              </tr>
                    <tr>
                        <th><b>B-</b></th>
                        <td><input type="number" placeholder="units" name="BNA" required></td>
   <!--                     <td><input type="number" placeholder="units" name="BNS" required></td>
       -->             </tr>
                    <tr>
                        <th><b>O+</b></th>
                        <td><input type="number" placeholder="units" name="OPA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="OPS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>O-</b></th>
                        <td><input type="number" placeholder="units" name="ONA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ONS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>AB+</b></th>
                        <td><input type="number" placeholder="units" name="ABPA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ABPS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>AB-</b></th>
                        <td><input type="number" placeholder="units" name="ABNA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ABNS" required></td>
        -->            </tr>
                </table>
                </div>
                    <br>
                    <input  type="submit" name="submit" value="Update" style="margin-left: 5%"> 
                
            </form>
        </div>
    </div>


    </div>

    


	<br><br><br><br><br>	
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
