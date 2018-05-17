<!-- <?php
//$conn = mysqli_connect('localhost', 'root', '', 'homage');

//$id = $_GET['uam_id'];
//$sql = "DELETE FROM uam where uam_id = '$id'";

//if (mysqli_query($conn,$sql)) {
  ?>
    <script type="text/javascript">
    	alert("sucessfully deleted");
    	window.location.href = "admin.php";
	</script>
  <?php
//}else{
  ?>
    <script type="text/javascript">alert("failed to add, please try again")</script>
  <?php

 // echo $conn->error;
}
?> -->

<?php
	echo $_GET['uam_id'];
	
?>