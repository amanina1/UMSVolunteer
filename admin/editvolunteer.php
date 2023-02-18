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

    $matricnum = ($_POST['matricnum']);
    $fullname = ($_POST['fullname']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $phonenum = ($_POST['phonenum']);
    $userid = ($_POST['userid']);

    //update to table user
      $query = "UPDATE user SET
            username = '$username',
            fullname = '$fullname',
            email = '$email',
            matricnum = '$matricnum',
            phonenum = '$phonenum'
            WHERE userid = '$userid'";
      $data = mysqli_query($con,$query);

      if($data){

        echo "<script>alert('Successfully update an volunteer!');window.location.href='volunteer.php';</script>";
      }else{

        echo "<script>alert('Not Successfully update an volunteer!');window.location.href='volunteer.php';</script>";
      }

}

$id=$_GET['id'];

$query23 = "SELECT * FROM user where userid='$id'";
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
              <h5 class="card-title">Edit Volunteer</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="editvolunteer.php" method="POST">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="inputNanme4" name="fullname" value="<?php echo $query_exec['fullname'];?>">
                </div>
                
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Matric Num.</label>
                  <input type="text" class="form-control" id="inputAddress" name="matricnum" value="<?php echo $query_exec['matricnum'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Username</label>
                  <input type="text" class="form-control" id="inputAddress" name="username" value="<?php echo $query_exec['username'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputAddress" name="email" value="<?php echo $query_exec['email'];?>">
                </div>
				<div class="col-12">
                  <label for="inputAddress" class="form-label">Phone Num.</label>
                  <input type="text" class="form-control" id="inputAddress" name="phonenum" value="<?php echo $query_exec['phonenum'];?>">
                </div>
                <input type="hidden" name="userid" class="form-control" id="yourName" value="<?php echo $query_exec['userid']; ?>">
                <div class="text-center">
                 <input class="btn btn-primary" type="submit" name="submit" value="Update Volunteer">
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