<html lang="en">
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else




if(isset($_POST['submit'])){
	
	$verified="2";
	$idtask = ($_POST['taskid']);
	$id = ($_POST['userid']);
	$reason = ($_POST['reason']);

$query = "UPDATE volunteertask SET
            verified = '$verified',
			reason = '$reason'
            WHERE userid = '$id' and taskid='$idtask'";
     $data = mysqli_query($con,$query);

     if($data){

        echo "<script>alert('Task rejected!');window.location.href='detailstask.php?id=$idtask';</script>";
      }else{

        echo "<script>alert('Not Successfully update an task verified status!');window.location.href='detailstask.php?id=$idtask';</script>";
      }
}

$idtask=$_GET['idtask'];
$id=$_GET['id'];

$query2331 = "SELECT * FROM user WHERE userid='$id'";
$exec2331 =  mysqli_query($con,$query2331);
$exec_set21 = mysqli_fetch_array($exec2331);

$query23312 = "SELECT * FROM task WHERE taskid='$idtask'";
$exec23312 =  mysqli_query($con,$query23312);
$exec_set212 = mysqli_fetch_array($exec23312);

?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>UMSVolunteer</title>


	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i%7CPoppins:300,400,500,600,700"
		rel="stylesheet">

	<!-- Bootstrap -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font-Awesome -->
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Flat icon -->
	<link href="../assets/flaticon/flaticon.css" rel="stylesheet">

	<!-- Swiper -->
	<link href="../assets/css/swiper.min.css" rel="stylesheet">

	<!-- Lightcase -->
	<link href="../assets/css/lightcase.css" rel="stylesheet">

	<!-- quick-view -->
	<link href="../assets/css/quick-view.css" rel="stylesheet">

	<!-- nstSlider -->
	<link href="../assets/css/jquery.nstSlider.css" rel="stylesheet">

	<!-- flexslider -->
	<link href="../assets/css/flexslider.css" rel="stylesheet">

	<!-- banner-bg -->
	<link href="../assets/css/banner-bg.css" rel="stylesheet">

	<!-- Style -->
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/header.css" rel="stylesheet">

	<!-- Responsive -->
	<link href="../assets/css/responsive.css" rel="stylesheet">


</head>

<body style="background-color:#264653;">
	<div class="box-layout">
		<!-- header start here-->
		<header>
			<div class="box-layout">
		<!-- header start here-->
		<header>
			<div class="menu-fixed bgc-trans-4">
				<nav class="navbar navbar-expand-lg">
					<div class="container">
						<a class="navbar-brand" href="index.php"><img src="../images/logoums.png" alt="logo" 
								class="img-responsive"></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<i class="fa fa-bars"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<?php include 'menuclub.php';?>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- header end here -->
		<!-- Blog start here -->
		<section class="home-blog home-blog-uhv home-blog-six">
			<div class="padding-120">
			
				<div class="container">
				
					<div class="section-header text-center">
					<br>
						<h3 style="color:white">Reason Reject Volunteer's Task</h3>
						
					</div>
					<div class="card mb-3">

           	<div class="card-body">
           		
              <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Enter your reason</h5>
                    <p class="text-center small"></p>
              </div>

              <form class="row g-3 needs-validation" action="rejecttask.php" method="POST" novalidate>
				  			<div class="col-12">
                  <label for="yourEmail" class="form-label">Task Name</label>
                  <input type="text" name="eventname" class="form-control" id="yourEmail" value="<?php echo $exec_set212['taskname'];?>" readonly>
                </div>

				  			<div class="col-12">
                  <label for="yourEmail" class="form-label">Volunteer Name</label>
                  <input type="text" name="taskname" class="form-control" id="yourEmail" value="<?php echo $exec_set21['fullname'];?>">
                </div>
					
								<div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Reason</label>
                  <input type="input" name="reason" class="form-control" id="yourEmail">
                </div>
								<br><br>
								
               	<input type="hidden" name="taskid" class="form-control" id="yourName" value="<?php echo $idtask; ?>">
               	<input type="hidden" name="userid" class="form-control" id="yourName" value="<?php echo $id; ?>">
                <div class="col-12">
                  <input class="btn btn-primary w-100" style="background-color:#2a9d8f" type="submit" name="submit" value="Submit">
                </div>
                   
              </form>

                </div>
            </div><!-- row -->
					</div><!-- container -->
			</div>
		</section><!-- home-blog -->
		<!-- Blog end here -->
		<!-- Footer Start here -->
		<footer class="footer-six">
			<div class="padding-120" style="background-color:#e71d36;"  >
				<div class="container" >
					
					
					<p>UMSVolunteer Copyright &copy; Universiti Malaysia Sabah.</p>
				</div>
			</div>
		</footer>
		<!-- Footer End here -->
	</div>


	<!-- jQuery -->
	<script src="../assets/js/jquery-3.1.1.min.js"></script>
	<script src="../assets/js/jquery-migrate-1.4.1.min.js"></script>

	<!-- Bootstrap -->
	<script src="../assets/js/bootstrap.min.js"></script>

	<!-- Coundown -->
	<script src="../assets/js/jquery.countdown.min.js"></script>

	<!--Swiper-->
	<script src="../assets/js/swiper.jquery.min.js"></script>

	<!--Masonry-->
	<script src="../assets/js/masonry.pkgd.min.js"></script>

	<!--Lightcase-->
	<script src="../assets/js/lightcase.js"></script>

	<!--modernizr-->
	<script src="../assets/js/modernizr.js"></script>

	<!--velocity-->
	<script src="../assets/js/velocity.min.js"></script>

	<!--quick-view-->
	<script src="../assets/js/quick-view.js"></script>

	<!--nstSlider-->
	<script src="../assets/js/jquery.nstSlider.js"></script>
	<script src="../assets/js/nstfunctions.js"></script>

	<!--flexslider-->
	<script src="../assets/js/flexslider-min.js"></script>
	<script src="../assets/js/flexfunctions.js"></script>

	<!--directional-->
	<script src="../assets/js/directional-hover.js"></script>

	<!--easing-->
	<script src="../assets/js/jquery.easing.min.js"></script>
	<!-- parallax.js -->
	<script src="../assets/js/parallax.js"></script>
	<script src="../assets/js/theia-sticky-sidebar.js"></script>

	

	<!-- Custom -->
	<script src="../assets/js/custom.js"></script>

	
</body>

</html>