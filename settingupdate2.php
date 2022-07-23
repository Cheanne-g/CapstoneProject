<?php
     include "dbconnector.php";
    session_start();

                              
    if(isset($_POST['update'])){
    
    $npassword = $_POST['npass']; 
    $rpassword = $_POST['rpass']; 
   
        if ($npassword == $rpassword) {
            $query=mysqli_query($dbconn,
            "UPDATE `headadmin` SET Password='$rpassword' WHERE HeadAdminID = '".$_SESSION['id']."'")or die(mysqli_error());
        
            header("Location: setting.php");
        }else{
?>
         <script>
         alert('Input Password didn't match!);
         window.location.replace('setting.php');
         </script>; 
<?php
        }
}

?>