
<?php 

        include_once  "dbh.inc.php";
	$latitude=$_POST['lat'];
	$longitude=$_POST['long'];
	$blood_group=$_POST['type'];
	
	

	$sql="SELECT address_id, address,latitude,longitude,weekdays_open ,saturday_open ,sunday_open ,weekdays_close ,saturday_close ,sunday_close, ( 6371 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians(longitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude ) ) ) ) AS distance FROM address,blood_availability,hospital WHERE address.hospital_id=blood_availability.hospital_id AND hospital.hospital_id=address.hospital_id AND blood_group='$blood_group' AND quantity>0 ORDER BY distance";
	

	$query = mysqli_query($conn, $sql);

	if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
	}
	
	echo "<html>
<head>
	
	<style type=\"text/css\">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: \"segoe-ui\", \"open-sans\", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: \"Lucida Sans Unicode\", \"Lucida Grande\", \"Segoe Ui\";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: \"\";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
	</style>
</head>
<body>
    <br><br>
	<table class=\"data-table\">
		<caption class=\"title\">Nearest hospitals which contain ".$blood_group." blood group are : </caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Hospital Name</th>
				<th>Distance (in km)</th>
				<th>Map for directions </th>
				<th>Timing</th>
			</tr>
		</thead>
		<tbody>";

	$no 	= 1;
		
		while ($row = mysqli_fetch_array($query))
		{
			
			echo "<tr>
				<td>".$no."</td>
				
				<td>".$row["address"]."</td>
				<td>".round($row["distance"], 2)."</td>
				<td><a target=\"_blank\" href=\"mymap.php?olat=".$latitude."&olong=".$longitude."&dlat=".$row["latitude"]."&dlong=".$row["longitude"]."\">"."Show Map"."</a></td>
				<td><div  class=\"popup\" onclick=\"myFunction()\"><a href= \"#\"> Show Timing</a>
  <span class=\"popuptext\" id=\"myPopup\">Weekday's Timings : ".$row["weekdays_open"]." to ".$row["weekdays_close"]."<br>Saturday's Timings : ".$row["saturday_open"]." to ".$row["saturday_close"]."<br>Sunday's Timings : ".$row["sunday_open"]." to ".$row["sunday_close"]."</span>
</div></td>
				</tr>";
			
			$no++;
		}
	echo "</tbody>
		
	</table>
	<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById(\"myPopup\");
    popup.classList.toggle(\"show\");
}
</script>
</body>
</html>";

	
	$conn->close();
?>
