
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
$isdelete="1";

$query = "UPDATE task SET
            isdelete = '$isdelete'
            WHERE taskid = '$id'";
     $data = mysqli_query($con,$query);

$query23 = "SELECT * FROM task WHERE taskid ='$id'";
$exec232 =  mysqli_query($con,$query23);
$query_exec=mysqli_fetch_array($exec232);

$eventid=$query_exec['eventid'];


     if($data){

        echo "<script>alert('Successfully delete an task!');window.location.href='viewtask.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully delete an task!');window.location.href='viewtask.php?id=$eventid';</script>";
      }
?>