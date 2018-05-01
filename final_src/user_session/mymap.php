<!DOCTYPE html>
<html>
  <head>
  <link rel ="shortcut icon" href ="logo1.png"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map for Directions</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #warnings-panel {
        width: 100%;
        height:10%;
        text-align: center;
      }
    </style>
  </head>
  <body>
  <?php 
  	if(isset($_GET['olat'])){
		$lat_origin = $_GET['olat'];
		$lng_origin = $_GET['olong'];
		$lat_dest = $_GET['dlat'];
		$lng_dest = $_GET['dlong'];
/*		echo "User's latitude is : ".$olatitude;
		echo "<br/>";
		echo "User's longitude is : ".$olongitude;
		echo "<br/>";
		echo "Hospital's latitude is : ".$dlatitude;
		echo "<br/>";
		echo "Hospital's longitude is : ".$dlongitude;
		echo "<br/>";*/
	
//  $lat_origin = 30.9756;
//  $lng_origin = 76.5389;
//  $lat_dest = 30.9720;
//  $lng_dest = 76.5302;
  
   echo "<body onLoad=\"map_display('".$lat_origin."','".$lng_origin."','".$lat_dest."','".$lng_dest."')\"/>";
   } else {
		echo "failed";
	}
    ?>
    <div id="map" style="width:100%;height:100%;margin:0 auto;"></div>
    &nbsp;
    <div id="warnings-panel"></div>
    
    <script>            
   function map_display(lat1,long1,lat2,long2){
    position_dict_origin = {lat:parseFloat(lat1),lng:parseFloat(long1)};
    position_dict_destin = {lat:parseFloat(lat2),lng:parseFloat(long2)};
    
     var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 20.5937, lng: 78.9629}
        });
        initMap(map,position_dict_origin ,position_dict_destin)
    } 
    
      
      function initMap(map,origin,dest) {
        var markerArray = [];
        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;
        // Create a map and center it on Manhattan.
        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;
        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute( directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
//        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map,origin,dest);
//        };
//        document.getElementById('start').addEventListener('change', onChangeHandler);
//        document.getElementById('end').addEventListener('change', onChangeHandler);
      }
      function calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map,origin1,dest1) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }
            console.log(origin1,dest1);
        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
            origin: origin1,
            destination: dest1,
            travelMode: 'WALKING',
            provideRouteAlternatives: true,
            optimizeWaypoints: true,
          //  unitSystem: 'imperial'
          //  transit_routing_preference: 'less_walking'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            //document.getElementById('warnings-panel').innerHTML = '<b>' + response.routes[0].warnings + '</b>';
            directionsDisplay.setDirections(response);
            showSteps(response, markerArray, stepDisplay, map);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
          marker.setMap(map);  //uncomment to remove markers
          var trafficLayer = new google.maps.TrafficLayer();
          trafficLayer.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
      }
      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }
    </script>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKTYdpqSvholVWEqv2D3a82SLAnf5RMws">
   </script>

  </body>
</html>
