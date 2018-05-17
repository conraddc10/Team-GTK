<?php 


 
 




session_start();

if (is_null($_POST['signup'])) {
	

		header('location:../index.html');

	}else{

		
		include 'model.php';
	    $model = new Model();


		if ( $_POST['password']!= $_POST['cpassword']) {
		?>	
 			<script type="text/javascript">
       		 alert("The password you input doesnt match!");
       		 window.location= "../signupview.php"
       		 </script>
       	<?php

		}else{

		$_SESSION['user_name'] = $_POST['username'];
		
				
			$model->table = "uam";
			$model->insert([

		'uam_username' => $_POST['username'],
		'uam_emailadd' => $_POST['emailadd'],
		'uam_password' => $_POST['password']
		

		]);


			
			

			header('location:../indexuser.php');



			
		}
	}

		

	

	

 ?>