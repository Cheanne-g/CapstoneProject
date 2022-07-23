<?php
// including the database connection file
  include "dbconnector.php";
if(isset($_POST['submit'])){

    $name=$_POST['Pname'];
    $sno=$_POST['Snumber'];
    
    $ad=$_POST['Adate'];
    $ac = $_POST['Acost'];
    $off=$_POST['office'];
 
    
 
     // checking empty fields
    if(empty($name) || empty($sno)  || empty($ad) || empty($ac)|| empty($off)){    
            
        if(empty($name)) {
            echo "<font color='red'>Property Name field is empty!</font><br/>";
        }
        
        if(empty($sno)) {
            echo "<font color='red'>Serial Number field is empty!</font><br/>";
        }

       

        if(empty($ad)) {
            echo "<font color='red'>Acquisition Date field is empty!</font><br/>";
        }   
         if(empty($ac)) {
            echo "<font color='red'>Acquisition Cost field is empty!</font><br/>";
        }  
         if(empty($off)) {
            echo "<font color='red'>Office field is empty!</font><br/>";
        }   
        

        

    } else {    
      
        $query = "INSERT INTO `equipment` (PropertyName, SerialNumber, AcquisitionDate,AcquisitionCost, Office) 
        VALUES ('$name','$sno','$ad','$ac','$off')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: equipment.php");
        }
        
    }
}

?>