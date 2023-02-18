<!DOCTYPE html>
<html lang="en">
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else
$userid=$_SESSION['user_id'];
$username=$_SESSION['valid_user'];

//club
$result31 = "SELECT COUNT(userid)as count FROM `user` WHERE role='2'";
$test31 = mysqli_query($con,$result31);
$test_result_count1 = mysqli_fetch_assoc($test31)['count'];

//volunteer
$result3 = "SELECT COUNT(userid)as count FROM `user` WHERE role='3'";
$test3 = mysqli_query($con,$result3);
$test_result_count = mysqli_fetch_assoc($test3)['count'];

//volunteer
$result = "SELECT COUNT(eventid)as count FROM `event` WHERE isdelete !='1'";
$test = mysqli_query($con,$result);
$test_result_count2 = mysqli_fetch_assoc($test)['count'];

//ongoing event
$query = "SELECT * FROM event WHERE eventstatus='2' and isdelete!='1' ORDER BY eventid DESC";
$exec =  mysqli_query($con,$query);

//completed event
$query = "SELECT * FROM event WHERE eventstatus='3' and isdelete!='1' ORDER BY eventid DESC";
$exec3 =  mysqli_query($con,$query);

//new event
$query23 = "SELECT * FROM event WHERE eventstatus='1' and isdelete!='1' ORDER BY eventid DESC";
$exec23 =  mysqli_query($con,$query23);

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UMSVolunteer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style_2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../images/logoumsblack.png" alt="">
        <span class="d-none d-lg-block">UMSVolunteer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <!-- End Messages Nav -->

        <?php include 'rightmenu.php';?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include 'adminmenu.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">Club </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bxs-institution"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $test_result_count1; ?></h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Volunteer </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bxs-user-account"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $test_result_count; ?></h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Events </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bxs-calendar-event"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $test_result_count2; ?></h6>
                      

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

           
			</div>
          </div>
        <!-- End Left side columns -->
<div class="row">
        
			
			<!-- News & Updates Traffic -->
			<div class="col-lg-6">
          <div class="card">
            

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Announcements </h5>

              <div class="news">
                <?php
                while($data2=mysqli_fetch_array($exec23)){
                ?>
                <div class="post-item clearfix">
                  <img src="../image_profile/<?php echo $data2['eventimage'];?>" alt="">
                  <h4><?php echo $data2['eventname']; ?></h4>
                  <p><?php echo $data2['startdate']; ?> - <?php echo $data2['enddate']; ?></p>
                </div>
                <?php
                }
                ?>
              </div><!-- End sidebar recent posts-->
            </div>
          </div><!-- End News & Updates -->
		</div>
    <div class="col-lg-6">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">On Going Events </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Date</th>
                        <th scope="col">Club</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while($data=mysqli_fetch_array($exec)){
                      ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $data['eventname'];?></a></th>
                        <td><?php echo $data['startdate']; ?> - <?php echo $data['enddate']; ?></td>
                        <?php

                          $userid=$data['userid'];
                          $query2 = "SELECT * FROM user WHERE userid='$userid'";
                          $exec2 =  mysqli_query($con,$query2);
                          $exec_set = mysqli_fetch_array($exec2);

                        ?>
                        <td><a href="#" class="text-primary"><?php echo $exec_set['clubname'];?></a></td>
                        <td><span class="badge bg-warning">On Going</span></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
    <div class="col-lg-12">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">Completed Events</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Date</th>
                        <th scope="col">Club</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while($data3=mysqli_fetch_array($exec3)){
                      ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $data3['eventname'];?></a></th>
                        <td><?php echo $data3['startdate']; ?> - <?php echo $data3['enddate']; ?></td>
                        <?php

                          $userid=$data3['userid'];
                          $query2 = "SELECT * FROM user WHERE userid='$userid'";
                          $exec2 =  mysqli_query($con,$query2);
                          $exec_set2 = mysqli_fetch_array($exec2);

                        ?>
                        <td><a href="#" class="text-primary"><?php echo $exec_set2['clubname'];?></a></td>
                        <td><span class="badge bg-danger">Completed</span></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Universiti Malaysia Sabah</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>