<?php
if(isset($_POST['submit'])){
    
    $comment = ($_POST['comment']);
    $event_id2 = ($_POST['event_id2']);
    $userid2 = ($_POST['userid2']);
    
     
	  $query1 = "INSERT INTO forum(userid,eventid,forumchat) VALUES('$userid2','$event_id2','$comment')";
      $data = mysqli_query($con,$query1);


      if($data){

        echo "<script>alert('Successfully add an comment!');window.location.href='forumvol2.php?userid=$userid2&eventid=$event_id2';</script>";
      }else{

        echo "<script>alert('Not Successfully add an comment!');window.location.href='forumvol2.php?userid=$userid2&eventid=$event_id2';</script>";
      }

}
?>