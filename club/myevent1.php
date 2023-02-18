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

$query23 = "SELECT * FROM event WHERE userid='$userid' and eventstatus='1' and isdelete!='1'";
$exec23 =  mysqli_query($con,$query23);
//$exec_set3 = mysqli_fetch_array($exec23);

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
	 <link href="../assets/css/style_2.css" rel="stylesheet">
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
							<?php include 'menuclub.php';?>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- Blog start here -->
		<section class="blog-page padding-120 home-blog-uhv ">
            <div class="container">
			<a href="createevent.php" class="btn btn-primary">Create An Event </a> <br><br><br><br>

			<a href="myevent.php" class="btn btn-danger" style="background-color:black;">My New Event </a>
			<a href="ongoingevent.php" class="btn btn-danger">On Going Event </a>
			<a href="completedevent.php" class="btn btn-danger">Completed Event </a>
			<div class="section-header text-center">
				<h3>List New Events</h3>
			</div>
                <div class="row">
				
                    <div class="col-lg-20 col-md-12 col-xs-15 sticky-widget">
                    	<?php
                             while($data=mysqli_fetch_array($exec23)){
                        ?>
                        <div class="blog-item">
                            <div class="image">
                                <a href="viewtask.php?id=<?php echo $data['eventid'];?>"><img src="../image_profile/<?php echo $data['eventimage'];?>" alt="Blog image"
                                        class="img-responsive"></a>
                            </div>
                            <!-- image -->
                            <div class="blog-content">
                                <div>
                                    <ul class="post-meta">
                                        <li><a href="#"><span>Date</span><?php echo $data['startdate'];?> - <?php echo $data['enddate'];?></a></li>
                                        <li></span><a href="#">Time : <?php echo $data['starttime'];?> - <?php echo $data['endtime'];?></a></li>
                                        <li></span><a href="#">Location : <?php echo $data['eventlocation'];?></a></li>
                                        <?php
										$eventid_temp=$data['eventid'];
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
                                        <li><span class="icon flaticon-like"></span><a href="#" style="background-color:Red;">New</a></li>
                                    </ul>
                                    <!-- post-meta -->
                                    <div class="content">
                                        <h4><a href="viewtask.php?id=<?php echo $data['eventid'];?>"><?php echo $data['eventname'];?></a></h4>
                                        <p><?php echo $data['eventdesc'];?>
                                        	<br>
											<br>
											Benefits:
											<?php echo $data['eventbenefit'];?>
											<br>
											Fee : <?php if($data['eventfee']!=null){ echo $data['eventfee']; } else{ echo "Free"; }?>
											<br>
                                        </p>
                                        <a href="viewtask.php?id=<?php echo $data['eventid'];?>" class="default-button">View</a>
										<a href="deleteevent.php?id=<?php echo $data['eventid'];?>" onclick="return confirm('Are you sure you want to delete this event?')" class="default-button">Delete Event</a>
										<a href="ongoingeventaction.php?id=<?php echo $data['eventid'];?>" class="default-button" style="background-color:red">Event On Going</a>
                                    </div>
                                    <!-- content -->
                                </div>
                            </div>
                            <!-- blog-content -->
                        </div>
                        <?php
                    	}
                    	?>
                        <!-- blog item -->
                        <!-- <div class="blog-item">
                            <div class="image">
                                <a href="viewtask.html"><img src="../images/blog/blog_post_012.jpg" alt="Blog image"
                                        class="img-responsive"></a>
                            </div>
                            <!- image 
                            <div class="blog-content">
                                <div>
                                    <ul class="post-meta">
                                        <li><a href="#"><span>24</span>December, 2021</a></li>
                                        
                                        <li><span class="icon flaticon-user"></span><a href="#">12 Require</a></li>
                                        <li><span class="icon flaticon-like"></span><a href="#">12 Joined</a></li>
                                     post-meta 
                                    <div class="content">
                                        <h4><a href="viewtask.html">Competely actualze cententrc anstaled base</a></h4>
                                        <p>Completelly actuaze cent centric coloration and idea saharing without
                                            installed an base awesome theme of event aresourcescreative and awesome
                                            event template Completely actuaze cent centric coloration and idea saharing
                                            without installed and basie awesome theme of event aresourcescreative and
                                            awesome event template.</p>
                                        <a href="viewtask.html" class="default-button">View</a>
										<a href="" class="default-button">Delete Event</a>
                                    </div>
                                    <content 
                                </div>
                            </div>
                            blog-content 
                        </div> -->
                        <!-- blog item -->
                        <!-- blog item -->
                        <!-- blog item -->
                        <!-- <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a></li>
                            <li><a href="#">10</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul> -->
                    </div>
                    
                                <!-- sidebar item -->
                    </div>         
					
					 <section class="section dashboard">
      
