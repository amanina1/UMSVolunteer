
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$isdelete="1";

$query = "UPDATE user SET
            isdelete = '$isdelete'
            WHERE userid = '$id'";
     $data = mysqli_query($con,$query);


     if($data){

        echo "<script>alert('Successfully delete an task!');window.location.href='club.php';</script>";
      }else{

        echo "<script>alert('Not Successfully delete an task!');window.location.href='club.php';</script>";
      }
?>