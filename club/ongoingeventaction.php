
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$eventstatus="2";

$query = "UPDATE event SET
            eventstatus = '$eventstatus'
            WHERE eventid = '$id'";
     $data = mysqli_query($con,$query);

$query2 = "UPDATE joinevent SET
            eventstatus = '$eventstatus'
            WHERE eventid = '$id'";
     $data2 = mysqli_query($con,$query2);

$query3 = "UPDATE volunteertask SET
            eventstatus = '$eventstatus'
            WHERE eventid = '$id'";
     $data3 = mysqli_query($con,$query3);

     if($data){

        echo "<script>alert('Event On Going!');window.location.href='ongoingevent.php';</script>";
      }else{

        echo "<script>alert('Not Successfully update an Event status!');window.location.href='ongoingeventaction.php?id=$id';</script>";
      }
?>