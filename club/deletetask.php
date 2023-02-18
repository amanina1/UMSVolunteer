
<?php include '../includes/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
session_start();
if(!isset($_SESSION['valid_user']))
    header('Location:../logout.php');
else

    $id=$_GET['id'];
    $isdelete="1";

    $query23 = "SELECT * FROM task WHERE taskid='$id' ";
    $exec23 =  mysqli_query($con,$query23);
    $exec_set = mysqli_fetch_array($exec23);

    $eventid=$exec_set['eventid'];

    $query = "UPDATE task SET
            isdelete = '$isdelete'
            WHERE taskid = '$id'";
     $data = mysqli_query($con,$query);

     if($data){

        echo "<script>alert('Successfully delete an Event!');window.location.href='viewtask.php?id=$eventid';</script>";
      }else{

        echo "<script>alert('Not Successfully delete an Event!');window.location.href='viewtask.php?id=$eventid';</script>";
      }
?>