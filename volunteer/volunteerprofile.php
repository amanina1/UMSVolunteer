<!DOCTYPE html>
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

    $profile="-$username-";
    $filename   = uniqid() . $profile.  // 5dab1961e93a7_1571494241
    $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg
    $image   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
    $source       = $_FILES["image"]["tmp_name"];
    $destionation = "../image_profile/" . $image;
    move_uploaded_file( $source, $destionation );

    $matricnum = ($_POST['matricnum']);

    $fullname = ($_POST['fullname']);
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $confirm_password = ($_POST['password']);
    $email = ($_POST['email']);
    $phonenum = ($_POST['phonenum']);
    
    
    //update table event
    if($extension==null){

      $query = "UPDATE user SET
            username = '$username',
            password = '$password',
            confirm_password = '$password',
            fullname = '$fullname',
            email = '$email',
            matricnum = '$matricnum',
            phonenum = '$phonenum'
            WHERE userid = '$userid'";
     $data = mysqli_query($con,$query);
     if($data){

        echo "<script>alert('Successfully Update an profile!');window.location.href='volunteerprofile.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Update an profile!');window.location.href='volunteerprofile.php';</script>";
      }

    }else{

    $query = "UPDATE user SET
            username = '$username',
            password = '$password',
            confirm_password = '$password',
            fullname = '$fullname',
            email = '$email',
            matricnum = '$matricnum',
            phonenum = '$phonenum',
            image = '$image'
            WHERE userid = '$userid'";
     $data = mysqli_query($con,$query);

     if($data){

        echo "<script>alert('Successfully Update an profile!');window.location.href='volunteerprofile.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Update an profile!');window.location.href='volunteerprofile.php';</script>";
      }
   }
}


$query23 = "SELECT * FROM user WHERE userid='$userid' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);

?>
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

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style_2.css" rel="stylesheet">

 
</head>

<body style="background-color:#264653;">

  <!-- ======= Header ======= -->
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
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
    <!-- End Page Title -->

    <section class="section profile">
	<div class="overlay" style="background-color:#264653;">
	<div class="container">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../image_profile/<?php echo $exec_set['image'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $exec_set['fullname'];?></h2>
              <h3><?php echo $exec_set['matricnum'];?></h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                

                

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['fullname'];?></div>
                  </div>
				  
				  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Matric Num.</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['matricnum'];?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['username'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['email'];?></div>
                  </div>
				  
				  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php if($exec_set['gender']=='1'){ ?>Male <?php }else if($exec_set['gender']=='2'){?>Female <?php }?></div>
                  </div>
				  
				  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date Birth</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['datebirth'];?></div>
                  </div>
				  
				  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exec_set['phonenum'];?></div>
                  </div>
	

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="volunteerprofile.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../image_profile/<?php echo $exec_set['image'];?>" alt="Profile">
                        <div class="pt-2">
                          <input type="file" name="image" class="form-control" id="yourName" accept="image/*pdf/*" capture>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullname" type="text" class="form-control" id="fullName" value="<?php echo $exec_set['fullname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Matric Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="matricnum" type="text" class="form-control" id="company" value="<?php echo $exec_set['matricnum'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="company" value="<?php echo $exec_set['username'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="Job" value="<?php echo $exec_set['password'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="Country" value="<?php echo $exec_set['email'];?>">
                      </div>
                    </div>
					
					          <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phonenum" type="text" class="form-control" id="company" value="<?php echo $exec_set['phonenum'];?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" name="submit" class="btn btn-primary" style="background-color:#2a9d8f;" value="Save Changes">
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                

                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div></div>
	  </div>
    </section>


  <!-- ======= Footer ======= -->
  <footer class="footer-six">
			<div class="padding-120" style="background-color:#e71d36;"  >
				<div class="container" >
					
					
					<p>UMSVolunteer Copyright &copy; Universiti Malaysia Sabah.</p>
				</div>
			</div>
		</footer><!-- End Footer -->

  

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
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