<?php 
@ob_start();
session_start();
// include ("latest_feeds.html");
include ("dbh.inc.php");

function run_query($connection,$query){
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if($strSQL){
        $exectued=true;
    }else{
        echo "Error".$connection->error;
    }
          
    return $executed;
}



include ("feedback1.html");

// echo "string";

$sql = "SELECT post_id, description FROM posts ORDER BY post_id DESC";
$result = $connection->query($sql);

// echo $sql ;

// echo "string";

if ($result->num_rows > 0) 
{


    $count = 0;
    while($row = $result->fetch_assoc()) 
    {
        

        $count = $count + 1;

        //$_SESSION['subject'] = $row['subject'];
        //$_SESSION['description'] = $row['description'];


        $div_id = $row['post_id'];
        //echo $div_id;

            echo " 
                        
                         <h4>Feedback</h4>
                        <p>"  . $row['description']. "</p>
                        <hr>
                                
            ";



    } 
}
else 
{
    echo "0 results";
}


include ("feedback2.html");


function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

 ?>
