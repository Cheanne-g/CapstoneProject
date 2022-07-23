<?php
session_start();
include('dbconnector.php');
if(isset($_POST["title"]))
{
   $query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){ 
 $name= $row['FirstName'];
   }   
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

     $query = "INSERT INTO `events` (id,title, start_event, end_event) 
        VALUES ('".$_SESSION['id']."','Head Admin $name: $title','$start','$end')";  
        $result = mysqli_query($dbconn,$query);
        if($result){
        //redirecting to the display page.
        header("Location: evaluation.php");
        }
    }

?>