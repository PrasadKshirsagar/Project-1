
<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blood_connect";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	} 

	$latitude=$_POST['lat'];
	$longitude=$_POST['long'];
	$blood_group=$_POST['type'];

	$sql="SELECT address_id, address,latitude,longitude, ( 6371 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians(longitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude ) ) ) ) AS distance FROM address,blood_availability WHERE address.hospital_id=blood_availability.hospital_id AND blood_group='$blood_group' AND quantity>0 ORDER BY distance";

	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	    echo "<html><a target=\"_blank\" href=\"kmap.php?olat=".$latitude."&olong=".$longitude."&dlat=".$row["latitude"]."&dlong=".$row["longitude"]."\"> Address: ".$row["address"]."</a></html>"." &nbsp &nbsp &nbsp &nbsp Distance in km: ".$row["distance"]."<br>";
	}
	} else {
	echo "0 results";
	}
	$conn->close();
?>
