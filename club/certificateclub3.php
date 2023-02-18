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
                                    <center><h5>
			                			This certificate is proudly awarded to
			            			</h5></center>
			            			<br></br>
			            			
			                			<center><h5><?php echo $exec_set12['fullname'];?></h5>
			                				<hr style="height:2px;border-width:0;color:gray;background-color:gray; width:70%;">
			                			</center>
			            			<br></br>
			            			<div class="reason">
			                			<center><h5>For your extraordinary service and contributions to your profession in</h5><p></p></center>
			                			<center><h5><?php echo $exec_set1['eventname'];?></h5><p></p><h5><?php echo $exec_set1['startdate'];?> by <?php echo $exec_set121['clubname'];?></h5><p></p></center>
			                			<center><h5>We are delighted in providing this certificate to you.</h5></center>
			            			</div>
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
                        <div class="text-right">
						<br>
                                        <button id="print" class="btn btn-danger" type="button" style="background-color:#2a9d8f"> <span><i class="fa fa-print" ></i> Print</span> </button>
                                    </div>
                    </div>
                </div>
			</div>
		</section>
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

	<!--<script src="../js/print.js"></script>-->
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