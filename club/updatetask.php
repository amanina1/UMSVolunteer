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

    $eventname = ($_POST['eventname']);
    $taskname = ($_POST['taskname']);
    //date start and end
    $datetask = $_POST['datetask'];
    $datetask2 = date("d-m-Y", strtotime($datetask));
    //time start and end
    $starttimetask = $_POST['starttimetask'];
		$starttimetask2 = date('h:i A', strtotime($starttimetask));
		$endtimetask = $_POST['endtimetask'];
		$endtimetask2 = date('h:i A', strtotime($endtimetask));

    $taskuser = ($_POST['taskuser']);
    $taskid = ($_POST['taskid']);
    $eventid = ($_POST['eventid']);
    $taskstatus = ($_POST['taskstatus']);
    //1=pending
    //2=assign
    //3=completed
    //$taskstatus="1";
  
    //update to table task
      $query = "UPDATE task SET
            taskname = '$taskname',
            datetask = '$datetask',
            starttimetask = '$starttimetask',
            endtimetask = '$endtimetask',
            taskuser = '$taskuser',
            taskstatus = '$taskstatus'
            WHERE taskid = '$taskid'";
      $data = mysqli_query($con,$query);

      if($data){

        echo "<script>alert('Successfully update an Task!');window.location.href='viewtask.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully update an Task!');window.location.href='updatetask.php?id=$taskid';</script>";
      }

}
$id=$_GET['id'];
$query23 = "SELECT * FROM task WHERE taskid='$id' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);
$eventid=$exec_set['eventid'];
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
						<h3 style="color:white">Update An Task</h3>
						
					</div>
					<div class="card mb-3">

           	<div class="card-body">
           		<a href="viewtask.php?id=<?php echo $eventid; ?>" class="default-button" style="color:blue;">⬅View Task</a>
              <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Enter your task details to update an task</h5>
                    <p class="text-center small"></p>
              </div>

              <form class="row g-3 needs-validation" action="updatetask.php" method="POST" novalidate>
				  			<div class="col-12">
                  <label for="yourEmail" class="form-label">Event Name</label>
                  <input type="text" name="eventname" class="form-control" id="yourEmail" value="<?php echo $exec_set['eventname'];?>" readonly>
                </div>

				  			<div class="col-12">
                  <label for="yourEmail" class="form-label">Task Name</label>
                  <input type="text" name="taskname" class="form-control" id="yourEmail" value="<?php echo $exec_set['taskname'];?>">
                </div>
					
								<div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Date of The Task</label>
                  <input type="date" name="datetask" class="form-control" id="yourEmail" value="<?php echo $exec_set['datetask'];?>">
                </div>
								<br><br>
								<div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Time of The Task</label>
                  <input type="time" name="starttimetask" class="form-control" id="inputEmail5" value="<?php echo $exec_set['starttimetask'];?>">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Until</label>
                  <input type="time" name="endtimetask" class="form-control" id="inputPassword5" value="<?php echo $exec_set['endtimetask'];?>">
                </div>
					
                <div class="col-12">
                  <label for="yourName" class="form-label">Require How Many Volunteer</label>
                  <input type="text" name="taskuser" class="form-control" id="yourName" value="<?php echo $exec_set['taskuser'];?>">
                   <div class="invalid-feedback">Please, enter your name!</div>
               	</div>
               	<div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Event Status</label>
                  <select class="form-control" name="taskstatus" >
                    <option <?php if($exec_set['taskstatus']=="1"){ ?>selected="selected"<?php } ?> value="1" >Pending</option>
                    <option <?php if($exec_set['taskstatus']=="2"){ ?>selected="selected"<?php } ?>value="2" >Assign</option>
                    <option <?php if($exec_set['taskstatus']=="3"){ ?>selected="selected"<?php } ?>value="1" >Completed</option>
                  </select>
                </div>
               	<input type="hidden" name="taskid" class="form-control" id="yourName" value="<?php echo $exec_set['taskid']; ?>">
               	<input type="hidden" name="eventid" class="form-control" id="yourName" value="<?php echo $exec_set['eventid']; ?>">
                <div class="col-12">
                  <input class="btn btn-primary w-100" style="background-color:#2a9d8f" type="submit" name="submit" value="Update a Task">
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