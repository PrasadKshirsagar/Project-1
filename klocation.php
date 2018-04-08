<!DOCTYPE html>
<html>
<meta name="viewport" content="width=620" />
<title>geolocation</title>
<body>
<button type="button" id="geolocation-button">Find My Location !!</button>
<p>User's latitude is:  <span id="latitude"></span></p>
<p>User's longitude is:  <span id="longitude"></span></p>

<script>
const $geolocateButton = document.getElementById('geolocation-button');
$geolocateButton.addEventListener('click', geolocate);
function geolocate() {
  if (window.navigator && window.navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(onGeolocateSuccess, onGeolocateError);
  }
}
function onGeolocateSuccess(coordinates) {
  const { latitude, longitude } = coordinates.coords;
  console.log('Found coordinates: ', latitude, longitude);
  document.getElementById("latitude").innerHTML = latitude;
  document.getElementById("longitude").innerHTML = longitude;

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