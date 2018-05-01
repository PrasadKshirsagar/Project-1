<?php
    $dbServer = "localhost";
    $dbUsername = "root";
    $dbPassword = "abhi12345";
    $dbName = "blood_connect";

    $conn = mysqli_connect($dbServer ,$dbUsername,$dbPassword,$dbName);
    
    
  //  $conn = new mysqli($dbServer ,$dbUsername,$dbPassword,$dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//secho "Connected successfully";

?>

