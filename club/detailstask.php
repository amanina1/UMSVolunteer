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

// $query23 = "SELECT * FROM event WHERE eventid='$id' ";
// $exec23 =  mysqli_query($con,$query23);
// $exec_set = mysqli_fetch_array($exec23);

$query233891 = "SELECT * FROM volunteertask WHERE taskid='$id' and iscancel!='1'";
$exec233891 =  mysqli_query($con,$query233891);
//$exec_set2891 = mysqli_fetch_array($exec233891);

$query2331 = "SELECT * FROM task WHERE taskid='$id' and isdelete!='1'";
$exec2331 =  mysqli_query($con,$query2331);
$exec_set21 = mysqli_fetch_array($exec2331);
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
			<div class="menu-fixed bgc-trans-4">
				<nav class="navbar navbar-expand-lg">
					<div class="container">
						<a class="navbar-brand" href="myevent.php"><img src="../images/logoums.png" alt="logo" 
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
		

<section class="schedules schedules-two">
			<div class="overlay" style="background-color:#264653;">
				<div class="container">
				<br>
					<div class="section-header text-center">
					
						<h3>Event Schedules</h3>
						
						
						
					</div>
					<br>
					<!-- <a href="addtask.php?id=<?php echo $exec_set['eventid'];?>" class="btn btn-primary">Add a Task </a><br><br> -->

					<div class="schedule-tabs">
					

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" id="myTab2">
							<li class="nav-item" role="presentation" class="active"><a href="#day-one-second"
									data-bs-toggle="tab" data-bs-target="#day-one-second" type="button" role="tab"
									aria-controls="day-one-second" aria-selected="true">
									<?php echo $exec_set21['taskname'];?>
									
								</a></li>
						</ul>
						<!-- Tab panes -->
						
						<div class="tab-content" id="myTabContent2">
						
							<div role="tabpanel" class="tab-pane active" id="day-one-second">
							
								<div class="schedule-table table-responsive">
									<table>
										<thead>
											<tr>
												
												<th class="spekers" style="background-color:#2a9d8f;">User</th>
												<th class="spekers" style="background-color:#2a9d8f;">Task status</th>
												<th class="spekers" style="background-color:#2a9d8f;">Verified</th>
												<th class="spekers" style="background-color:#2a9d8f;">Reason</th>
												<th class="spekers" style="background-color:#2a9d8f;">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while($data2=mysqli_fetch_array($exec233891)){


												$userid_temp=$data2['userid'];
													$query23389 = "SELECT * FROM user WHERE userid='$userid_temp'";
												$exec23389 =  mysqli_query($con,$query23389);
												$exec_set289 = mysqli_fetch_array($exec23389);

												

											?>
											<tr>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php echo $exec_set289['fullname']; ?></td>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php if($data2['taskstatus']=='1'){ ?><a>Pending</a><?php }else if($data2['taskstatus']=='2'){ ?><a>On Progress</a><?php }else if($data2['taskstatus']=='3'){ ?>Completed <?php }?><?php echo '<br>'; ?></td>			
												<td style="color:white"><?php if($data2['verified']=='1'){ ?>Approved <?php }else if($data2['verified']=='2'){?> Rejected <?php }?></td>
												<td style="color:white"><?php echo $data2['reason'];?></td>	
												<td style="color:white"><?php if($data2['taskstatus']=='3'){?><a href="approvetask.php?id=<?php echo $data2['userid'];?>&idtask=<?php echo $id;?>" class="btn btn-primary">Approve</a> &nbsp <a href="rejecttask.php?id=<?php echo $data2['userid'];?>&idtask=<?php echo $id;?>" class="btn btn-primary">Rejected</a><?php }?></td>

												
											</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
								<!-- schedule-table -->

							</div>
						</div>
					</div>
				</div>
				<!-- container -->
			</div>
			<!-- overlay -->
		</section>

		



		



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