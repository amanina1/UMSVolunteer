
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

$query = "INSERT INTO joinevent(eventid,userid,eventstatus) VALUES('$id','$userid','$eventstatus')";

$data = mysqli_query($con,$query);




     if($data){

        echo "<script>alert('Successfully Joined an Event!');window.location.href='viewevent.php?id=$id';</script>";
      }else{

        echo "<script>alert('Not Successfully join an Event !');window.location.href='viewevent.php?id=$id';</script>";
      }
?>