<?php

include_once  "dbh.inc.php";
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password']))
{
    header("location: login_next.php");
    exit;
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
    <!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
        </script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>

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
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">HOME</a>
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">WHO</a>
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">Info</a>
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">SignOut</a>
            <a href="vhospital_form.php" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">Update Data</a>
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">Check Appointments</a>
            <a href="vhospitalFixed.php" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">Show Fixed Appointments</a>
            <a href="#" style="width:12.5%" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        </nav>
    </div>

    <?php
    $user = $_SESSION['username'];
    $query1 = "SELECT hospital_id,hospital_name FROM hospital WHERE username = '$user'";
    $r2 = $conn->query($query1);
    $num =0;
    if ($r2->num_rows > 0) {
        while($row = $r2->fetch_assoc()) {
            $num = $row["hospital_id"];
            $name=$row["hospital_name"];
        }
        // echo $num;


        $query2 = "SELECT user_id,starting_date,ending_date,final_date,starting_time,ending_time,final_time from appointment where hospital_id = '$num' and Hospital_pending = 1";
        $result = $conn->query($query2) or die($conn->error);

 echo  '<div class="w3-row w3-center w3-display-container w3-row-padding">';

        echo "<h1 style = \"w3-center\"  >$name </br></h1> ";

            echo "<h2>Check the appointments</h2>";
           echo  '<div class="container w3-center " style="margin-left: auto; margin-right: auto ">';
        if ($result ->num_rows > 0)
        {   echo  '<div class="container w3-center" style="margin-left: auto; margin-right: auto ">';
            echo "<table id = \"AppTable\" bgcolor=\"#f0ffff\" cellpadding=\"15\" cellspacing=\"20\"  style=\"empty-cells: hide;border: 2px #f0ffff solid\">";
            echo    "<tr>";
            echo        "<td>Donor's Name</td>";
            echo        "<td>Starting Date</td>";
            echo        "<td>Ending Date</td>";
            echo        "<td>Final Date</td>";
            echo        "<td>Starting Time</td>";
            echo        "<td>Ending Time</td>";
            echo        "<td>Final Time</td>";
            echo        "<td>Status</td>";
            echo    "</tr>"    ;
            while($row = $result->fetch_assoc())
            {
                echo ' <form method="POST" action="">';
                echo '<tr>';
                $user_id = $row["user_id"];
                $query3 = "SELECT username from user where user_id = '$user_id'";
                $result3 = $conn->query($query3) or die($conn->error);
                $username =  $result3->fetch_assoc();
                echo    '<td>'.$username["username"].'</td>';
                echo    '<td>'.$row["starting_date"].'</td>';
                echo    '<td>'.$row["ending_date"].'</td>';
                echo    '<td><input type="DATE" placeholder="fix date" name="FD" required></td>';
                echo    '<td>'.$row["starting_time"].'</td>';
                echo    '<td>'.$row["ending_time"].'</td>';
                echo    '<td><input type="TIME" placeholder="fix time" name="FT" required></td>';
                echo    "<td><input onclick=\"foo(FD,FT,'".$user_id."','".$num."')\" style=\"float: right;color:red\" type=\"submit\" name = \"submit\" value=\"Fix\" required></td>";
                echo '</form>';
                echo '</tr>';
            }
        echo "</div>";
           
        }
        else {echo "<div><h3></br>NO APPOINTMENTS</h3></div>";}
        echo "</table>";
        echo "</div>";
        echo "</div>";
    }

    ?>


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
                    </ul>
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

<script type="text/javascript">
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        }
        else {
            header.classList.remove("sticky");
        }
    }
    function foo(FD,FT,FF,HID){
        $.post('vrun_query.php',{final_date:FD.value,final_time:FT.value,user_id:FF,hospital_id:HID},function(data)
            {
                //    alert(data);
                //    $('#result').html(data);
            }
        );
        /*  alert(FD.value);
            alert(FF);
            alert(HID)
            alert(FT.value);
            $.post('vrun_query.php',{})
            alert("It is working");
          */
    }
</script>

</body>
</html>

