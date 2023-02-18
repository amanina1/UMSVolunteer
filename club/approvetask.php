
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$idtask=$_GET['idtask'];
$verified="1";

$query = "UPDATE volunteertask SET
            verified = '$verified'
            WHERE userid = '$id' and taskid='$idtask'";
     $data = mysqli_query($con,$query);

     if($data){

        echo "<script>alert('Task Completed Approved!');window.location.href='detailstask.php?id=$idtask';</script>";
      }else{

        echo "<script>alert('Not Successfully update an task verified status!');window.location.href='ongoingeventaction.php?id=$id';</script>";
      }
?>