
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$eventstatus="3";

$query = "UPDATE event SET
            eventstatus = '$eventstatus'
            WHERE eventid = '$id'";
     $data = mysqli_query($con,$query);

$query2 = "UPDATE joinevent SET
            eventstatus = '$eventstatus'
            WHERE eventid = '$id'";
     $data2 = mysqli_query($con,$query2);

$query3 = "UPDATE volunteertask SET
            statusevent = '$eventstatus'
            WHERE eventid = '$id'";
     $data3 = mysqli_query($con,$query3);


     if($data){

        echo "<script>alert('Event Completed!');window.location.href='completedevent.php';</script>";
      }else{

        echo "<script>alert('Not Successfully update an Event status!');window.location.href='completedeventaction.php?id=$id';</script>";
      }
?>