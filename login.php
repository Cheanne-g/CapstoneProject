<?php
    session_start();
    include('dbconnector.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $user_unsafe=$_POST['email'];
        $pass_unsafe=$_POST['password'];

        $email = mysqli_real_escape_string($dbconn,$user_unsafe);
        $pass1 = mysqli_real_escape_string($dbconn,$pass_unsafe);

       


        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");            


        $query=mysqli_query($dbconn,"SELECT * FROM `headadmin` WHERE Email='$email' AND Password='$pass1'");
        $res=mysqli_fetch_array($query);
        $id=$res['HeadAdminID'];

        if (mysqli_num_rows($query)<1){
            $_SESSION['msg']="Login Failed, Admin not found!";
            header('Location:index.php');
        }

        else{
            $res=mysqli_fetch_array($query);
            $_SESSION['id']=$id;
            header('location:dashboard.php');
            }
        }
?>
