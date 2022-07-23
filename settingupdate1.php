<?php
     include "dbconnector.php";
    session_start();

                              
    if(isset($_POST['update'])){
    
    $fname = $_POST['fname']; 
    $mname = $_POST['mname']; 
    $lname = $_POST['lname']; 
    $gen = $_POST['gen']; 
    $add = $_POST['add'];
    $num = $_POST['number'];
    $bdate = date('yyyy/mm/dd', strtotime($_POST['bdate']));
           
        $query=mysqli_query($dbconn,
            "UPDATE `headadmin` SET FirstName='$fname', LastName='$lname', MiddleName='$mname', Gender='$gen', Birthdate = '$bdate',Address = '$add', ContactNumber = '$num' WHERE HeadAdminID = '".$_SESSION['id']."'")or die(mysqli_error());
        
            header("Location: setting.php");
             
     
}

?>