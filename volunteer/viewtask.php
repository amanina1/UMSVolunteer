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

$query23 = "SELECT * FROM event WHERE eventid='$id' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);

$query233 = "SELECT * FROM task WHERE eventid='$id' and isdelete!='1'";
$exec233 =  mysqli_query($con,$query233);
//$exec_set2 = mysqli_fetch_array($exec233);



$query231 = "SELECT * FROM volunteertask WHERE eventid='$id' and userid='$userid' and iscancel!='1'";
$exec231 =  mysqli_query($con,$query231);
$exec_set1 = mysqli_fetch_array($exec231);


// $query2315 = "SELECT taskid COUNT(taskid) AS NumberOftask FROM volunteertask";
// $exec2315 =  mysqli_query($con,$query2315);
// $exec_set15 = mysqli_fetch_array($exec2315);

$query2319 = "SELECT * FROM volunteertask WHERE eventid='$id' and userid='$userid' and iscancel!='1'";
$exec2319 =  mysqli_query($con,$query2319);
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
		
		<!-- Blog end here -->

<section class="schedules schedules-two">
			<div class="overlay" style="background-color:#264653;">
				<div class="container">
					<div class="section-header text-center">
						<h3>Event Schedules</h3>
						
						
						
					</div>
					<div class="schedule-tabs">
					

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" id="myTab2">
							<li class="nav-item" role="presentation" class="active"><a href="#day-one-second"
									data-bs-toggle="tab" data-bs-target="#day-one-second" type="button" role="tab"
									aria-controls="day-one-second" aria-selected="true">
									<?php echo $exec_set['eventname'];?>
									
								</a></li>
						</ul>
						<!-- Tab panes -->
						
						<div class="tab-content" id="myTabContent2" >
						
							<div role="tabpanel" class="tab-pane active" id="day-one-second" >
							
								<div class="schedule-table table-responsive" >
									<table >
										<thead >
											<tr >
												
												<th class="spekers" style="background-color:#2a9d8f;">Date Task</th>
												<th class="spekers"style="background-color:#2a9d8f;">Time Task</th>
												<th class="spekers"style="background-color:#2a9d8f;">Task</th>
												<th class="spekers"style="background-color:#2a9d8f;">Require</th>
												<th style="background-color:#2a9d8f;">Action</th>
												<th style="background-color:#2a9d8f;">Verified</th>
												<th style="background-color:#2a9d8f;">Reason</th>
											</tr>
										</thead>
										<tbody>
											<?php
											

											

											
											if(isset($exec_set1['eventid'])){


												$eventid_temp2=$exec_set1['eventid'];
												$taskid_temp2=$exec_set1['taskid'];
												//echo $eventid_temp2;
												//echo $taskid_temp2;
												$query2331 = "SELECT * FROM task WHERE  taskid='$taskid_temp2' and isdelete!='1'";
												$exec2331 =  mysqli_query($con,$query2331);
												$exec_set21 = mysqli_fetch_array($exec2331);

												$query23310 = "SELECT * FROM volunteertask WHERE  taskid='$taskid_temp2' and userid='$userid' and iscancel!='1'";
												$exec23310 =  mysqli_query($con,$query23310);
												$exec_set210 = mysqli_fetch_array($exec23310);

											while($data=mysqli_fetch_array($exec2319)){

												$eventid_temp=$data['eventid'];
												$taskid_temp=$data['taskid'];
												//echo $taskid_temp;
												//echo $eventid_temp;

												$result3 = "SELECT COUNT(taskid)as count FROM `volunteertask` WHERE eventid='$eventid_temp' AND taskid='$taskid_temp' and iscancel!='1'";
									            $test3 = mysqli_query($con,$result3);
									            $test_result_count = mysqli_fetch_assoc($test3)['count'];


									            $query233891 = "SELECT * FROM volunteertask WHERE eventid='$eventid_temp' AND taskid='$taskid_temp'";
												$exec233891 =  mysqli_query($con,$query233891);
											?>
											<tr>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php echo $exec_set21['datetask']; ?></td>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php echo $exec_set21['starttimetask']; ?>-<?php echo $exec_set21['endtimetask']; ?></td>
												<td class="spekers" style="color:white"><span><i class="fa fa-list-alt"
															aria-hidden="true"></i></span><?php echo $exec_set21['taskname']; ?></td>
												<td class="spekers" style="color:white"><span><i class="fa fa-user"
															aria-hidden="true"></i></span><?php echo $test_result_count;?>/<?php echo $exec_set21['taskuser']; ?></td>
												
												
												<td class="venue" style="color:white"><?php if($exec_set210['taskstatus']=='1'){ ?><a href="pendingtask.php?id=<?php echo $exec_set210['taskid'];?>" onclick="return confirm('Are you sure you want to update this task to on going?')" class="default-button"><u>Pending</u></a><br></br><a href="canceltask.php?id=<?php echo $exec_set210['taskid'];?>" onclick="return confirm('Are you sure you want to cancel this task?')" class="default-button"><u>Cancel</u></a><?php }else if($exec_set210['taskstatus']=='2'){ ?><a href="onprogress.php?id=<?php echo $exec_set210['taskid'];?>" onclick="return confirm('Are you sure you want to Complete this task?')" class="default-button"><u>On Progress</u></a><?php }else if($exec_set210['taskstatus']=='3'){ ?><u>Completed</u> <?php }?></td>
												<td style="color:white"><?php if($exec_set210['verified']=='1'){ ?>Approved <?php }else if($exec_set210['verified']=='2'){?> Rejected <?php }?></td>
												<td style="color:white"><?php echo $data['reason']?></td>
											</tr>
											<?php
											}
											}else{

												while($data=mysqli_fetch_array($exec233)){



												$eventid_temp=$data['eventid'];
												$taskid_temp=$data['taskid'];
												//echo $taskid_temp;
												//echo $eventid_temp;

												$result3 = "SELECT COUNT(taskid)as count FROM `volunteertask` WHERE eventid='$eventid_temp' AND taskid='$taskid_temp' and iscancel!='1'";
									            $test3 = mysqli_query($con,$result3);
									            $test_result_count = mysqli_fetch_assoc($test3)['count'];


									            $query233891 = "SELECT * FROM volunteertask WHERE eventid='$eventid_temp' AND taskid='$taskid_temp'";
												$exec233891 =  mysqli_query($con,$query233891);

												$query230 = "SELECT * FROM task WHERE eventid='$eventid_temp' ";
												$exec230 =  mysqli_query($con,$query230);
												$exec_set99 = mysqli_fetch_array($exec230);
											?>
											<tr>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php echo $data['datetask']; ?></td>
												<td class="time" style="color:white"><span><i class="fa fa-clock-o"
															aria-hidden="true"></i></span><?php echo $data['starttimetask']; ?>-<?php echo $data['endtimetask']; ?></td>
												<td class="session" style="color:white"><span><i class="fa fa-list-alt"
															aria-hidden="true"></i></span><?php echo $data['taskname']; ?></td>
												<td class="spekers" style="color:white"><span><i class="fa fa-user"
															aria-hidden="true"></i></span><?php echo $test_result_count;?>/<?php echo $data['taskuser']; ?></td>
												
												<td class="venue" style="color:white"><a <?php if($test_result_count==$exec_set99['taskuser']){ ?>onclick="return confirm('This Task already full, please pick other task!')"<?php }else{ ?> href="dotask.php?id=<?php echo $data['taskid'];?>" onclick="return confirm('Are you sure you want to assign this task?')" <?php }?>class="default-button"><u>Do it</u></a></td>
												<td style="color:white"></td>
												<td style="color:white"></td>
												
											</tr>
											<?php
											}
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