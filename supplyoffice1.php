<?php
 include "dbconnector.php";
  session_start();


    
     if(isset($_POST['submit'])){
    $filename = $_FILES["file"]["name"];
    $id = $_POST['personID'];

         if(move_uploaded_file($_FILES["file"]["tmp_name"],'supplyofficefiles/'.$filename)){  
            $query = "INSERT INTO `files` (fileName,personID,dateUpload) 
        VALUES ('$filename','$id',NOW())";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: supplyoffice.php");
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
                        <img src="assets\img\batstate_user01.png" alt="..." height="30">
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
                                </nav>                            </div>
                           
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">SUPPLY OFFICE</h1>
                        <div class="row">
                            <div class="col-lg-14">
                                <div class="card mb-4">
                                    <div class="card-header" style="height: 55px;">
                                        
                                        <a href="supplyoffice.php" class="btn btn-primary btn-block" type="submit"  style="position: absolute; right: 2%;">Back</a>
                                    </div>
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>

                  
                  
                            <div class="col-lg-13">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Available Files
                                    </div>
                                    <div class="card-body">
                                        <table  border="2px solid" class="table table-bordered" style="border-color: #690001;" id="datatablesSimple">
                                <thead style="background-color:#690001; color: white;">
                                        <th>File Name</th>
                                        <th>Date Upload</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style=" border-bottom: 1pt solid #fff; border-top: 1pt solid #fff; pointer-events: none">
                                        <?php
                                if (isset($_GET['personID'])){

                                                
                    $query=mysqli_query($dbconn,"SELECT * FROM files INNER JOIN headadmin ON files.personID = headadmin.HeadAdminID where headadmin.HeadAdminID = '{$_GET['personID']}'")or die(mysqli_error());
                                      $rowcount = mysqli_num_rows($query);
                                    if ($rowcount > 0) {
                                    while($row=$query->fetch_assoc()) {

                                    extract($row);
                                ?>
                                            <tr>

                                            <td><?php echo $fileName; ?></td>
                                            <td><?php echo $dateUpload; ?></td>
                                            <td>
                                                <a href="download.php?downloadfile=<?php echo $fileName; ?>" class="btn btn-primary btn-block" type="submit"  style="align-self: center;"> Download</a>
                                            </td>
                                           
                                            </tr>
                                      
                                     <?php } } ?>
                                     <?php } else { ?>

                                    <div class = "panel-heading">
                                        <h5>Nothing Selected</h5>
                                    </div>
                                     <?php }
                                     ?> 
                                    </tr>
                                </tbody>
                            </table>
                                    </div>
                                    <div class="card-footer small text-muted">sample text</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
       <script src="js/jquery-1.js"></script>
        <script src = "plugins/js/admin.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
