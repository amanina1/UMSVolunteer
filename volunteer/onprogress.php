
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else
$userid=$_SESSION['user_id'];
$id=$_GET['id'];
$eventstatus="3";


$query = "UPDATE task SET
            taskstatus = '$eventstatus'
            WHERE taskid = '$id'";
     $data = mysqli_query($con,$query);


$query23 = "SELECT * FROM volunteertask WHERE taskid='$id' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);
$eventid=$exec_set['eventid'];

$query2 = "UPDATE volunteertask SET
            taskstatus = '$eventstatus'
            WHERE userid = '$userid' and eventid='$eventid'";
     $data2 = mysqli_query($con,$query2);

     if($data2){

        echo "<script>alert('Successfully update task to Completed!');window.location.href='viewtask.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully update an Task status!');window.location.href='viewtask.php?id=$eventid';</script>";
      }
?>