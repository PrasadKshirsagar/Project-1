
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
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin:  0 25%;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    align: center;
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
    background-color: #508abb;
}




</style>
<style type="text/css">
table.space {
  border:1px solid black;
  border-spacing: 25px 15px;
  background-color:;
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

    <title>Nearest Hospitals</title>

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

    <!-- Hero-area -->
    <div class="hero-area">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(./img/img2.jpg)"></div>
      <!-- /Backgound Image -->

      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
         <!--   <h1 class="white-text">Nearest Hospital</h1>
          --></div>
        </div>
      </div>

    </div>
    <!-- /Hero-area -->


    <div>
      <br><br><br><br>
  <?php
//  echo 'hello';
    $user = $_SESSION['username'];
    $query1 = "SELECT hospital_id,hospital_name FROM hospital WHERE username = '$user'";
    $r2 = $conn->query($query1);
    $num =0;
  //      echo 'hello9';    
        
        while($row = $r2->fetch_assoc()) {
            $num = $row["hospital_id"];
            $name=$row["hospital_name"];
        }
        // echo $num;


        $query2 = "SELECT appointment_id,user_id,starting_date,ending_date,final_date,starting_time,ending_time,final_time from appointment where hospital_id = '$num' and Hospital_pending = 1";
        $result = $conn->query($query2) or die($conn->error);

 echo  '<div class="w3-row w3-center w3-display-container w3-row-padding"style="height:100%">';
        echo "<h1 style = \"w3-center\"  >$name </br></h1> ";

            echo "<h2>Check the appointments</h2>";
           echo  '<div class="container w3-center " style="margin-left: auto; margin-right: auto ;height:100%">';
        if ($result ->num_rows > 0)
        {  
            echo "<table class = \"space\"  width=100% style=\"empty-cells: hide;margin:0 auto\">";
            echo    "<tr>";
            echo        "<td>Donor's Name</td>";
            echo        "<td>Starting Date</td>";
            echo        "<td>Ending Date</td>";
            echo        "<td>Final Date</td>";
            echo        "<td>Starting Time</td>";
            echo        "<td>Ending Time</td>";
            echo        "<td>Final Time</td>";
            echo        "<td>Status</td>";
            echo    "</tr>"    ;
            while($row = $result->fetch_assoc())
            {
                echo ' <form method="POST" action="">';
                echo '<tr>';
                $user_id = $row["user_id"];
                $query3 = "SELECT username from user where user_id = '$user_id'";
                $result3 = $conn->query($query3) or die($conn->error);
                $username =  $result3->fetch_assoc();
                echo    '<td>'.$username["username"].'</td>';
                echo    '<td>'.$row["starting_date"].'</td>';
                echo    '<td>'.$row["ending_date"].'</td>';
                echo    '<td><input type="DATE" placeholder="fix date" name="FD" required></td>';
                echo    '<td>'.$row["starting_time"].'</td>';
                echo    '<td>'.$row["ending_time"].'</td>';
                echo    '<td><input type="TIME" placeholder="fix time" name="FT" required></td>';
                echo    "<td><input onclick=\"foo(FD,FT,'".$user_id."','".$num."','".$row["appointment_id"]."')\" type=\"submit\" name = \"submit\" value=\"Fix\" required></td>";
                echo '</form>';
                echo '</tr>';
            }
//        echo "</div>";
        echo "</table>";    
        }
        else {echo "<div><h3></br>NO APPOINTMENTS</h3></div>";}
       
        echo "</div>";
        echo "</div>";

    ?>
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
    	
    	<script>
      function foo(FD,FT,FF,HID,APPID){
        $.post('vrun_query.php',{final_date:FD.value,final_time:FT.value,user_id:FF,hospital_id:HID,appointment_id:APPID},function(data)
            {
                //    alert(data);
                //    $('#result').html(data);
            }
        );
        /*  alert(FD.value);
            alert(FF);
            alert(HID)
            alert(FT.value);
            $.post('vrun_query.php',{})
            alert("It is working");
          */
    }
    </script>
    

</html>
