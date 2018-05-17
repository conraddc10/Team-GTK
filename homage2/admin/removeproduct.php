<?php
$conn = mysqli_connect('localhost', 'root', '', 'webprog');

$id = $_GET['product_id'];
$sql = "DELETE FROM product where product_id = '$id'";

if (mysqli_query($conn,$sql)) {
  ?>
    <script type="text/javascript">
    	alert("sucessfully deleted");
    	window.location.href = "admin_index.php";
	</script>
  <?php
}else{
  ?>
    <script type="text/javascript">alert("failed to add, please try again")</script>
  <?php

  echo $conn->error;
}
?>