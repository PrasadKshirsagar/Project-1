<?php

    include_once  "dbh.inc.php";
    session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
  header("location: login_next.php");
  exit;
}
    if (isset($_POST['submit'])) 
{

	$username_hos = $_SESSION['username'];
	$password_hos = $_SESSION['password'];

 //   echo "$username_hos";
    $APA = $_POST['APA'];
//    $APS = $_POST['APS']; 
    $ANA = $_POST['ANA'];
//    $ANS = $_POST['ANS'];
    $BPA = $_POST['BPA'];
//<!--    $BPS = $_POST['BPS'] -->
    $BNA = $_POST['BNA'];
//<!--    $BNS = $_POST['BNS'] -->
    $OPA = $_POST['OPA'];
//<!--    $OPS = $_POST['OPS'] -->
    $ONA = $_POST['ONA'];
//<!--    $ONS = $_POST['ONS'] -->
    $ABPA = $_POST['ABPA'];
//<!--    $ABPS = $_POST['ABPS'] -->
    $ABNA = $_POST['ABNA'];
//<!--    $ABNS = $_POST['ABNS'] $get_hospital_id = "select hospital_id from hospital where username = '$username_hos' and password = '$password_hos';";
//$sql_query = "INSERT into blood availablity(blood_group,quantity) values("A+" , '$APA');";	

$query2 = "SELECT hospital_id FROM hospital WHERE username = '$username_hos'";  
       $r2 = $conn->query($query2); 
     //  echo 'outside3';
      // $rr = $r2["user_id"];
     // echo $r2;
        $num = 1;
       
       if ($r2->num_rows > 0) {
   
    // output data of each row
    while($row = $r2->fetch_assoc()) {
        
        $num = $row["hospital_id"];
        
      //  echo " ".$row["user_id"];
        
    }
    }else {
		echo "Wrong happen";}
 
$sql_query1 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('A+' , '$APA','$num')";	
$r1 = $conn->query($sql_query1);
	 
$sql_query2 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('A-' , '$ANA','$num')";	
$conn->query($sql_query2);
$sql_query3 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('B+' , '$BPA','$num')";	
$conn->query($sql_query3);
$sql_query4 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('B-' , '$BNA','$num')";	
$conn->query($sql_query4);
$sql_query5 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('O+' , '$OPA','$num')";	
$conn->query($sql_query5);
$sql_query6 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('O-' , '$ONA','$num')";	
$conn->query($sql_query6);
$sql_query7 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('AB+' , '$ABPA','$num')";	
$conn->query($sql_query7);
$sql_query8 = "INSERT into blood_availability(blood_group,quantity,hospital_id) values('AB-' , '$ABNA','$num')";
$conn->query($sql_query8);
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Blood Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vhomepage.css">
    <link rel ="shortcut icon" href ="logo1.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        DIV.table
        {
            display:table;
        }
        FORM.tr, DIV.tr
        {
            display:table-row;
        }
        SPAN.td
        {
            display:table-cell;
        }
    </style>

</head>
<body >
<div class="container">
    <div class="header" id="myHeader">
        <div style="display:inline-block;color:red; margin-top:3px" >
            <img src= "homeimg1.jpg" height ="70" width ="150">
        </div>
        <div  style="display:inline-block;color:red; margin-top:3px"><h3>Blood Connect It saves Life</h3>
        </div>

        <nav class="w3-bar w3-border w3-red w3-center w3-margin-top">
            <a href="#" style="width:16.66%" class="w3-bar-item w3-button w3-mobile">HOME</a>
            <a href="#" style="width:16.66%" class="w3-bar-item w3-button w3-mobile">WHO</a>
            <a href="#" style="width:16.66%" class="w3-bar-item w3-button w3-mobile">Info</a>
            <a href="#" style="width:16.66%" class="w3-bar-item w3-button w3-mobile">SignOut</a>
            <a href="#" style="width:16.66%" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        </nav>
    </div>
    <div class="w3-row w3-center w3-display-container w3-row-padding">
        <div class="container w3-center" style="margin-left: 35%; margin-right: 30%">
            <form method="POST" action="">
                <table bgcolor="#f0ffff" cellpadding="10" cellspacing="5"  style="empty-cells: hide;border: 2px #f0ffff solid">
                    <tr>
                        <th></th>
                        <th><b>Availability</b></th>
<!--                        <th><b>Scarcity</b></th>
    -->                </tr>
                    <tr>
                        <th><b>A+</b></th>
                        <td><input type="number" placeholder="units"name="APA" required></td> <!--in placeholder show previous value using php-->
  <!--                      <td><input type="number" placeholder="units" name="APS" required></td>
      -->              </tr>

                    <tr>
                        <th><b>A-</b></th>
                        <td><input type="number" placeholder="units" name="ANA" required></td>
  <!--                      <td><input type="number" placeholder="units" name="ANS" required></td>
      -->              </tr>
                    <tr>
                        <th><b>B+</b></th>
                        <td><input type="number" placeholder="units" name="BPA" required></td>
  <!--                      <td><input type="number" placeholder="units" name="BPS" required></td>
      -->              </tr>
                    <tr>
                        <th><b>B-</b></th>
                        <td><input type="number" placeholder="units" name="BNA" required></td>
   <!--                     <td><input type="number" placeholder="units" name="BNS" required></td>
       -->             </tr>
                    <tr>
                        <th><b>O+</b></th>
                        <td><input type="number" placeholder="units" name="OPA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="OPS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>O-</b></th>
                        <td><input type="number" placeholder="units" name="ONA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ONS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>AB+</b></th>
                        <td><input type="number" placeholder="units" name="ABPA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ABPS" required></td>
        -->            </tr>
                    <tr>
                        <th><b>AB-</b></th>
                        <td><input type="number" placeholder="units" name="ABNA" required></td>
    <!--                    <td><input type="number" placeholder="units" name="ABNS" required></td>
        -->            </tr>
                </table>
                <input style="float: right" type="submit" name = "submit" value="Submit">
            </form>
        </div>
    </div>


    <div class="container w3-white w3-row w3-center">
        <div id="footer">
            <div id="footer_content">
                <div class="footer_item">
                    <p class="footer_heading">
                        Donate Blood				<!-- Footer Item We can add any link here-->
                    </p>
                    <ul class="footer_list">
                        <li>
                            <a href="">Blood Donation</a>		<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Blood Donation FAQs</a>	<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Types of Blood Donations</a>		<!-- Have to add any link here-->
                        </li>
           ss         </ul>
                    <p class="footer_heading">
                        About Blood
                    </p>
                    <ul class="footer_list">
                        <li>
                            <a href="">What is Blood?</a>			<!--Have to add the wipedia link -->
                        </li>
                        <li>
                            <a href="">Blood is Always Needed</a>	<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">How Blood Saves Life</a>		<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Facts & Figures</a>			<!-- Have to add any link here-->
                        </li>
                    </ul>
                </div>
                <div class="footer_item">
                    <p class="footer_heading">
                        Get Involved
                    </p>
                    <ul class="footer_list">
                        <li>
                            <a href="">Plan a Blood Drive</a>		<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Blood Donation Programs</a>	<!-- Have to add any link here-->
                        </li>
                        <li>
                            <br/>
                        </li>
                    </ul>
                    <p class="footer_heading">
                        About Us
                    </p>
                    <ul class="footer_list">
                        <li>
                            <a href="">What We Do</a>				<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Our Programmes</a>			<!-- Have to add any link here-->
                        </li>
                    </ul>
                </div>
                <div class="footer_item">
                    <p class="footer_heading">
                        Tools & Resources
                    </p>
                    <ul class="footer_list">
                        <li>
                            <a href="">Publications</a>					<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Blog</a>							<!-- Have to add any link here-->
                        </li>
                        <li>
                            <a href="">Contact Us</a>					<!-- Have to add any link here-->
                        </li>
                    </ul>
                </div>
                <div class="footer_item">
                    <p class="footer_heading1">   </p>
                </div>
                <div class="footer_item_info">
                    <h3>Online blood bank</h3>
                    <ul class="footer_list">
                        <li>Developed and maintained by:</li>
                        <li>Vivek Verma</li>
                        <li>Prasad Kshirsagar</li>
                        <li>Komal Chugh</li>
                        <li>Ram Krishna</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <div id="footer_bottom">
                <div class="wrapper">
                    <p>This site has been made under CSP203 Project</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>


</body>
</html>


