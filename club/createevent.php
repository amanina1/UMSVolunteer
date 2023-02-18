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
    $eventdesc = ($_POST['eventdesc']);
    //date start and end
    $startdate = $_POST['startdate'];
    $startdate2 = date("d-m-Y", strtotime($startdate));
    $enddate = $_POST['enddate'];
    $enddate2 = date("d-m-Y", strtotime($enddate));
    //time start and end
    $starttime = $_POST['starttime'];
		$starttime2 = date('h:i A', strtotime($starttime));
		$endtime = $_POST['endtime'];
		$endtime2 = date('h:i A', strtotime($endtime));

    $eventlocation = ($_POST['eventlocation']);
 //   $eventfee = ($_POST['eventfee']);
  //  $eventbenefit = ($_POST['eventbenefit']);
    $eventpic = ($_POST['eventpic']);
    $eventnompic = ($_POST['eventnompic']);
    $eventemailpic = ($_POST['eventemailpic']);
    $temp_event="$username".rand();

    //event image
   	$profile="-$username-$eventname-";
    $filename   = uniqid() . $profile.  // 5dab1961e93a7_1571494241
    $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg
    $image   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

    $source       = $_FILES["image"]["tmp_name"];
    $destionation = "../image_profile/" . $image;
    move_uploaded_file( $source, $destionation );

    //event status
    //1=new
    //2=on going
    //3=finish
    $eventstatus="1";
  
    //insert to table event
      $query = "INSERT INTO event(userid,eventname,eventdesc,startdate,enddate,starttime,endtime,eventlocation,eventpic,eventnompic,eventemailpic,eventimage,eventstatus,temp_event) VALUES('$userid','$eventname','$eventdesc','$startdate','$enddate','$starttime','$endtime','$eventlocation','$eventpic','$eventnompic','$eventemailpic','$image','$eventstatus','$temp_event')";
      $data = mysqli_query($con,$query);


      $query232 = "SELECT * FROM event WHERE temp_event='$temp_event'";
			$exec232 =  mysqli_query($con,$query232);
			$exec_set2 = mysqli_fetch_array($exec232);

			$eventid=$exec_set2['eventid'];
			$eventstatus="1";
			$temp_join="1";

			$query1 = "INSERT INTO joinevent(eventid,eventstatus,temp_join) VALUES('$eventid','$eventstatus','$temp_join')";
      $data1 = mysqli_query($con,$query1);


      if($data){

        echo "<script>alert('Successfully Create an Event!');window.location.href='myevent.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Create an Event!');window.location.href='createevent.php';</script>";
      }

}
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
						<a class="navbar-brand" href="index.html"><img src="../images/logoums.png" alt="logo" 
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
						<h3 style="color:white">Create An Event</h3>
						
					</div>
					<div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Enter your event details to create an event</h5>
                    <p class="text-center small"></p>
                  </div>

                  <form class="row g-3 needs-validation" action="createevent.php" method="POST" enctype="multipart/form-data" >
				  
				  					<div class="col-12">
                      <label for="yourEmail" class="form-label">Event Name</label>
                      <input type="text" name="eventname" class="form-control" id="yourEmail" required>
                    </div>
					
										<div class="row mb-3">
		                  <label for="inputPassword" class="col-sm-2 col-form-label">Description of The Event</label>
		                  <div class="col-sm-10">
		                    <textarea class="form-control" style="height: 100px" name="eventdesc"></textarea>
		                  </div>
		                </div>
					
										<div class="col-md-6">
		                  <label for="inputEmail5" class="form-label">Start Date of The Event</label>
		                  <input type="date" name="startdate" class="form-control" id="inputdate">
		                </div>
		                <div class="col-md-6">
		                  <label for="inputPassword5" class="form-label">Until</label>
		                  <input type="date" name="enddate" class="form-control" id="inputdate2">
		                </div>
					
						<div class="col-md-6">
		                  <label for="inputEmail5" class="form-label">Start Time of The Event</label>
		                  <input type="time" name="starttime" class="form-control" id="inputEmail5">
		                </div>
		                <div class="col-md-6">
		                  <label for="inputPassword5" class="form-label">Until</label>
		                  <input type="time" name="endtime" class="form-control" id="inputPassword5">
		                </div>
					
                    <div class="col-12">
                      <label for="yourName" class="form-label">Location</label>
                      <input type="text" name="eventlocation" class="form-control" id="yourName" required>
                    </div>

                <!--    <div class="col-12">
                      <label for="yourName" class="form-label">Fee</label>
                      <input type="text" name="eventfee" class="form-control" id="yourName">
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Benefits in The Event</label>
                      <input type="text" name="eventbenefit" class="form-control" id="yourName" required>
                    </div>
					
					-->
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Name of Person in Charge</label>
                      <input type="text" name="eventpic" class="form-control" id="yourName" required>
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Phone Number of Person in Charge</label>
                      <input type="text" name="eventnompic" class="form-control" id="yourName" required>
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Email of Person in Charge</label>
                      <input type="email" name="eventemailpic" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter a valid email address!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Image Event</label>
                      <input type="file" name="image" class="form-control" id="yourName" accept="image/*pdf/*" capture required>
                    </div>
                    <div class="col-12">
                      <input class="btn btn-primary w-100" style="background-color:#2a9d8f" name="submit" type="submit" value="Create An Event">
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
	
	<script type="text/javascript">
		$(function(){
			var dtToday = new Date();
		 
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
			 day = '0' + day.toString();
			var maxDate = year + '-' + month + '-' + day;
			$('#inputdate').attr('min', maxDate);
		});
		$(function(){
			var dtToday = new Date();
		 
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
			 day = '0' + day.toString();
			var maxDate = year + '-' + month + '-' + day;
			$('#inputdate2').attr('min', maxDate);
		});
	</script>

	
</body>

</html>