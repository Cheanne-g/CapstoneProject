<?php
 include "dbconnector.php";
  session_start();


    
     if(isset($_POST['submit'])){
    $filename = $_FILES["file"]["name"];
    $id = $_POST['personID'];
    $FileType = pathinfo($filename,PATHINFO_EXTENSION);
         if(move_uploaded_file($_FILES["file"]["tmp_name"],'supplyofficefiles/'.$filename)){  
            $query = "INSERT INTO `files` (fileName,personID,fileType,dateUpload) 
        VALUES ('$filename','$id','$FileType' ,NOW())";  

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
                                        Upaload File
                                        <button class="btn btn-primary btn-block" type="submit" id="myBtn" style="position: absolute; right: 2%;"> Upload File</button>
                                    </div>
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-14">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Available Files
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid px-1">
                                            <div class="row gx-1 gx-lg-1 row-cols-1 row-cols-md-1 row-cols-xl-6">
                                                <?php                                    
                                                $query=mysqli_query($dbconn,"SELECT * FROM files INNER JOIN headadmin ON files.personID = headadmin.HeadAdminID group by files.personID")or die(mysqli_error());
                                                    $rowcount = mysqli_num_rows($query);
                                                    if ($rowcount > 0) {
                                                        while($row=$query->fetch_assoc()) {

                                                    extract($row);
                                                ?>
                                                <div class="files">
                                                    <form method="POST" action="" >
                                                        <a href="supplyoffice1.php?personID=<?php echo $personID; ?>"><img src="images/folder1.png" style="width: 100px; height: 80px;"><br>
                                                        <p><?php echo $FirstName . " " . $LastName; ?></p></a>
                                                    </form>
                                                </div>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                           
                     <div id="myModal" class="modal" class="Modal is-hidden is-visuallyHidden">
                        <!-- Modal content -->
                            <form method="post" action="supplyoffice.php" id="myform" enctype="multipart/form-data">
                                <div class="row" style="justify-content: center; margin-top: 10%;">
                                    <div class="col-xl-5">
                                            <!-- Account details card-->
                                        <div class="card mb-4" style="border-style: solid;border-width: 3px; border-color: #690001;">
                                            <div class="card-header"><div class="close" style="float: right;">&times;</div><h3>Files</h3></div>
                                            <div class="card-body">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-mb-3">
                                                        <label class="small mb-1" for="inputFirstName">Uploader Name</label>
                                                         <select id="inputState" name= "personID" class="form-control">
                                                    <?php  
                                                       
                                                            $query=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
                                                                while($row=mysqli_fetch_array($query)){ 
                                                                $id = $_SESSION['id'];
                                                                $firstname = $row['FirstName'];
                                                                $lastname = $row['LastName'];

                                                                ?>
                                                            <option value="<?php echo $id ?>">Head Admin: <?php echo $firstname." ".$lastname; ?></option>
                                                          <?php }  ?>
                                                </select>
                                                    </div>
                                                    <div class="col-mb-3">
                                                        <label class="small mb-1" for="inputFirstName">File</label>
                                                        <input class="form-control" id="file[]" type="file" size="50" name="file" >
                                                    </div>
                                                </div>
                                                <!-- Save changes button-->
                                                <button class="btn btn-primary btn-block" name="submit" type="submit"> Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </main>
                <img src="images/chaticon.png" style="width: 50px; height: 50px; position: absolute; right: 2%; bottom: 10%;">
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
