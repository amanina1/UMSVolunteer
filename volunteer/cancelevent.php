
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$iscancel="1";

$query2 = "UPDATE joinevent SET
            iscancel = '$iscancel'
            WHERE id = '$id'";
     $data2 = mysqli_query($con,$query2);

     if($data2){

        echo "<script>alert('Successfully Cancel this event!');window.location.href='listeventjoined.php';</script>";
      }else{

        echo "<script>alert('Not Successfully Cancel this event!');window.location.href='listeventjoined.php';</script>";
      }
?>