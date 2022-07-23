<?php
include('dbconnector.php');
if(isset($_POST["id"]))
{
    $id = $_POST['id'];
   
     $query = "DELETE FROM events WHERE dateID = `$id`";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: form.php");
        }
}   
?>