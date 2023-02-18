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

//$userid=$_GET['userid'];


if(isset($_POST['submit'])){
    
    $comment = ($_POST['comment']);
    $event_id2 = ($_POST['event_id2']);
    $userid2 = ($_POST['userid2']);
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date("d-m-Y");
	$time=date('H:i:a');
    
     
	  $query1 = "INSERT INTO forum(userid,eventid,forumchat,date,time) VALUES('$userid2','$event_id2','$comment','$date','$time')";
      $data = mysqli_query($con,$query1);


      if($data){

        echo "<script>alert('Successfully add an comment!');window.location.href='forumclub2.php?eventid3=$event_id2';</script>";
      }else{

        echo "<script>alert('Not Successfully add an comment!');window.location.href='forumclub2.php?eventid3=$event_id2';</script>";
      }

}

$event_id=$_GET['eventid3'];
//$exec_set = mysqli_fetch_array($exec23);

//$event_id=$exec_set['eventid'];

//echo $event_id

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
		<section class="faq-section padding-120">
			<div class="container">
				<div class="section-wrapper row">
					


					<div class="col-lg-12">
						<div class="faq faq-style3">
						<br>
							<h4 class="title" style="color:white">Forum</h4>
							<br>
							<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
								<?php
								

									//$event_id=$data['eventid'];

									$query231 = "SELECT * FROM event WHERE eventid='$event_id' ";
									$exec231 =  mysqli_query($con,$query231);
									$exec_set1 = mysqli_fetch_array($exec231);

									$query23 = "SELECT * FROM forum WHERE eventid='$event_id' and status!='2'";
									$exec23 =  mysqli_query($con,$query23);
									//$exec_set1 = mysqli_fetch_array($exec231);
								?>
								<div class="panel">
									<div class="faq-heading" role="tab" id="heading1-1">
										<h4 class="faq-title">
											<a href="#collapse1-1" data-bs-toggle="collapse"
												data-bs-target="#collapse1-1" aria-expanded="true"
												aria-controls="collapse1-1" style="background-color:#e76f51;">
												<span><?php echo $exec_set1['eventname'];?></span>
												<span class="faq-icon pull-right"><i class="fa fa-long-arrow-right"
														aria-hidden="true"></i></span>
											</a>
										</h4>
									</div>
									
									<div id="collapse1-1" class="faq-collapse collapse show" role="tabpanel"
										aria-labelledby="heading1-1">
										<?php
										while($data=mysqli_fetch_array($exec23)){
										?>
										<div class="faq-body">

											<?php

												$user_id2=$data['userid'];
												$query2310 = "SELECT * FROM user WHERE userid='$user_id2' ";
												$exec2310 =  mysqli_query($con,$query2310);
												$exec_set10 = mysqli_fetch_array($exec2310);
												$role=$exec_set10['role'];
												//echo $role;
												$userid2=$exec_set10['userid'];


											?>

											<a style="color:#ffba08"><?php if($role=='3'){ echo $exec_set10['fullname'];} 
											else if($role=='2'){ echo $exec_set10['clubname'];}?></a>
											<p style="color:white"><?php echo $data['forumchat'];?></p>
											<a style="color:white"><?php echo $data['date'];?></a>
											<a style="color:white"><?php echo $data['time'];?></a>
											<?php if($userid2==$userid){?>
											
												<a href="deletecomment.php?id=<?php echo $data['forumid'];?>" ><input class="btn btn-primary btn-sm" style="background-color:#2a9d8f; margin-left: auto; display: block;;" name="submit" type="submit" value="Delete Comment"></a>
											
											<?php }?>
										</div>
										<?php
										}
										?>
										<form action="forumclub2.php" method="POST">
										<div class="row mb-3">
		                 
						                  <div class="col-sm-10">
						                    <textarea class="form-control" style="height: 100px" name="comment" required></textarea>
						                  </div>
						                </div>
						                <input type="hidden" name="event_id2" value="<?php echo $event_id;?>">
						                <input type="hidden" name="userid2" value="<?php echo $userid;?>">
										<div class="col-12">
				                      		<input class="btn btn-primary " style="background-color:#2a9d8f" name="submit" type="submit" value="Add Comment">
				                    	</div>
				                    	</form>
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