
<?php
  include "dbconnector.php";
    session_start();    

    if (isset($_POST['current'])) {
     $query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){ 
         $curr= $row['Password'];
   } 
    $cur = $_POST['currentt'];
    if ($cur === $curr) {
    echo " <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('myBtn');
        var span = document.getElementsByClassName('close')[0];
        btn.onclick = function() {
          modal.style.display = 'block';
        }
        span.onclick = function() {
          modal.style.display = 'none';
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        }
        </script>;";
    
     
    }else{
    echo "<script>
         alert('Incorrect Password');
         window.location.replace('setting.php');
    </script>"; 
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
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        <?php
                                              include('dbconnector.php');
                                              $query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)){ 
                                                    $ids= $_SESSION['id'];
                                                    $uname = $row['Username'];
                                                    $fname = $row['FirstName'];
                                                    $mname = $row['MiddleName'];
                                                    $lname = $row['LastName'];
                                                    $gen = $row['Gender'];
                                                    $number = $row['ContactNumber'];
                                                    $bdate = $row['Birthdate'];
                                                    $add = $row['Address'];
                                                    $email = $row['Email'];
                                        ?> 

                                            <form method="Post" action="settingupdate.php" enctype="multipart/form-data">
                                                <?php if($row['Picture'] != ""): ?>
                                            <img src="images/<?php echo $row['Picture']; ?>" width="200px" height="200px">
                                                <?php else: ?>
                                            <img src="images/batstate_user01.png" width="200px" height="200px">
                                                <?php endif; ?>
                                                <p></p> 
                                                <input type="file" class="btn" id="picture" name="picture">      
                                                <?php
                                                }
                                            ?>
                                             <button type="submit" name="submit" class="btn btn-primary" style="width: 100px; align-self: center; margin-bottom: 10px;">Save</button>  
                                            </form>
                                    </div>
                                              
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form method="post" action="settingupdate1.php">
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" name="fname" value="<?php echo $fname;?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Middle name</label>
                                                    <input class="form-control" id="inputLastName" type="text" name="mname" value="<?php echo($mname) ?>">
                                                </div>
                                                <div class="col-md-13">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text"  name="lname" value="<?php echo($lname) ?>">
                                                </div>
                                            </div>      
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Gender</label>
                                                    <input class="form-control" id="inputLocation" type="text"  name="gen" value="<?php echo($gen) ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Location</label>
                                                    <input class="form-control" id="inputLocation" type="text"  name="add" value="<?php echo($add) ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhone" type="tel"  name="number" value="<?php echo($number) ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                    <input class="form-control" id="inputBirthday" type="date" name="birthday"  name="bdate" value="<?php echo($bdate) ?>">   
                                                </div>
                                            </div>
                                            <button type="submit" name="update" class="btn btn-primary" style="width: 100px; align-self: center; margin-bottom: 10px;">Save</button>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="row" style="margin-top: -6%;">
                        <div class="col-xl-4">
                            <div class="card card-outline-secondary">
                                <div class="card-header">Change Password</div>
                                <div class="card-body">
                                    <form class="form" method="post" action="setting.php">
                                        <div class="form-group">
                                            <label for="inputPasswordOld">Current Password</label>
                                            <input type="password" class="form-control" id="inputPasswordOld" name="currentt" required="">
                                        </div><br>
                                        <div class="form-group">
                                             <button type="submit" name="current" id="myBtn" class="btn btn-primary" style="width: 100px; align-self: center; margin-bottom: 10px;">Save</button> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                            <form method="post" action="settingupdate2.php" id="myform" enctype="multipart/form-data">
                                <div class="row" style="justify-content: center; margin-top: 10%;">
                                    <div class="col-xl-5">
                                            <!-- Account details card-->
                                        <div class="card mb-4" style="border-style: solid;border-width: 3px; border-color: #690001;">
                                           <div class="card-header"><a href="setting.php" type="submit"  style="position: absolute;right: 2%; color:#000000">X</a><h3>Change Password</h3></div>
                                            <div class="card-body">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-mb-3">
                                                        <label class="small mb-1" for="NewPassword">New Password</label>
                                                        <input class="form-control" id="npass" type="text"  name="npass">
                                                    </div>
                                                    <div class="col-mb-3">
                                                        <label class="small mb-1" for="RePassword">Re-Type New Password</label>
                                                        <input class="form-control" id="rpass" type="text"  name="rpass">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-block" name="update" type="submit"> Save Changes</button>
                                                 
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
    </body>
</html>