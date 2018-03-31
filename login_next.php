<?php

include_once  "dbh.inc.php";
session_start();


if (isset($_POST['submit'])) 
{ 

$email = $_POST['uname'];
$password = ($_POST['psw']);
$err='';

$sql = "SELECT * FROM `user` WHERE `username`='$email' and `password`='$password'";
$sql1 = "SELECT * FROM `hospital` WHERE `username`='$email' and `password`='$password'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

if ($result->num_rows == 0 && $result1->num_rows == 0) {

  $err = 'Wrong Username or Password';

}

else
{

if($result->num_rows != 0 && $result1->num_rows == 0)
{
$_SESSION["username"] = $email;
$_SESSION["password"] = $password;
header("Location: welcome.php?login=success");
}
elseif($result->num_rows == 0 && $result1->num_rows != 0)
{
$_SESSION["username"] = $email;
$_SESSION["password"] = $password;
header("Location: hospital.php?login=success");

}

//echo "You have successfuly logged in. Please <a href='private_page.php?username=$email&pass=$password'>continue</a>.";

}

}

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.help-block {
    padding: 14px 20px;
    background-color: #f44336;
    float: right;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
<h2>Login Form</h2>
<!-- Have to change the action page-->
<form action="" method="post">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <span class="help-block"><?php if($err != '') echo $err; ?></span>
        
    <button type="submit" name = "submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
    <input type="button" onclick="location.href='home.php';" value="Back" />
  <!--  <button type="button" class="cancelbtn">Back</button>  -->
    <!--   <span class="psw">Forgot <a href="#">password?</a></span>  -->
  </div>
</form>

</body>
</html>
