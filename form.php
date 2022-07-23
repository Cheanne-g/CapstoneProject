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
         $query = "INSERT INTO `headadmin` (FirstName, LastName, MiddleName,Sex, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture, HeadAminID) 
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
            
         $query = "INSERT INTO `admin` (FirstName, LastName, MiddleName,Sex, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture) 
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
            
        $query = "INSERT INTO `headadmin` (FirstName, LastName, MiddleName,Sex, Birthdate, Address, ContactNumber, Position, Email, Username, Password, Picture) 
        VALUES ('$f','$l','$m','$g','$bd','$a','$pn','$p','$e','$u','$pa','$filename')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
        //redirecting to the display page.
        header("Location: admin.php");
        }  
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
                                </nav>                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php
                        $query=mysqli_query($dbconn,"SELECT * FROM equipment")or die(mysqli_error());
                           while($row=mysqli_fetch_array($query)){ 
                            $equipment= $row['PropertyName'];
                                 }
                    ?>

                    <div class="container-fluid px-4">
                        <form method="post" action="admin.php" id="myform" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-13">
                                    <div class="card mb-4">
                                        <div class="card-header">Preventive Maintinance Form</div>
                                        <div class="card-body">
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="ReferenceNumber">Reference No.</label>
                                                    <input class="form-control" id="ReferenceNumber" type="text" placeholder="Enter the Reference No." name="rnumber">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="Effectivity">Effectivity Date</label>
                                                    <input class="form-control" id="Effectivity" type="date" name="birthday" placeholder="Enter your Effectivity Date" name="edate">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="ReviseNumber">Revise No.</label>
                                                    <input class="form-control" id="ReviseNumber" type="text" placeholder="Enter the Revise No." name="renumber">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="office">Office/College</label>
                                                        <select id="office" name= "office" class="form-control">
                                                            <option value = " " ></option>
                                                                <?php  
                                                                     $query1=mysqli_query($dbconn,"SELECT * FROM Office")or die(mysqli_error());
                                                                        while($row1=mysqli_fetch_array($query1)){ 
                                                                       $id= $row1['OfficeID'];
                                                                    echo "<option value=$row1[OfficeName]>$row1[OfficeName]</option>"; 
                                                                   }
                                                                ?>
                                                      </select>
                                                </div>
                                                    <!-- Form Group (birthday)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1 " for="fiscalyear">Fiscal Year</label>
                                                    <select id="fiscalyear" name= "gen" class="form-control" >
                                                        <option value = " " ></option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1 " for="typeequipment">Type of Equipment</label>
                                                    <select id="typeequipment" name= "gen" class="form-control " >
                                                        <option value = " " ></option>
                                                        <option value="ICT Equipment">ICT Equipment</option>
                                                        <option value="Vehicle">Vehicle</option>
                                                        <option value="Building">Building</option>
                                                        <option value="ACU">ACU</option>
                                                        <option value="EMU">EMU</option>
                                                        <option value="Laboratory Equipment">Laboratory Equipment</option>
                                                        <option value="Medical/Dental Equipment">Medical/Dental Equipment</option>
                                                        <option value="Others, Specify">Others, Specify</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1 " for="frequency">Frequency</label>
                                                    <select id="frequency" name= "gen" class="form-control " >
                                                        <option value=" "></option>
                                                        <option value="Semi-Annually">Semi-Annually</option>
                                                        <option value="Annually">Annually</option>
                                                        <option value="Monthly">Monthly</option>
                                                        <option value="Quarterly">Quarterly</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-4">
                                                        <label class="small mb-1" for="activities">Activities</label>
                                                        <input class="form-control" id="activities" type="text" placeholder="Enter Activities" name="fname" >
                                                    </div>
                                                     <div class="col-md-4">
                                                        <label class="small mb-1" for="equipmentno">Equipment No./Item Location</label>
                                                        <input class="form-control" id="equipmentno" type="text" placeholder="Enter Equipment No./Item Location" name="mname" >
                                                    </div>
                                                    <!-- Form Group (last name)-->
                                                    <div class="col-md-4">
                                                        <label class="small mb-1" for="remarks">Remarks</label>
                                                        <input class="form-control" id="remarks" type="text" placeholder="Enter Remarks" name="lname">
                                                    </div>
                                                </div>
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="conducted">Conducted By:</label>
                                                        <input class="form-control" id="conducted" type="text" placeholder="Enter Name" name="add">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="cdate">Date:</label>
                                                        <input class="form-control" id="cdate" type="date" name="birthday" placeholder="Enter Date" name="bdate">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="verified">Verified By:</label>
                                                        <input class="form-control" id="verified" type="text" placeholder="Enter Name" name="add">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="vdate">Date:</label>
                                                        <input class="form-control" id="vdate" type="date" name="birthday" placeholder="Enter Date" name="vdate">
                                                    </div>
                                                </div>
                                            <hr>
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-4">
                                                        <label class="small mb-1" for="date">Date</label>
                                                        <input class="form-control" id="date" type="date" name="birthday" placeholder="Enter Date" name="date">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="small mb-1" for="correctiveaction">Corrective Action</label>
                                                        <input class="form-control" id="correctiveaction" type="text" placeholder="Enter the Corrective Action" name="caction" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="small mb-1" for="officeresponsible">Office Responsible</label>
                                                        <input class="form-control" id="officeresponsible" type="text" placeholder="Enter Office Responsible" name="officer">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="dateaccomplished">Date Accomplished</label>
                                                        <input class="form-control" id="dateaccomplished" type="date" name="birthday" placeholder="Enter Date Accomplished" name="dates">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="remarks">Remarks</label>
                                                        <input class="form-control" id="remarks" type="text" placeholder="Enter Remarks" name="rem">
                                                    </div>
                                                </div>
                                                
                                            <button class="btn btn-primary" type="button"> Save </button>
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
