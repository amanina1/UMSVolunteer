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

$query23 = "SELECT * FROM event WHERE eventstatus!='3' and isdelete!='1' ";
$exec23 =  mysqli_query($con,$query23);
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

<body>
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
							<?php include 'menuvolunteer.php';?>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- header end here -->
		<!-- Blog start here -->
		<section class="faq-section padding-120">
			<div class="container">
				<div class="section-wrapper row">
					


					<div class="col-lg-8">
						<div class="faq faq-style3">
							<h4 class="title">Forum</h4>
							<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">

								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-1">
										<h4 class="faq-title">
											<a href="#collapse1-1" data-bs-toggle="collapse"
												data-bs-target="#collapse1-1" aria-expanded="true"
												aria-controls="collapse1-1">
												<span>Dynamically Aggregate And Create Enterprise Wide Core</span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									<div id="collapse1-1" class="faq-collapse collapse show" role="tabpanel"
										aria-labelledby="heading1-1">
										<div class="faq-body">
											Lid est laborum dolo rumes fugats untras. Etharums ser quidem and rerum
											facilis dolores nemis omnis and fugats vitaes nemo minima rerums unsers
											awesome event theme sadips amets
										</div>
										<div class="row mb-3">
		                 
		                  <div class="col-sm-10">
		                    <textarea class="form-control" style="height: 100px" name="eventdesc"></textarea>
		                  </div>
		                </div>
						<div class="col-12">
                      <input class="btn btn-primary " name="submit" type="submit" value="Reply">
                    </div>
									</div>
									
								</div>

								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-2">
										<h4 class="faq-title">
											<a class="collapsed" href="#collapse1-2" data-bs-toggle="collapse"
												data-bs-target="#collapse1-2" aria-expanded="true"
												aria-controls="collapse1-2">
												<span>Dynamically Aggregate And Create Enterprise Wide Core</span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									<div id="collapse1-2" class="faq-collapse collapse" role="tabpanel"
										aria-labelledby="heading1-2">
										<div class="faq-body">
											Lid est laborum dolo rumes fugats untras. Etharums ser quidem and rerum
											facilis dolores nemis omnis and fugats vitaes nemo minima rerums unsers
											awesome event theme sadips amets
										</div>
									</div>
								</div>

								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-3">
										<h4 class="faq-title">
											<a class="collapsed" href="#collapse1-3" data-bs-toggle="collapse"
												data-bs-target="#collapse1-3" aria-expanded="true"
												aria-controls="collapse1-3">
												<span>Dynamically Aggregate And Create Enterprise Wide Core</span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									<div id="collapse1-3" class="faq-collapse collapse" role="tabpanel"
										aria-labelledby="heading1-3">
										<div class="faq-body">
											Lid est laborum dolo rumes fugats untras. Etharums ser quidem and rerum
											facilis dolores nemis omnis and fugats vitaes nemo minima rerums unsers
											awesome event theme sadips amets
										</div>
									</div>
								</div>

								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-4">
										<h4 class="faq-title">
											<a class="collapsed" href="#collapse1-4" data-bs-toggle="collapse"
												data-bs-target="#collapse1-4" aria-expanded="true"
												aria-controls="collapse1-4">
												<span>Dynamically Aggregate And Create Enterprise Wide Core</span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									<div id="collapse1-4" class="faq-collapse collapse" role="tabpanel"
										aria-labelledby="heading1-4">
										<div class="faq-body">
											Lid est laborum dolo rumes fugats untras. Etharums ser quidem and rerum
											facilis dolores nemis omnis and fugats vitaes nemo minima rerums unsers
											awesome event theme sadips amets
										</div>
									</div>
								</div>

								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-5">
										<h4 class="faq-title">
											<a class="collapsed" href="#collapse1-5" data-bs-toggle="collapse"
												data-bs-target="#collapse1-5" aria-expanded="true"
												aria-controls="collapse1-5">
												<span>Dynamically Aggregate And Create Enterprise Wide Core</span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									<div id="collapse1-5" class="faq-collapse collapse" role="tabpanel"
										aria-labelledby="heading1-5">
										<div class="faq-body">
											Lid est laborum dolo rumes fugats untras. Etharums ser quidem and rerum
											facilis dolores nemis omnis and fugats vitaes nemo minima rerums unsers
											awesome event theme sadips amets
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					

					

					
				</div>
			</div>
		</section><!-- home-blog -->
		<!-- Blog end here -->
		<!-- Footer Start here -->
		<footer class="footer-six">
			<div class="overlay">
				<div class="container">
					<h2>UMSVolunteer</h2>
					
					<p>Copyright &copy; 2022. Universiti Malaysia Sabah.</p>
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