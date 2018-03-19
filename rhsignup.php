<!-- Sign Up form have to modify-->
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>  <!--Title of the signup page -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
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
<!-- Have to change the action file-->
<form action="login.inc.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

	<label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="user_id" required>


    <label for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="first" required>

    <label for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="last" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <!-- Have to add address part here. But till now I am leaving.    -->

    <!-- For mobile number -->
    <label for="phone"><b>Mobile No.</b></label>
    <input type="text" placeholder="Mobile No." name="mobile" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p><!--Have to add terms and conditions -->

    <div class="clearfix">
      <button type="button" class="cancel">Cancel</button>
      <button type="submit" class="submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>