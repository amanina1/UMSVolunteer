
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$userid=$_SESSION['user_id'];
$eventstatus="1";

$query23 = "SELECT * FROM task WHERE taskid='$id' ";
$exec23 =  mysqli_query($con,$query23);
$exec_set = mysqli_fetch_array($exec23);

$taskstatus=$exec_set['taskstatus'];
$eventid=$exec_set['eventid'];

$query = "INSERT INTO volunteertask(eventid,taskid,userid,taskstatus,statusevent) VALUES('$eventid','$id','$userid','$taskstatus','$eventstatus')";

$data = mysqli_query($con,$query);


     if($data){

        echo "<script>alert('Successfully assign an task!');window.location.href='viewtask.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully assign an task !');window.location.href='viewtask.php?id=$eventid';</script>";
      }
?>