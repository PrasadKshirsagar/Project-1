<?php 

include ("dbh.inc.php");

/*echo "string";
echo "message : ".$_POST['message'];
*/

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

//$subject        = mysqli_real_escape_string($connection,$_POST['subject']);
$message        = mysqli_real_escape_string($connection,$_POST['message']);

$sql = "INSERT INTO posts (description) VALUES ('".$message."')"; 
$executed=run_query($connection,$sql);

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("latest_feeds.php")

 ?>