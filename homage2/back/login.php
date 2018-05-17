<?php 


if (is_null($_POST['login'])) {

		
		header('location:../loginview.php');
	
	}else{
	 
		session_start();
		include 'model.php';
		


	$model = new Model();
	$model->table = "uam";

	$result = $model->select("uam_emailadd = '".$_POST['emailadd']."' AND uam_password = '".$_POST['password']."'");

		
		


	 	if($result[0]['uam_id']==1){
	 			$_SESSION['userid']=$result[0]['uam_id'];
	 			header('location:../admin/admin.php');
	 			
			
	 	}
		elseif($result[0]['uam_id']>1){
			
			$_SESSION['userid']=$result[0]['uam_id'];
			header('location:../indexuser.php');
		

		}
		else {
			
			?>
			 <script type="text/javascript">
       		 alert("The username and password doesnt exist!");
       		 window.location= "../index.php"
       		 </script>
			
		<?php
		}
		
}


?>