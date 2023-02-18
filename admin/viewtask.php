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

$id=$_GET['id'];

$query23 = "SELECT * FROM event WHERE eventid ='$id'";
$exec232 =  mysqli_query($con,$query23);
$query_exec=mysqli_fetch_array($exec232);

$query23 = "SELECT * FROM task WHERE eventid ='$id' and isdelete!='1'";
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
      <h1>Task</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Task</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
<div class="row">
        <div class="col-lg-12">
				<br>
		
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">Recent Task for event <?php echo $query_exec['eventname'];?> </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
					              <th scope="col">No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Task</th>
						            <th scope="col">Required</th>
                        <th scope="col">Status</th>
						            <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      while($data=mysqli_fetch_array($exec23)){

                        $eventid_temp=$data['eventid'];
                        $taskid_temp=$data['taskid'];
                        //echo $taskid_temp;
                        //echo $eventid_temp;


                        $result3 = "SELECT COUNT(taskid)as count FROM `volunteertask` WHERE eventid='$eventid_temp' AND taskid='$taskid_temp' and iscancel!='1'";
                        $test3 = mysqli_query($con,$result3);
                        $test_result_count = mysqli_fetch_assoc($test3)['count'];

                      ?>
                      <tr>
					              <td><?php echo $i; ?></td>
                        <th scope="row"><a href="#" class="text-primary"><?php echo $data['datetask'];?></a></th>
                        <td><?php echo $data['starttimetask'];?></td>
                        <td><?php echo $data['taskname'];?></td>
                        <td class="spekers"><span><i class="fa fa-user"
                              aria-hidden="true"></i></span><?php echo $test_result_count;?>/<?php echo $data['taskuser']; ?></td>
						            <td class="venue"><?php if($data['taskstatus']=='1'){ ?><a>Pending</a><?php }else if($data['taskstatus']=='2'){ ?><a>Assign</a><?php }else if($data['taskstatus']=='3'){ ?>Completed <?php }?></td>
									
						          <td>
                        <div class="btn btn-dark btn-sm"><a href="edittask.php?id=<?php echo $data['taskid'];?>"><i class="bx bxs-pencil"></i></div>
						            <div class="btn btn-danger btn-sm"><a href="deletetask.php?id=<?php echo $data['taskid'];?>" onclick="return confirm('Are you sure you want to delete this task?')"><i class="ri-close-fill"></i></div>
						          </td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                  </table>

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