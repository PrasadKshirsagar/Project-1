<?php
    include_once  "dbh.inc.php";
    session_start();
    
   // echo $_POST['user'];
if (isset($_POST['submit'])) 
{ 
// Instructions if $_POST['value'] exist 
 
    $name = $_POST['name'];
    $user = $_POST['user'];
    $mob1 = $_POST['mob'];
    $email1 = $_POST['email'];
    $pwd1 = $_POST['psw'];
    $pwd2 = $_POST['psw-repeat'];
    $address = $_POST['address'];
    $weekdays_open = $_POST['weekdays_open'];
    $weekdays_close = $_POST['weekdays_close'];
    $saturday_close = $_POST['saturday_close'];
    $saturday_open = $_POST['saturday_open'];
    $sunday_close = $_POST['sunday_close'];
    $sunday_open = $_POST['sunday_open'];
    
   // $button = $_POST['MyRadio'];
    $msg = '';
    $msg2 ='';
    $num = 0;
    
   
   
//$sql = "SELECT * FROM `user` WHERE `username`='$user'";
$sql = "SELECT * FROM `hospital` WHERE `username`='$user'";
$result = $conn->query($sql);
//$result1 = $conn->query($sql1);
$x = 0;
//if($button == "First")
//{
 if($result->num_rows > 0)
 {
     $msg2 = 'Username exists';
     $x=1;
 }    
//}
/*else
//{
if($result1->num_rows > 0)
{
     $msg2 = 'Username exists';
     $x = 1;
}     
//}*/
    
    
    if($pwd1 != $pwd2){
         $msg = "Passwords do not match";
        // echo $msg;
    }
    elseif($x == 1)
    {
       $msg2 = 'Username exists';
    }
    else
    {
      
    $command = "INSERT INTO hospital(hospital_name, username, password, mobile_number_1, email_id, weekdays_open, saturday_open, sunday_open, weekdays_close, saturday_close, sunday_close) VALUES ('$name','$user', '$pwd1', '$mob1', '$email1', '$weekdays_open', '$saturday_open', '$sunday_open', '$weekdays_close', '$saturday_close', '$sunday_close')";
    $r1 = $conn->query($command);
    
 //   mysqli_query($conn , $command);
   // echo $r1;
    
    if ($r1 == 1) 
  {
      // echo 'outside1';
       $query2 = "SELECT hospital_id FROM hospital WHERE username = '$user'";  
       $r2 = $conn->query($query2); 
     //  echo 'outside3';
      // $rr = $r2["user_id"];
       //echo $r2;
       
       
       if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        
        $num = $row["hospital_id"];
        
      //  echo " ".$row["user_id"];
        
    }
    
}
       
 ?>
 <?php 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
 
    //echo "Hiiiiiiiii1";
    // url encode the address
    $address = urlencode($address);
     
     //echo "Hiiiiiiiii2";
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyDzsn-4wZV91omAtAEogIe2xyKxEcFafCk";
 
 //echo "Hiiiiiiiii3";
    // get the json response
    $resp_json = file_get_contents($url);
     
   //  echo "Hiiiiiiiii4";
    // decode the json
    $resp = json_decode($resp_json, true);
 
 //echo "Hiiiiiiiii5";
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
 //echo "Hiiiiiiiii";
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
        
   //     echo "Hiiiiiiiiiiiiiiiiiii".$lati;
     //   echo "Hiiiiiiiiiiiiiiiiiii".$longi;
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}

if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
   
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}

      
      // echo 'outside2';
     
      
       $query3 = "INSERT INTO address(address,hospital_id,latitude,longitude) VALUES ('$address', '$num','$latitude','$longitude')";
       echo $query3;
      $r3 = $conn->query($query3);  
     // echo $r3;
      
      
      
     	 if ($r3 == 1) 
   	 {
   	               // echo 'inside';
      		        $_SESSION["username"] = $user;
			$_SESSION["password"] = $pwd1;
       			header("Location: hospital_session/hos_homepage.php?login=success"); 
    
   	 } 
   	 else
   	 {
   	     	echo "second query failed";
   	 }
           
                
                    
   }
    else
   	 {
   	     	echo "first query failed";
   	 }
    
       
}       
}
?>




<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=time] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=time]:focus {
    background-color: #ddd;
    outline: none;
}
#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}
#message p {
    padding: 10px 35px;
    font-size: 18px;
}
.valid {
    color: green;
}
.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}
/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}
.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
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
.help-block {
    /*padding: 14px 20px;*/
    background-color: #f44336;
    float: right;
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

    <title>SignUp As Hospital</title>

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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="login_next.php">Login</a></li>
            <li><a href="signup_middle.php">Signup</a></li>
            <li><a href="contact.php">Contact Us</a></li>
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
              <h1 class="white-text">Sign Up As Hospital</h1>
            </div>
          </div>
        </div>
      </div>

    </div>
</head>
<body>

<!-- Contact -->
    <div id="contact" class="section">

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">

          <!-- contact form -->
          <div >
            <div class="contact-form">
            <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>


<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <label for="name"><b>Name Of Hospital</b></label>
    <input type="text" placeholder="Enter Hospital Name" name="name" required>
    
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>
    <span class="help-block"><?php if($x != 0) echo $msg2."<br>"; ?></span>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Insert Proper email id" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="psw-repeat" required>
    <span class="help-block"><?php if($msg != '') echo $msg."<br>"; ?></span>
    
    <label for="mobile"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter mobile number" name="mob" pattern="[0-9]*.{10}" title="Only valid mobile numbers are allowed." required>
    <!--
    <label for="MyRadio"><b>Select Role</b></label><br>
    <input type="radio" name="MyRadio" value="First" checked>User<br> 
    <input type="radio" name="MyRadio" value="Second">Hospital<br><br><br>   -->
    
    <label for="address"><b>Address</b></label> <br>
    <input type="text" placeholder="Enter Address" name="address" > <br>
    
    <label for="weekdays_open"><b>Weekdays Opening Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="weekdays_open" > <br>
    
    <label for="weekdays_close"><b>Weekdays Closing Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="weekdays_close" > <br> 
   
    
    <label for="saturday_open"><b>Saturday Opening Time</b></label><br>
    <input type="time" placeholder="HH:MM:SS" name="saturday_open" > <br>
    
    <label for="saturday_close"><b>Saturday Closing Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="saturday_close" > <br>
    
    <label for="sunday_open"><b>Sunday Opening Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="sunday_open" > <br> 
    
    <label for="sunday_close"><b>Sunday Closing Time</b></label><br> 
    <input type="time" placeholder="HH:MM:SS" name="sunday_close" > <br> 
    
    

    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" style="color: black">Cancel</button>
      <button type="submit" class="signupbtn" style="color: black" name = "submit" value="Geocode!">Sign Up</button>
    </div>
  </div>
</form>
</div>
            </div>
          </div>
    </div>
    </div>

		<!-- Footer -->

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
		<script type="text/javascript" src="js/main.js"></script>



<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


</body>
</html>
