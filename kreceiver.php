<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin:  8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    align: center;

}

input[type=button] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px  0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

input[type=button]:hover {
    background-color: #45a049;
}


</style>
	<head>
		<title>Nearest Hospitals</title>
		<link rel="stylesheet" type="text/css" href="user.css"/>					<!-- Links the css file -->
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">		 For fitting in all devices -->
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

    <div>
      <br><br><br><br>
      <form>
       <label for="blood-group" >Select the required blood group</label>
    <select id="blood-group"  name="blood-group">
      <option value="A+">A+</option>
      <option value="B+">B+</option>
      <option value="AB+">AB+</option>
      <option value="O+">O+</option>
      <option value="A-">A-</option>
      <option value="B-">B-</option>
      <option value="AB-">AB-</option>
      <option value="O-">O-</option>
    </select>
       
       <input type="button" id="geolocation-button" value="Show Hospitals !!">
     </form>
     <div id="result"></div>
    </div>

    

<script>
const $geolocateButton = document.getElementById('geolocation-button');
$geolocateButton.addEventListener('click', geolocate);
function geolocate() {
  if (window.navigator && window.navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(onGeolocateSuccess, onGeolocateError);
  }
}
function onGeolocateSuccess(coordinates) {
  var blood_type=$('#blood-group').val();
  const { latitude, longitude } = coordinates.coords;
  console.log('Found coordinates: ', latitude, longitude);
  $.post('kdistance.php',{lat:latitude,long:longitude,type:blood_type},
    function(data)
    {
       $('#result').html(data);
    });

}

function onGeolocateError(error) {
  console.warn(error.code, error.message);
 
  if (error.code === 1) {
    // they said no
  } else if (error.code === 2) {
    // position unavailable
  } else if (error.code === 3) {
    // timeout
  }
}
</script>
		
	<br><br><br><br><br>	
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
