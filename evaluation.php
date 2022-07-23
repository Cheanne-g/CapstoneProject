<?php
include('dbconnector.php');
$query=mysqli_query($dbconn,
 "SELECT * FROM events ORDER BY id")or die(mysqli_error());

  $query3=mysqli_query($dbconn,
 "SELECT * FROM office")or die(mysqli_error());
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
        <script src="js/jquery.min.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
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
                                      session_start();
                                     $query1=mysqli_query($dbconn,"SELECT * FROM headadmin WHERE HeadAdminID ='".$_SESSION['id']."'")or die(mysqli_error());
                                         while($row=mysqli_fetch_array($query1)){ 
                                            

                                             
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
                    <div class="container-fluid px-4">
                    <script>
                        $(document).ready(function() {
                         var calendar = $('#calendar').fullCalendar({
                          editable:true,
                          header:{
                           left:'prev,next,today',
                           center:'title',
                           right:'month,agendaWeek,agendaDay'
                          },
                          events: [<?php while ($row = $query ->fetch_object()) { ?>{ id : '<?php echo $row->dateID; ?>', title : '<?php echo $row->title; ?>', start : '<?php echo $row->start_event; ?>', end : '<?php echo $row->end_event; ?>', }, <?php } ?>],

                          selectable:true,
                          selectHelper:true,
                          select: function(start, end, allDay)
                          {
                          var title = prompt("Enter Event Title");

                          if(title)
                          {

                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                            url:"insert.php",
                            type:"POST",
                            data:{title:title,start:start,end:end},
                            success:function(data)
                            {
                              calendar.fullCalendar('refetchEvents');
                              alert("Added Successfully");
                              window.location.replace("evaluation.php");
                            }
                            })
                          }
                          },
                     
                          editable:true,
                          eventResize:function(event)
                          {
                          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                          var title = event.title;
                          var id = event.id;
                          $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function(){
                            calendar.fullCalendar('refetchEvents');
                            alert('Event Update');
                            }
                          })
                          },
                     
                          eventDrop:function(event)
                          {
                          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                          var title = event.title;
                          var id = event.id;
                          $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function()
                            {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                            }
                          });
                          },
                     
                          eventClick:function(event)
                          {
                         
                          
                            var id = event.id;
                            $.ajax({
                            url:"delete.php",
                            type:"POST",
                            data:{id:id},
                            success:function()
                            {
                              window.location.replace("form.php");
                            }
                            })
                          
                          },
                     
                        });
                      });
                    </script>
                </div>
                    <br />
                    <br />
                    <div class="container-fluid px-4">
                      <div class="container">
                        <div id="calendar"></div>
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
    </body>
</html>
