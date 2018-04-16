<!DOCTYPE html>
<html>
<meta name="viewport" content="width=620" />
<title>geolocation</title>
<head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
</head> 
<body>
  <form>
    <input type="text" id="blood-group" placeholder="Enter the required blood group" /><br/>
    <input type="button" id="geolocation-button" value="Show Hospitals !!">
  </form>

<div id="result"></div>



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
</html>