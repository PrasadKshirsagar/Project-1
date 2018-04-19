<?php
	if(isset($_GET['lat'])){
		$latitude = $_GET['lat'];
		$longitude = $_GET['long'];
		$address = $_GET['add'];
		echo "User's latitude is : ".$latitude;
		echo "<br/>";
		echo "User's longitude is : ".$longitude;
		echo "<br/>";
		echo "Hospital's address is : ".$address;
	} else {
		echo "failed";
	}
?>