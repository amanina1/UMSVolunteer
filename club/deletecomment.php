
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

$id=$_GET['id'];
//2=delete
$status="2";

$query = "UPDATE forum SET
            status = '$status'
            WHERE forumid = '$id'";
     $data = mysqli_query($con,$query);
	 
$query2331 = "SELECT * FROM forum WHERE forumid='$id'";
$exec2331 =  mysqli_query($con,$query2331);
$exec_set21 = mysqli_fetch_array($exec2331);

$eventid3=$exec_set21['eventid'];

     if($data){

        echo "<script>alert('Comment deleted');window.location.href='forumclub2.php?eventid3=$eventid3';</script>";
      }else{

        echo "<script>alert('Not Successfully delete comment!');window.location.href='forumclub2.php?eventid3=$eventid3';</script>";
      }
?>