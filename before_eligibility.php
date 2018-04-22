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
		<title>Appointment Page</title>
		<link rel="stylesheet" type="text/css" href="appointment.css"/>					<!-- Links the css file -->
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
		<img class="home1" src="homeimg1.jpg" alt="Blood is Life">					<!--Sample Image Added-->
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
	      <a href="user.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Home</button></a>      <!--Homepage of donor will be user.php -->
	    </div>
	    <div class="btn-group">
	      <button type="button" class="btn btn-primary">About Us</button>
	    </div>
      <div class="btn-group">
        <a href="#" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Hello <?php echo htmlspecialchars($_SESSION['username']); ?></button></a>  <!--For sign Up It will open into a sign up form -->
      </div>
      <div class="btn-group">
        <a href="#" class="btn btn-primary">Am I Eligible</a>    <!--Have to add FAQ file-->
    </div>
    <div class="btn-group">
        <a href="appointment.php" class="btn btn-primary">Fix An Appointment</a>    <!--Have to add FAQ file-->
    </div>
	    <div class="btn-group">
	      <a href="logout.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log Out</button></a>	<!--For login It will open into a login link -->
	    </div>
	  </div>    
	</div>
	</div>
	<div class="phead">
      <h3 align="center">Fix Appointment For Blood Donation: Be a Blood Donor</h3>
  </div>
  <div class="page-info">
    <div class="content-wrapper">
      <div class="content">
        
      </div>
    </div>
  </div>
  
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
        echo "Your Previous record is as follows :<br>";
        echo "Blood Group :". $bg."<br>";
        echo "Age :". $age."<br>";
       // echo "Height :". $height;
        echo "Weight :". $weight."<br>";
        echo "Systolic Blood Pressure :". $blood_pressure_systolic."<br>";
        echo "Diastolic Blood Pressure  :". $blood_pressure_diastolic."<br>";
        echo "Haemoglobin Level  :". $haemoglobin."<br>";
        echo '<br> <a href="eligible.php">Click here </a>to update record <br>';

      //  echo " ".$row["user_id"];
        
     }
    
 }
 else{
  echo "No Record found .<br>";
  echo '<a href="eligible.php">Click here </a>to check eligibility <br>';

 }
 
 

?>




</div>
<!-- Adding footer Have to modify-->
	<div id="footer">
  		<div id="footer_content">
  			<div class="footer_item">
  				<p class="footer_heading">
  					Donate Blood				<!-- Footer Item We can add any link here-->
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="">Blood Donation</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">Blood Donation FAQs</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">Types of Blood Donations</a>		<!-- Have to add any link here-->
  					</li>
  				</ul>
  				<p class="footer_heading">
  					About Blood
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="">What is Blood?</a>			<!--Have to add the wipedia link -->
  					</li>
  					<li>
  						<a href="">Blood is Always Needed</a>	<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">How Blood Saves Life</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">Facts & Figures</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  				<p class="footer_heading">
  				Get Involved
  				</p>
  				<ul class="footer_list">
  					<li>
  						<a href="">Plan a Blood Drive</a>		<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">Blood Donation Programs</a>	<!-- Have to add any link here-->
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
  						<a href="">What We Do</a>				<!-- Have to add any link here-->
  					</li>
  					<li>
  						<a href="">Our Programmes</a>			<!-- Have to add any link here-->
  					</li>
  				</ul>
  			</div>
  			<div class="footer_item">
  			<p class="footer_heading">
  				Tools & Resources
  			</p>
  			<ul class="footer_list">
  				<li>
  					<a href="">Publications</a>					<!-- Have to add any link here-->
  				</li>
  				<li>
  					<a href="">Blog</a>							<!-- Have to add any link here-->
  				</li>
  				<li>
  					<a href="">Contact Us</a>					<!-- Have to add any link here-->
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
		<div class="clear"></div>
			<div id="footer_bottom">
				<div class="wrapper">
					<p>This site has been made under CSP203 Project</p>
				</div>
			</div>
		</div>
	</div>									<!--End of footer -->
	</body>
</html>
