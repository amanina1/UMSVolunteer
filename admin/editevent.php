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

if(isset($_POST['submit'])){
    $eventname = ($_POST['eventname']);
    $eventdesc = ($_POST['eventdesc']);
    //date start and end
    $startdate = $_POST['startdate'];
    $startdate2 = date("d-m-Y", strtotime($startdate));
    $enddate = $_POST['enddate'];
    $enddate2 = date("d-m-Y", strtotime($enddate));
    
    $eventlocation = ($_POST['eventlocation']);
    $eventpic = ($_POST['eventpic']);
    $eventnompic = ($_POST['eventnompic']);
    $eventemailpic = ($_POST['eventemailpic']);
    $eventid = ($_POST['eventid']);


    $query = "UPDATE event SET
            eventname = '$eventname',
            eventdesc = '$eventdesc',
            startdate = '$startdate',
            enddate = '$enddate',
            eventlocation = '$eventlocation',
            eventpic = '$eventpic',
            eventnompic = '$eventnompic',
            eventemailpic = '$eventemailpic'
            WHERE eventid = '$eventid'";
     $data = mysqli_query($con,$query);
     
     if($data){

        echo "<script>alert('Successfully Update an Event!');window.location.href='event.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Update an Event!');window.location.href='event.php';</script>";
      }

  }

$id=$_GET['id'];

$query23 = "SELECT * FROM event where eventid='$id'";
$exec23 =  mysqli_query($con,$query23);
$query_exec=mysqli_fetch_array($exec23);
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
      <h1>Event</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Event</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
<div class="row">
        <div class="col-lg-12">
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Event</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="editevent.php" method="POST">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Event Name</label>
                  <input type="text" class="form-control" name="eventname" id="inputNanme4" value="<?php echo $query_exec['eventname'];?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Description of The Event</label>
                  <div class="col-sm-12">
		                    <textarea class="form-control" style="height: 100px" name="eventdesc"><?php echo $query_exec['eventdesc'];?></textarea>
		                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Start Date of The Event</label>
                  <input type="date" class="form-control" id="inputPassword4" name="startdate" value="<?php echo $query_exec['startdate'];?>">
                </div>
                <div class="col-md-6">
                  <label for="inputAddress" class="form-label">Until</label>
                  <input type="date" class="form-control" id="inputAddress" name="enddate" value="<?php echo $query_exec['enddate'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Location</label>
                  <input type="text" class="form-control" name="eventlocation" id="inputAddress" placeholder="1234 Main St" value="<?php echo $query_exec['eventlocation'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Name of Person in Charge</label>
                  <input type="text" class="form-control" name="eventpic" id="inputAddress" placeholder="1234 Main St" value="<?php echo $query_exec['eventpic'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Phone Number of Person in Charge</label>
                  <input type="text" class="form-control" name="eventnompic" id="inputAddress" placeholder="1234 Main St" value="<?php echo $query_exec['eventnompic'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Email of Person in Charge</label>
                  <input type="text" class="form-control" name="eventemailpic" id="inputAddress" placeholder="1234 Main St" value="<?php echo $query_exec['eventemailpic'];?>">
                </div>
                <input type="hidden" name="eventid" class="form-control" id="yourName" value="<?php echo $query_exec['eventid'];?>">
                <div class="text-center">
                  <input class="btn btn-primary" name="submit" type="submit" value="Update">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
            </div>
			
			<!-- News & Updates Traffic -->
			
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

</body>

</html>