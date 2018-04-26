<?php
	if(isset($_GET['olat'])){
		$olatitude = $_GET['olat'];
		$olongitude = $_GET['olong'];
		$dlatitude = $_GET['dlat'];
		$dlongitude = $_GET['dlong'];
		echo "User's latitude is : ".$olatitude;
		echo "<br/>";
		echo "User's longitude is : ".$olongitude;
		echo "<br/>";
		echo "Hospital's latitude is : ".$dlatitude;
		echo "<br/>";
		echo "Hospital's longitude is : ".$dlongitude;
		echo "<br/>";
	} else {
		echo "failed";
	}
?>