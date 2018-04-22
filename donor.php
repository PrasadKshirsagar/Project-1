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
		<title>DonorPage</title>
		<link rel="stylesheet" type="text/css" href="donor.css"/>					<!-- Links the css file -->
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
        <a href="before_eligibility.php" class="btn btn-primary">Am I Eligible</a>    <!--Have to add FAQ file-->
    </div>
    <div class="btn-group">
        <a href="appointment.php" class="btn btn-primary">Fix An Appointment</a>    <!--Have to add -->
    </div>
	    <div class="btn-group">
	      <a href="rhlogout.php" button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>Log Out</button></a>	<!--For login It will open into a login link -->
	    </div>
	  </div>    
	</div>
	</div>
	<!-- Adding footer Have to modify-->
  <h2>Blood Donation Frequently Asked Questions</h2>
  <hr>
  <div class="page-info">
    
  <div class="content-wrapper">
    <div class="content">
      <!--<div class="container_1">
          ::before           
          ::after
      </div>  -->
      <ul>
      <li>
      <h3>
      <b>Am I eligible to donate blood?</b><img width="500px" height="300px" src="donor1.jpg" alt="Donor's image" align="right">
      </h3>
      <p>While the majority of the population is eligible to donate blood, less than four percent donates annually.</p>
      </li>
      <li>
      <h3>
      <b>Is donating blood safe? Is it possible to get a disease while donating blood?</b>
      </h3>
      <p>Donating blood is safe. All materials used during the donation process are sterile and used only once. You cannot get any infectious disease by donating blood.</p>
      </li>
      <li>
      <h3>
      <b>I’m afraid I’ll feel faint after giving blood. Will this happen to me?</b>
      </h3>
      <p>The vast majority of people feel fine after giving blood, however, it’s always important to eat a well-balanced meal before donating and to be well-hydrated. It also helps to eat an iron-rich diet, especially in the days preceding your donation.</p>
      </li>
      <li>
      <h3>
      <b>Where can I donate blood?</b>
      </h3>
      <p>You can donate blood at any hospital near you. <a href="#" style="color:red;">Find a center or hospital near you.</a></p>    <!--Have to add link -->
      </li>
      <li>
      <h3>
      <b>How often can I donate blood?</b>
      </h3>
      <p>You can donate 4 times in a year.</p>
      </li>
      <li>
      <h3>
      <b>What happens to my blood after I donate?</b>
      </h3>
      <p>Once you have donated, your blood is sent to our state-of-the-art laboratory for typing and testing. It is then distributed to local hospitals and patients in need.</p>
      </li>
      </ul>
    </div>
  </div>
</div>

<h2>
General Requirements for Blood Donation
</h2>
<hr>

<div class="page-info">
  <div class="content-wrapper">
    <div class="content">
    <h3>
      <b>Blood Donor Qualifications:</b>
    </h3>
      <ul>
        <li>
          <b>Age :</b>
          Age should be atleast 18 years.
        </li>

        <li>
          <b>Weight: </b>
          At least 110 lbs.
        </li>
        <li>
          <b>Health: </b>
          General good health
        </li>
      </ul>
      <h3>
        <b>Quick Tips: </b>
      </h3>
      <ul>
        <li>
            <b>Diet: </b>
            A well-balanced meal is recommended within four hours of donation.
        </li>
        <li>
          <b>Hydrate: </b>
          Being well-hydrated helps donors maintain blood volume and can prevent dizziness or fainting.
        </li>
      </ul>
      <h3>
        <b>Do not donate if any of the following apply to you:</b>
      </h3>
      <ul>
        <li>
          <b>HIV/AIDS: </b>
          You are a person with symptoms or laboratory evidence of HIV infection.
        </li>
        <li>
          <b>Cancer: </b>
          Hematological, ie: Hodgkin, Leukemia, Lymphomas.
        </li>
        <li>
          <b>Organ Failure:</b>
          Kidney, lung or liver failure.
        </li>
        <li>
          <b>Recreational Drug Use (by injection):</b>
           Having injected yourself with drugs not prescribed by a physician. 
        </li>

      </ul>
    </div>
  </div>
 </div>

 <h2>Fix An Appointment</h2>
  <hr>
 <div class="page-info">
  <div class="content-wrapper">
    <div class="content">
    
    </div>
  </div>
 </div>

 <h2>Donors Stories</h2>
  <hr>
 <div class="page-info">
  <div class="content-wrapper">
    <div class="content">
      
    </div>
  </div>
 </div>
 <h2>Tell your experience to others</h2>
 <div class="feedback">
  <form action="/action_page.php">    <!--Have to change it -->
    
    <label for="feedback">Share Your Feedback</label>
    <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</div>

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
