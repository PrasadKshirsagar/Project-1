<?php
 
	include_once  "dbh.inc.php";
	session_start();
 
	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
	{
	  header("location: login_next.php");
	  exit;
	}

	$username = $_SESSION['username'];
	$query1 = "SELECT user_id FROM user WHERE username = '$username'";  
       $r1 = $conn->query($query1); 
       if ($r1->num_rows > 0) {
   
    // output data of each row
    while($row = $r1->fetch_assoc()) {
        
        $user_id = $row["user_id"];
        
      //  echo " ".$row["user_id"];
        
    }
    }else {
		echo "Wrong happen";}

	$sql = "SELECT final_date,final_time,hospital_name FROM appointment as a,hospital as h where Hospital_pending=0 and user_id='$user_id' and final_date >= CURDATE() and a.hospital_id=h.hospital_id;";
	$query = mysqli_query($conn, $sql);

	if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
	}
	?>
	<html>
<head>
	<title>Appointments</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
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
	</style>
</head>
<body>
	
	<table class="data-table">
		<caption class="title">Your Fixed Appointments for Blood Donation</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Hospital Name</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		
		while ($row = mysqli_fetch_array($query))
		{
			
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['hospital_name'].'</td>
					<td>'.$row['final_date'].'</td>
					<td>'.$row['final_time'].'</td>
				</tr>';
			
			$no++;
		}?>
		</tbody>
		
	</table>
</body>
</html>




