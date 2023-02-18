<!DOCTYPE html>
<html lang="en">
<?php include 'includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();

$id=$_GET['id'];

$query23 = "SELECT * FROM event WHERE eventid='$id' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);
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
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font-Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Flat icon -->
	<link href="assets/flaticon/flaticon.css" rel="stylesheet">

	<!-- Swiper -->
	<link href="assets/css/swiper.min.css" rel="stylesheet">

	<!-- Lightcase -->
	<link href="assets/css/lightcase.css" rel="stylesheet">

	<!-- quick-view -->
	<link href="assets/css/quick-view.css" rel="stylesheet">

	<!-- nstSlider -->
	<link href="assets/css/jquery.nstSlider.css" rel="stylesheet">

	<!-- flexslider -->
	<link href="assets/css/flexslider.css" rel="stylesheet">

	<!-- banner-bg -->
	<link href="assets/css/banner-bg.css" rel="stylesheet">

	<!-- Style -->
	<link href="assets/css/style.css" rel="stylesheet">
	
	<link href="assets/css/header.css" rel="stylesheet">


	<!-- Responsive -->
	<link href="assets/css/responsive.css" rel="stylesheet">


</head>

<body style="background-color:#264653;">
	<div class="box-layout">
		<!-- header start here-->
		<header>
			<div class="menu-fixed bgc-trans-4">
				<nav class="navbar navbar-expand-lg">
					<div class="container">
						<a class="navbar-brand" href="index.php"><img src="images/logoums.png" alt="logo" 
								class="img-responsive"></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<i class="fa fa-bars"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="main-menu">
								<div class="menu-left">
								
									<ul>
										<div class="sidebar-item">
		                                    
                                		</div>

                                		<li>
                                            <a href="#">Sign Up</a>
                                            <ul>
                                                <li><a href="registerclub.php">Club</a></li>
                                                <li><a href="registervolunteer.php">Volunteer</a></li>
                                            </ul>
                                        </li>

									</ul>
									
								</div>
								
								<div class="menu-right">
									<ul>
										
										<br>
										<li><a href="login.php" class="menu-button">Log In</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- header end here -->

		<!-- Blog start here -->
		<section class="blog-page padding-120 home-blog-uhv">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">
                        <div class="blog-item single">
                            <div class="image">
                                <img src="image_profile/<?php echo $exec_set['eventimage'];?>" alt="Blog image" class="img-responsive">
                            </div>
                            <!-- image -->
                            <div class="blog-content">
                                <div>
                                    <ul class="post-meta">
                                        <li><a href="#"><span>Date</span><?php echo $exec_set['startdate'];?> - <?php echo $exec_set['enddate'];?></a></li>
                                        <li></span><a href="#">Time : <?php echo $exec_set['starttime'];?> - <?php echo $exec_set['endtime'];?></a></li>
                                        <?php
										$eventid_temp=$id;
										$result3 = "SELECT sum(taskuser)as count FROM `task` WHERE eventid='$eventid_temp' and isdelete!='1'";
										$test3 = mysqli_query($con,$result3);
										$test_result_count = mysqli_fetch_assoc($test3)['count'];

										//$eventid_temp=$data['eventid'];
										$result31 = "SELECT COUNT(eventid)as count FROM `volunteertask` WHERE eventid='$eventid_temp'";
										$test31 = mysqli_query($con,$result31);
										$test_result_count1 = mysqli_fetch_assoc($test31)['count'];
										?>
                                        <li><span class="icon flaticon-user"></span><a href="#"><?php echo $test_result_count;?> Required</a></li>
										<li><span class="icon flaticon-like"></span><a href="#"><?php echo $test_result_count1;?> Joined</a></li>
                                        <?php
										if($exec_set['eventstatus']=='1'){
										?>
											<li><span class="icon flaticon-like"></span><a href="#" style="background-color:#fca311; color:black;">New Event</a></li>
										<?php
										}else if($exec_set['eventstatus']=='2'){
										?>
											<li><span class="icon flaticon-like"></span><a href="#" style="background-color:#e63946; color:black;">On Going Event</a></li>
										<?php
										}
										?>
                                        
                                    </ul>
                                    <!-- post-meta -->
                                    <div class="content">
                                        <h4><?php echo $exec_set['eventname'];?></h4>
                                        <p><?php echo $exec_set['eventdesc'];?>
											<br>
											<br>
										 <!--	Benefits:
											<?php echo $exec_set['eventbenefit'];?>
											<br>
											Fee : <?php if($exec_set['eventfee']!=null){ echo $exec_set['eventfee']; } else{ echo "Free"; }?> -->
											
											Location : <?php echo $exec_set['eventlocation'];?></p>
                                        
                                        	<a href="index.php" onclick="return confirm('If you want to join this event u need login first, if you dont have login ID u need to sign up as Volunteer first!')" class="default-button" style="background-color:#2a9d8f;">Join</a>
                                        
                                    </div>
                                    <!-- content -->
                                </div>
                            </div>
                            <!-- blog-content -->
                           
                        <!-- blog item -->
						</div>
                        
                        <!-- comment -->
                        
                        <!-- comment-form -->

                    </div>
					
					<div class="col-lg-4 col-md-12 col-xs-12 sticky-widget">
                        <div class="sidebar">
                            <div>
                                
                                <!-- sidebar item -->
                                <div class="sidebar-item"><br>
                                    <h4 class="sidebar-title">Person in Charge</h4>

                                    <ul class="populer-posts">
                                        <li class="blog-item">
                                            
                                            <div class="content">
                                                <h5>Name : <?php echo $exec_set['eventpic'];?></h5>
                                                <br>
                                                <span>Contact No : <?php echo $exec_set['eventnompic'];?></span>
                                                <br>
												<span>Email : (<?php echo $exec_set['eventemailpic'];?>)</span>
                                            </div>
                                        </li>
                                        
                                    </ul>

                                </div>
                                <!-- sidebar item -->
                                
                                <!-- sidebar item -->

                            </div>
                        </div>
                        <!-- sidebar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
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
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/jquery-migrate-1.4.1.min.js"></script>

	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Coundown -->
	<script src="assets/js/jquery.countdown.min.js"></script>

	<!--Swiper-->
	<script src="assets/js/swiper.jquery.min.js"></script>

	<!--Masonry-->
	<script src="assets/js/masonry.pkgd.min.js"></script>

	<!--Lightcase-->
	<script src="assets/js/lightcase.js"></script>

	<!--modernizr-->
	<script src="assets/js/modernizr.js"></script>

	<!--velocity-->
	<script src="assets/js/velocity.min.js"></script>

	<!--quick-view-->
	<script src="assets/js/quick-view.js"></script>

	<!--nstSlider-->
	<script src="assets/js/jquery.nstSlider.js"></script>
	<script src="assets/js/nstfunctions.js"></script>

	<!--flexslider-->
	<script src="assets/js/flexslider-min.js"></script>
	<script src="assets/js/flexfunctions.js"></script>

	<!--directional-->
	<script src="assets/js/directional-hover.js"></script>

	<!--easing-->
	<script src="assets/js/jquery.easing.min.js"></script>
	<!-- parallax.js -->
	<script src="assets/js/parallax.js"></script>
	<script src="assets/js/theia-sticky-sidebar.js"></script>

	

	<!-- Custom -->
	<script src="assets/js/custom.js"></script>

	
</body>

</html>