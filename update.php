<?php
include('dbconnector.php');
session_start();

if(isset($_POST["id"]))
{
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $id = $_POST['id'];
  
    
    
     $query=mysqli_query($dbconn,"UPDATE events SET start_event='$start', end_event='$end' WHERE title='$title' AND id = '".$_SESSION['id']."' ")or die(mysqli_error());
        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: form.php");
        }
}
?>