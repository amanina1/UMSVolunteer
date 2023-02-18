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
  //  $eventfee = ($_POST['eventfee']);
  //  $eventbenefit = ($_POST['eventbenefit']);
    $eventpic = ($_POST['eventpic']);
    $eventnompic = ($_POST['eventnompic']);
    $eventemailpic = ($_POST['eventemailpic']);
    $eventid = ($_POST['eventid']);

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
    //$eventstatus="1";
  
    //insert to table event
      // $query = "INSERT INTO event(userid,eventname,eventdesc,startdate,enddate,starttime,endtime,eventlocation,eventfee,eventbenefit,eventpic,eventnompic,eventemailpic,eventimage) VALUES('$userid','$eventname','$eventdesc','$startdate','$enddate','$starttime','$endtime','$eventlocation','$eventfee','$eventbenefit','$eventpic','$eventnompic','$eventemailpic','$image')";
      // $data = mysqli_query($con,$query);

    //update table event
    if($extension==null){

    	$query = "UPDATE event SET
            userid = '$userid',
            eventname = '$eventname',
            eventdesc = '$eventdesc',
            startdate = '$startdate',
            enddate = '$enddate',
            starttime = '$starttime',
            endtime = '$endtime',
            eventlocation = '$eventlocation',
            eventpic = '$eventpic',
            eventnompic = '$eventnompic',
            eventemailpic = '$eventemailpic'
            WHERE eventid = '$eventid'";
     $data = mysqli_query($con,$query);
     if($data){

        echo "<script>alert('Successfully Update an Event!');window.location.href='myevent.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully Update an Event!');window.location.href='updateevent.php?id=$eventid';</script>";
      }

    }else{
    $query = "UPDATE event SET
            userid = '$userid',
            eventname = '$eventname',
            eventdesc = '$eventdesc',
            startdate = '$startdate',
            enddate = '$enddate',
            starttime = '$starttime',
            endtime = '$endtime',
            eventlocation = '$eventlocation',
            eventpic = '$eventpic',
            eventnompic = '$eventnompic',
            eventemailpic = '$eventemailpic',
            eventimage = '$image'
            WHERE eventid = '$eventid'";
     $data = mysqli_query($con,$query);

     if($data){

        echo "<script>alert('Successfully Update an Event!');window.location.href='myevent.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully Update an Event!');window.location.href='updateevent.php?id=$eventid';</script>";
      }
   }
}

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
			<div class="overlay padding-120">
			
				<div class="container">
				
					<div class="section-header text-center">
						<h3>Update An Event</h3>
						
					</div>
					<div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Modify your event details to update an event</h5>
                    <p class="text-center small"></p>
                  </div>

                  <form class="row g-3 needs-validation" action="updateevent.php" method="POST" enctype="multipart/form-data" novalidate>
				  
				  					<div class="col-12">
                      <label for="yourEmail" class="form-label">Event Name</label>
                      <input type="text" name="eventname" class="form-control" id="yourEmail" value="<?php echo $exec_set['eventname'];?>">
                    </div>
					
										<div class="row mb-3">
		                  <label for="inputPassword" class="col-sm-2 col-form-label">Description of The Event</label>
		                  <div class="col-sm-10">
		                    <textarea class="form-control" style="height: 100px" name="eventdesc"><?php echo $exec_set['eventdesc'];?></textarea>
		                  </div>
		                </div>
					
										<div class="col-md-6">
		                  <label for="inputEmail5" class="form-label">Start Date of The Event</label>
		                  <input type="date" name="startdate" class="form-control" id="inputEmail5" value="<?php echo $exec_set['startdate'];?>">
		                </div>
		                <div class="col-md-6">
		                  <label for="inputPassword5" class="form-label">Until</label>
		                  <input type="date" name="enddate" class="form-control" id="inputPassword5" value="<?php echo $exec_set['enddate'];?>">
		                </div>
					
										<div class="col-md-6">
		                  <label for="inputEmail5" class="form-label">Start Time of The Event</label>
		                  <input type="time" name="starttime" class="form-control" id="inputEmail5" value="<?php echo $exec_set['starttime'];?>">
		                </div>
		                <div class="col-md-6">
		                  <label for="inputPassword5" class="form-label">Until</label>
		                  <input type="time" name="endtime" class="form-control" id="inputPassword5" value="<?php echo $exec_set['endtime'];?>">
		                </div>
					
                    <div class="col-12">
                      <label for="yourName" class="form-label">Location</label>
                      <input type="text" name="eventlocation" class="form-control" id="yourName" value="<?php echo $exec_set['eventlocation'];?>">
                    </div>

               <!--     <div class="col-12">
                      <label for="yourName" class="form-label">Fee</label>
                      <input type="text" name="eventfee" class="form-control" id="yourName" value="<//?php echo $exec_set['eventfee'];?>">
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Benefits in The Event</label>
                      <input type="text" name="eventbenefit" class="form-control" id="yourName" value="<//?php echo $exec_set['eventbenefit'];?>">
                    </div> -->
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Name of Person in Charge</label>
                      <input type="text" name="eventpic" class="form-control" id="yourName" value="<?php echo $exec_set['eventpic'];?>">
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Phone Number of Person in Charge</label>
                      <input type="text" name="eventnompic" class="form-control" id="yourName" value="<?php echo $exec_set['eventnompic'];?>">
                    </div>
					
										<div class="col-12">
                      <label for="yourName" class="form-label">Email of Person in Charge</label>
                      <input type="email" name="eventemailpic" class="form-control" id="yourName" value="<?php echo $exec_set['eventemailpic'];?>">
                      <div class="invalid-feedback">Please, enter a valid email address!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Image Event <a style="color: red;">*<?php echo $exec_set['eventimage'];?>*</a></label>
                      <input type="file" name="image" class="form-control" id="yourName" accept="image/*pdf/*" capture value="<?php echo $exec_set['eventimage'];?>">
                    </div>
                    <input type="hidden" name="eventid" class="form-control" id="yourName" value="<?php echo $exec_set['eventid'];?>">
                    <div class="col-12">
                      <input class="btn btn-primary w-100" name="submit" type="submit" value="Update An Event">
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