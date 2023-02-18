<!DOCTYPE html>
<html lang="en">
<?php 

include 'includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();


if(isset($_POST['submit'])){
    $email = ($_POST['email']);
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $confirm_password = ($_POST['confirm_password']);
    $fullname = ($_POST['fullname']);
    $matricnum = ($_POST['matricnum']);
    $ic = ($_POST['ic']);
    $gender = ($_POST['gender']);
    $date = $_POST['date'];
    $birthdate = date("d-m-Y", strtotime($date));
    $phonenum = ($_POST['phonenum']);
    
    $role=3;

    $profile="-$username-club-";
    $filename   = uniqid() . $profile.  // 5dab1961e93a7_1571494241
    $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg
    $image   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

    $source       = $_FILES["image"]["tmp_name"];
    $destionation = "image_profile/" . $image;
    move_uploaded_file( $source, $destionation );
  
    //insert to table user
    if($password==$confirm_password){

      $query = "INSERT INTO user(username,password,confirm_password,fullname,email,ic,matricnum,gender,datebirth,phonenum,role,image) VALUES('$username','$password','$confirm_password','$fullname','$email','$ic','$matricnum','$gender','$birthdate','$phonenum','$role','$image')";
      $data = mysqli_query($con,$query);

      if($data){

        echo "<script>alert('Successfully Register Volunteer!');window.location.href='index.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Register');window.location.href='registervolunteer.php';</script>";
      }

    }else{

      echo "<script>alert('Password Not Match! Please Try Again Thanks!');window.location.href='registervolunteer.php';</script>";
    }
    
      
    
  }

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register Volunteer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style_2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-color:#264653;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="images/logoums.png" alt="">
                  <span class="d-none d-lg-block" style="color:white;"> UMSVolunteer</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Volunteer Account</h5>
                    <p class="text-center small">Enter your details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="registervolunteer.php" method="POST" enctype="multipart/form-data" novalidate>
				  
				            <div class="col-12">
                      <label for="yourEmail" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
					
					         <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter a valid Username.</div>
                      </div>
                    </div>
					
					         <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" pattern=".{6,}" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your Password!</div>
                    </div>
					
					         <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" pattern=".{6,}" id="yourPassword" required>
                      <div class="invalid-feedback">Please confirm your Password!</div>
                    </div>
					
                    <div class="col-12">
                      <label for="yourName" class="form-label">Full Name</label>
                      <input type="text" name="fullname" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Full Name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Matric Number</label>
                      <input type="text" name="matricnum" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Matric Number!</div>
                    </div>
					
					          <div class="col-12">
                      <label for="yourName" class="form-label">IC Number</label>
                      <input type="text" name="ic" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your IC Number!</div>
                    </div>
					
					          <div class="col-12">
                      <label for="yourName" class="form-label">Gender</label>
                      
                    <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="gender" required>
                      <option selected>Open this select menu</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                     
                    </select>
                    </div>
                    </div>
		
					          <div class="col-12">
                      <label for="yourName" class="form-label">Date of Birth</label>
                      <input type="date" name="date" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Date of Birth!</div>
                    </div>
					
					          <div class="col-12">
                      <label for="yourName" class="form-label">Phone Number</label>
                      <input type="text" name="phonenum" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Phone Number!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Image</label>
                      <input type="file" name="image" class="form-control" id="yourName" accept="image/*pdf/*" capture required>
                      <div class="invalid-feedback">Please, enter your image!</div>
                    </div>
                    <div class="col-12">
                      <input class="btn btn-primary w-100" style="background-color:#2a9d8f;" name="submit" type="submit" value="Create Account">
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Copyright © 2022. Universiti Malaysia Sabah.
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>