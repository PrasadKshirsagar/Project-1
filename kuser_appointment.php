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

	session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}

if (isset($_POST['submit'])) 
{
	$username = $_SESSION['username'];
	$hospital_id = $_POST['hospital'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

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

	

	$query2 = "INSERT into appointment(user_id,hospital_id,starting_time,ending_time,starting_date,ending_date) values('$user_id' , '$hospital_id','$start_time','$end_time','$start_date','$end_date')";

	$conn->query($query2);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
	body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box}
	/* Full-width input fields */

	input[type=text], select {
	    width: 50%;
	    padding: 12px 20px;
	    margin:  8px 0;
	    display: block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	    align: center;

	}

	input[type=text], input[type=TIME],input[type=DATE] {
	    width: 100%;
	    padding: 15px;
	    margin: 5px 0 22px 0;
	    display: inline-block;
	    border: none;
	    background: #f1f1f1;
	}
	input[type=text]:focus, input[type=TIME]:focus,input[type=DATE]:focus {
	    background-color: #ddd;
	    outline: none;
	}
	
	hr {
	    border: 1px solid #f1f1f1;
	    margin-bottom: 25px;
	}
	/* Set a style for all buttons */
	button {
	    background-color: #4CAF50;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    cursor: pointer;
	    width: 100%;
	    opacity: 0.9;
	}
	button:hover {
	    opacity:1;
	}
	/* Extra styles for the cancel button */
	.cancelbtn {
	    padding: 14px 20px;
	    background-color: #f44336;
	}
	
	/* Float cancel and signup buttons and add an equal width */
	.cancelbtn, .signupbtn {
	  float: left;
	  width: 50%;
	}
	/* Add padding to container elements */
	.container {
	    padding: 16px;
	}
	/* Clear floats */
	.clearfix::after {
	    content: "";
	    clear: both;
	    display: table;
	}
	/* Change styles for cancel button and signup button on extra small screens */
	@media screen and (max-width: 300px) {
	    .cancelbtn, .signupbtn {
	       width: 100%;
	    }
	}
	</style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
    </div>
    
    	<form action="" method="POST" style="border:1px solid #ccc">
		  <div class="container">
		    
		    <p>Please fill this form to fix an appointment.</p>
		    <hr>
		    
		    <label for="hospital"><b>Name Of Hospital</b></label><br>
		    <select id="hospital" name="hospital">
		    	<?php
		    	    $sql="select hospital_id,hospital_name from hospital";
		    	    $result = mysqli_query($conn,$sql);

						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						    echo "<html><option value=\"".$row["hospital_id"]."\">".$row["hospital_name"]."</option></html>";
						}
						} else {
						echo "0 results";
						}

		    	?>
		    	
		    </select><br>
		    <label for="start_date"><b>Start date</b></label> <br>
		    <input type="DATE" placeholder="start_date" name="start_date" required><br>

		    <label for="end_date"><b>End date</b></label> <br>
		    <input type="DATE" placeholder="end_date" name="end_date" required><br>

			  <label for="start_time"><b>Start time</b></label> <br>
    		  <input type="TIME" placeholder="HH:MM:SS" name="start_time" required> <br>

    		  <label for="end_time"><b>End time</b></label> <br>
    		  <input type="TIME" placeholder="HH:MM:SS" name="end_time" required> <br>
     
	    	<div class="clearfix">
		      <button type="button" class="cancelbtn">Cancel</button>
		      <button type="submit" class="signupbtn" name = "submit" >Submit</button>
		    </div>
	      </div>
		</form>
		    
    	
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>


