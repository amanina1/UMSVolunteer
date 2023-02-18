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

$userid_temp=$_GET['userid'];


$event_id=$_GET['eventid4'];
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
      <h1>Certificate</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Certificate</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="faq-section padding-120">
      <div class="container">
        <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                          <div class="col-md-12">
                                    <center>
                                        <img src="../images/LOGO_UMS_hitam2.png" alt="logo" 
                class="img-responsive">
                                    </center>
                                </div>
                            <br></br>
                            <hr>
                            <br></br>
                            <?php
                

                  //$event_id=$data['eventid'];

                  $query231 = "SELECT * FROM event WHERE eventid='$event_id' ";
                  $exec231 =  mysqli_query($con,$query231);
                  $exec_set1 = mysqli_fetch_array($exec231);

                  $query2312 = "SELECT * FROM user WHERE userid='$userid_temp' ";
                  $exec2312 =  mysqli_query($con,$query2312);
                  $exec_set12 = mysqli_fetch_array($exec2312);

                  $clubid=$exec_set1['userid'];
                  //clubname
                  $query23121 = "SELECT * FROM user WHERE userid='$clubid' ";
                  $exec23121 =  mysqli_query($con,$query23121);
                  $exec_set121 = mysqli_fetch_array($exec23121);

                ?>
                            <div class="row">

                                <h3><center>Certificate</center></h3>
                                <h4><center>Of Participation</center></h4>
                                <div class="col-md-12">
                                  <br></br>
                                  <br></br>
                                    <center><h5>
                            This certificate is proudly awarded to
                        </h5></center>
                        <br></br>
                        
                            <center><h5><?php echo $exec_set12['fullname'];?></h5>
                              <hr style="height:2px;border-width:0;color:gray;background-color:gray; width:70%;">
                            </center>
                        <br></br>
                        <div class="reason">
                            <center><h5>For your extraordinary service and contributions to your profession</h5></center>
                            <center><h5>in <?php echo $exec_set1['eventname'];?>. Held on <?php echo $exec_set1['startdate'];?> by <?php echo $exec_set121['clubname'];?>. We are </h5></center>
                            <center><h5>delighted in providing this certificate to you.</h5></center>
                        </div>
                        <br></br>
                        <br></br>
                        <br></br>
                        <br></br>
                        
                      <div class="pull-left">
                                        <a>_____________________</a>
                        <br>
                        <a>(<?php echo $exec_set1['eventpic'];?>)</a>
                        <br>
                        <a>Head Of Event</a>
                        <br></br>
                                    </div>
                      <div class="pull-right text-right">
                                        <a>Date : <?php echo $exec_set1['startdate'];?></a> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    
                                    <div class="clearfix"></div>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="text-right">
                                        <button id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div> -->
                    </div>
                </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Universiti Malaysia Sabah</span></strong>. All Rights Reserved 2022
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
  <script src="../js/jquery.PrintArea.js"></script>
  <script>
    $(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>

</body>

</html>