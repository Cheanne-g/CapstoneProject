<?php
// including the database connection file
  include "dbconnector.php";
  session_start();
  
                                      
$query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){ 
 $ids= $_SESSION['id'];
   }                                       

                                             
                                      
if(isset($_POST['submit'])){
    $f = $_POST['fname'];
    $m = $_POST['mname'];
    $l = $_POST['lname'];
    $g = $_POST['gen'];
    $pn = $_POST['pnumber'];
    $bd = $_POST['bdate'];
    $a = $_POST['add'];
    $p = $_POST['pos'];
    $e = $_POST['email'];
    $u = $_POST['uname'];
    $pa = $_POST['password'];
    $filename = $_FILES["picture"]["name"];
   
     // checking empty fields

    if ($p == "User") {
         if(move_uploaded_file($_FILES["picture"]["tmp_name"],'images/'.$filename)){    
         $query = "INSERT INTO `headadmin` (FirstName, LastName, MiddleName,Gender, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture, HeadAminID) 
        VALUES ('$f','$l','$m','$g','$bd','$a','$pn','$p','$e','$u','$pa','$filename', '$ids'";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: admin.php");
        } 

    } else {    
      
          echo "<h3>  Failed </h3>";
        
    }
    }elseif ($p == "Admin") {
       if(move_uploaded_file($_FILES["picture"]["tmp_name"],'images/'.$filename)){    
            
         $query = "INSERT INTO `admin` (FirstName, LastName, MiddleName,Gender, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture) 
        VALUES ('$f','$l','$m','$g','$bd','$a','$pn','$p','$e','$u','$pa','$filename')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: admin.php");
        } 
        
    } else {    
      
          echo "<h3>  Failed </h3>";
        
    }
    }elseif($p = "HeadAdmin"){
        if(move_uploaded_file($_FILES["picture"]["tmp_name"],'images/'.$filename)){    
        
        $query=mysqli_query($dbconn,
            "INSERT INTO `headadmin` (FirstName, LastName, MiddleName,Gender, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture) 
        VALUES ('$f','$l','$m','$g','$bd','$a','$pn','$p','$e','$u','$pa','$filename')")or die(mysqli_error());
         header("Location: admin.php");
    } else {    
      
          echo "<h3>  Failed </h3>";
        
    }
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <img src="assets\img\inventory monitoring system maroon.png" alt="..." height="30" style="margin-left: 50px;">
            <a class="navbar-brand ps-3" href="index.html" style="margin-left: 80px;"></a>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
             <?php
                                      include('dbconnector.php');
                                      
                                     $query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
                                         while($row=mysqli_fetch_array($query)){ 
                                            

                                             
                                      ?> 
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <img class="admin-profile" src="images/<?php echo $row['Picture']; ?>" width="40px" height="40px">
                    </a>
                   <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li style="text-align: center;"> 
                         
                         <img class="admin-profile" src="images/<?php echo $row['Picture']; }?>" width="60px" height="60px">
                  
                                </li>
                        <li style="text-align: center; margin-top: 10px"><a class="dropdown-item" href="setting.php"> My Account </a></li>
                        <li style="text-align: center;"><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li style="text-align: center;"><hr class="dropdown-divider" /></li>
                        <li style="text-align: center;"><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
         </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                       <div class="nav">
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="announcement.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bullhorn"></i></div>
                                Announcement
                            </a>
                             <a class="nav-link" href="equipment.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                                Equipment
                            </a>
                            <a class="nav-link" href="evaluation.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Monitoing
                            </a>
                            <a class="nav-link" href="office.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-building-user"></i></div>
                                Office
                            </a>
                            <a class="nav-link" href="supplyoffice.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-laptop"></i></div>
                                Supply Office
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Admin
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                                History
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingthree" data-bs-parent="#sidenavAccordion2">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="transaction.php">Transaction</a>
                                    <a class="nav-link" href="user logs.php">User Logs</a>
                                    <a class="nav-link" href="tracking.php">Tracking</a>
                                </nav>                            
                            </div> 
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <form method="post" action="admin.php" id="myform" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header">Profile Picture</div>
                                        <div class="card-body text-center">
                                            <img class="img-account-profile rounded-circle mb-2" src="images/batstate_user.png" alt="">
                                            <input type="file" class="btn" id="picture" name="picture">
                                            <button class="btn btn-primary btn-block" type="submit"> Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="card mb-4">
                                        <div class="card-header">Admin Information</div>
                                        <div class="card-body">
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="fname" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">Middle name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your middle name" name="mname" >
                                                </div>
                                                <div class="col-mb-3">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lname">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="pnumber">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1 " for="inputUsername">Gender</label>
                                                        <select id="inputState" name= "gen" class="form-control " >
                                                            <option value = " " ></option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                    <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday" name="bdate">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Address</label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" name="add">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group col-mb-3">
                                                    <label class="small mb-1 " for="inputUsername">Position</label>
                                                        <select id="inputState" name= "pos" class="form-control">
                                                            <option value = "" ></option>
                                                            <option value = "User" >User</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="HeadAdmin">Head Admin</option>
                                                        </select>
                                                </div>
                                            </div>  
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username"  name="uname">
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your password" name="password">
                                            </div>
                                            <button class="btn btn-primary btn-block" name="submit" type="submit"> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                        <style type="text/css">
                        body{margin-top:20px;
                        background-color:#f2f6fc;
                        color:#69707a;
                        }
                        .img-account-profile {
                            height: 10rem;
                        }
                        .rounded-circle {
                            border-radius: 50% !important;
                        }
                        .card {
                            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
                        }
                        .card .card-header {
                            font-weight: 500;
                        }
                        .card-header:first-child {
                            border-radius: 0.35rem 0.35rem 0 0;
                        }
                        .card-header {
                            padding: 1rem 1.35rem;
                            margin-bottom: 0;
                            background-color: rgba(33, 40, 50, 0.03);
                            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
                        }
                        .form-control, .dataTable-input {
                            display: block;
                            width: 100%;
                            padding: 0.875rem 1.125rem;
                            font-size: 0.875rem;
                            font-weight: 400;
                            line-height: 1;
                            color: #69707a;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #c5ccd6;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            appearance: none;
                            border-radius: 0.35rem;
                            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                        }

                        .nav-borders .nav-link.active {
                            color: #0061f2;
                            border-bottom-color: #0061f2;
                        }
                        .nav-borders .nav-link {
                            color: #69707a;
                            border-bottom-width: 0.125rem;
                            border-bottom-style: solid;
                            border-bottom-color: transparent;
                            padding-top: 0.5rem;
                            padding-bottom: 0.5rem;
                            padding-left: 0;
                            padding-right: 0;
                            margin-left: 1rem;
                            margin-right: 1rem;
                        }
                        </style>

                        <script type="text/javascript">

                        </script>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    </body>
</html>
