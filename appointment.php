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
        <a href="#" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Hello User</button></a>  <!--For sign Up It will open into a sign up form -->
      </div>
      <div class="btn-group">
        <a href="#" class="btn btn-primary">Am I Eligible</a>    <!--Have to add FAQ file-->
    </div>
    <div class="btn-group">
        <a href="appointment.php" class="btn btn-primary">Fix An Appointment</a>    <!--Have to add FAQ file-->
    </div>
	    <div class="btn-group">
	      <a href="rhlogout.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>Log Out</button></a>	<!--For login It will open into a login link -->
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
      <p>Blood Donation is service to Humankind,By Donating Blood you help a needy and save a precious life. The blood you donate gives someone another chance at life. Do something amazing today.</p>
      <p>DONATE BLOOD SAVE LIFE. Your blood donation may be even more special than you realize. A single donation from you can help one or more patients. So Dear Friend, "Donate your blood for a reason, let the reason to be life"</p>    
      </div>
    </div>
  </div>
  <div class="Details">Donor Information</div>
  <hr style="margin:0 0 5px 0;display: block;">
  <div class="donorinfo">
  <form action="/action_page.php">
    <label for="fname">Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Enter your address..">
    <label for="gender">Gender</label>
    <select id="gender" name="gender">
      <option value="select">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    <label for="age">Age</label>
    <input type="text" id="age" name="age" placeholder="Your age..">
    <label for="weight">Weight</label>
    <input type="text" id="weight" name="weight" placeholder="Your weight..">
    <label for="blood">Blood Group</label>
    <select id="blood" name="blood">
      <option value="select">Select Blood Group</option>
      <option value="ap">(A+) A Positive</option>
      <option value="an">(A-) A Negative</option>
      <option value="bp">(B+) B Positive</option>
      <option value="bn">(B-) B Negative</option>
      <option value="op">(O+) O Positive</option>
      <option value="on">(O-) O Negative</option>
      <option value="abp">(AB+) AB Positive</option>
      <option value="abn">(AB-) AB Negative</option>
    </select>
    <label for="aadharno">Aadhar Number</label>
    <input type="text" id="aadharno" name="aadharno" placeholder="Your aadhar Number..">
    <label for="mobile">Mobile No</label>
    <input type="text" id="mobile" name="mobile" placeholder="Your Mobile Number..">
    <label for="email">Email Id</label>
    <input type="text" id="email" name="email" placeholder="Your Email Id..">
    <label for="date">Date</label>
    <input type="text" id="date" name="date"  placeholder="Enter Date..">     <!-- Have to improve the date part in the form-->

    <input type="submit" value="Submit">
  </form>
</div>

<h3 style="font-weight: bold;"> Search Hospital Near You</h3>
  <p>Have To add api for showing the results.</p>
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