<div class="row">
        <div class="col-lg-12">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">Recent Events </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
  					            <th scope="col">No.</th>
                        <th scope="col">Event</th>
                        <th scope="col">Date</th>
                        <th scope="col">Club</th>
                        <th scope="col">Name P.I.C.</th>
  					            <th scope="col">Contact</th>
  					            <th scope="col">Volunteer</th>
                        <th scope="col">Status Event</th>
                        <th scope="col">Is Delete</th>
  						          <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      while($data=mysqli_fetch_array($exec23)){
                      ?>
                      <tr>
					              <td><?php echo $i; ?></td>
                        <th scope="row"><a href="#"><?php echo $data['eventname']; ?></a></th>
                        <td><?php echo $data['startdate']; ?> - <?php echo $data['enddate']; ?></td>
                        <?php

                          $userid=$data['userid'];
                          $query2 = "SELECT * FROM user WHERE userid='$userid'";
                          $exec2 =  mysqli_query($con,$query2);
                          $exec_set = mysqli_fetch_array($exec2);

                          $eventid_temp=$data['eventid'];
                          $result3 = "SELECT sum(taskuser)as count FROM `task` WHERE eventid='$eventid_temp' and isdelete!='1'";
                          $test3 = mysqli_query($con,$result3);
                          $test_result_count = mysqli_fetch_assoc($test3)['count'];

                          //$eventid_temp=$data['eventid'];
                          $result31 = "SELECT COUNT(eventid)as count FROM `volunteertask` WHERE eventid='$eventid_temp'";
                          $test31 = mysqli_query($con,$result31);
                          $test_result_count1 = mysqli_fetch_assoc($test31)['count'];


                        ?>
                        <td><?php echo $exec_set['clubname']; ?></td>
						            <td><?php echo $data['eventpic']; ?></td>
                        <td><?php echo $data['eventnompic']; ?></td>
					              <td>(<?php echo $test_result_count; ?>/<?php echo $test_result_count1; ?>)</td>
                        <td><?php if($data['eventstatus']=='1'){ ?><span class="badge bg-success">New Event</span><?php }else if($data['eventstatus']=='2'){ ?><span class="badge bg-warning">On Going</span><?php }else if($data['eventstatus']=='3'){?><span class="badge bg-danger">Completed</span><?php }?></td>
                        <td><?php if($data['isdelete']==null){ ?><span class="badge bg-success">Active</span><?php }else if($data['isdelete']=='1'){ ?><span class="badge bg-danger">Removed</span><?php }?></td>
						            <td>
                          <div class="btn btn-dark btn-sm"><a href="editevent.php"><i class="bx bxs-pencil"></i></a></div>
						              <div class="btn btn-danger btn-sm"><a href="deleteevent.php"><i class="ri-close-fill"></i></a></div>
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
					
                </div>
				
				
				
                <!-- row -->
            </div>
            <!-- container -->
        </section><!-- home-blog -->
		<!-- Blog end here -->



		



		



		<!-- Footer Start here -->
		<footer class="footer-six">
			<div class="overlay">
				<div class="container">
					<h2>UMSVolunteer</h2>
					
					<p>Copyright &copy; 2021. Universiti Malaysia Sabah.</p>
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