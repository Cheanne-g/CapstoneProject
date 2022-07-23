<?php
     include "dbconnector.php";
    session_start();

                              
    if(isset($_POST['submit'])){
    
    $filename = $_FILES["picture"]["name"];
         if(move_uploaded_file($_FILES["picture"]["tmp_name"],'images/'.$filename)){  
            $query=mysqli_query($dbconn,
            "UPDATE `headadmin` SET Picture='$filename' WHERE HeadAdminID = '".$_SESSION['id']."'")or die(mysqli_error());
        
            header("Location: setting.php");
             
    }  
}

?>