<?php

    include_once  "dbh.inc.php";
    session_start();
    
   // echo $_POST['user'];

if (isset($_POST['submit'])) 
{ 
// Instructions if $_POST['value'] exist 
 
    $name = $_POST['name'];
    $user = $_POST['user'];
    $mob1 = $_POST['mob'];
    $email1 = $_POST['email'];
    $pwd1 = $_POST['psw'];
    $pwd2 = $_POST['psw-repeat'];
    $address = $_POST['address'];
    $weekdays_open = $_POST['weekdays_open'];
    $weekdays_close = $_POST['weekdays_close'];
    $saturday_close = $_POST['saturday_close'];
    $saturday_open = $_POST['saturday_open'];
    $sunday_close = $_POST['sunday_close'];
    $sunday_open = $_POST['sunday_open'];
    
   // $button = $_POST['MyRadio'];
    $msg = '';
    $msg2 ='';
    $num = 0;
    
   
   
//$sql = "SELECT * FROM `user` WHERE `username`='$user'";
$sql = "SELECT * FROM `hospital` WHERE `username`='$user'";
$result = $conn->query($sql);
//$result1 = $conn->query($sql1);
$x = 0;

//if($button == "First")
//{
 if($result->num_rows > 0)
 {
     $msg2 = 'Username exists';
     $x=1;
 }    
//}
/*else
//{
if($result1->num_rows > 0)
{
     $msg2 = 'Username exists';
     $x = 1;
}     
//}*/

    
    
    if($pwd1 != $pwd2){
         $msg = "Passwords do not match";
        // echo $msg;
    }
    elseif($x == 1)
    {
       $msg2 = 'Username exists';
    }
    else
    {
      
    $command = "INSERT INTO hospital(hospital_name, username, password, mobile_number_1, email_id, weekdays_open, saturday_open, sunday_open, weekdays_close, saturday_close, sunday_close) VALUES ('$name','$user', '$pwd1', '$mob1', '$email1', '$weekdays_open', '$saturday_open', '$sunday_open', '$weekdays_close', '$saturday_close', '$sunday_close')";
    $r1 = $conn->query($command);
    
 //   mysqli_query($conn , $command);
   // echo $r1;
    
    if ($r1 == 1) 
  {
      // echo 'outside1';
       $query2 = "SELECT hospital_id FROM hospital WHERE username = '$user'";  
       $r2 = $conn->query($query2); 
     //  echo 'outside3';
      // $rr = $r2["user_id"];
       //echo $r2;
       
       
       if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        $num = $row["hospital_id"];
      //  echo " ".$row["user_id"];
        
    }
    
}
       
       
      // echo 'outside2';
     
       
       $query3 = "INSERT INTO address(address,hospital_id) VALUES ('$address', '$num')";
      $r3 = $conn->query($query3);  
     // echo $r3;
      
      
      
     	 if ($r3 == 1) 
   	 {
   	               // echo 'inside';
      		        $_SESSION["username"] = $user;
			$_SESSION["password"] = $pwd1;
       			header("Location: hospital.php?login=success"); 
    
   	 } 
   	 else
   	 {
   	     	echo "second query failed";
   	 }
           
                
                    
   }
    else
   	 {
   	     	echo "first query failed";
   	 }
    
       
}       


}

?>




<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=time] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=time]:focus {
    background-color: #ddd;
    outline: none;
}

#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 10px 35px;
    font-size: 18px;
}

.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
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
.help-block {
    /*padding: 14px 20px;*/
    background-color: #f44336;
    float: right;
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
<body>

<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="name"><b>Name Of Hospital</b></label>
    <input type="text" placeholder="Enter Hospital Name" name="name" required>
    
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>
    <span class="help-block"><?php if($x != 0) echo $msg2."<br>"; ?></span>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Insert Proper email id" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="psw-repeat" required>
    <span class="help-block"><?php if($msg != '') echo $msg."<br>"; ?></span>
    
    <label for="mobile"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter mobile number" name="mob" pattern="[0-9]*.{10}" title="Only valid mobile numbers are allowed." required>
    <!--
    <label for="MyRadio"><b>Select Role</b></label><br>
    <input type="radio" name="MyRadio" value="First" checked>User<br> 
    <input type="radio" name="MyRadio" value="Second">Hospital<br><br><br>   -->
    
    <label for="address"><b>Address</b></label> <br>
    <input type="text" placeholder="Enter Address" name="address" required> <br>
    
    <label for="weekdays_open"><b>Weekdays Opening Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="weekdays_open" required> <br>
    
    <label for="weekdays_close"><b>Weekdays Closing Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="weekdays_close" required> <br> 
   
    
    <label for="saturday_open"><b>Saturday Opening Time</b></label><br>
    <input type="time" placeholder="HH:MM:SS" name="saturday_open" required> <br>
    
    <label for="saturday_close"><b>Saturday Closing Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="saturday_close" required> <br>
    
    <label for="sunday_open"><b>Sunday Opening Time</b></label> <br>
    <input type="time" placeholder="HH:MM:SS" name="sunday_open" required> <br> 
    
    <label for="sunday_close"><b>Sunday Closing Time</b></label><br> 
    <input type="time" placeholder="HH:MM:SS" name="sunday_close" required> <br> 
    
    

    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name = "submit">Sign Up</button>
    </div>
  </div>
</form>


<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


</body>
</html>


