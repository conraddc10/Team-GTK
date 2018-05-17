<?php
 
 include_once 'headerview.php';
 //require_once "config.php";
 



?>

   <br>
	<div class="agile-login">
	<br>
		<div class="wrapper">
			<h2 ><font color="#343A40">H O M A G E</font> </h2>
			<div class="w3ls-form">
				<form action="back/login.php" method="POST">
					<label><font color="#343A40">Email address</font></label> 
					
					<input type="email" name="emailadd" placeholder="Enter Email address" required/>
					 <label><font color="#343A40">Password</font></label>
					
					<input type="password" name="password" placeholder="Enter Password" required />
				
					<a href="signupview.php" class="cna">create new account?</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <div class="btn-group-vertical">
					    <input type="submit"  name="login" value="login" class="btn btn-lg" />

						<input onclick="window.location='<?php session_unset();  echo $loginURL;  ?>'"   name="loginwithgoogle" class="btn btn-danger btn-lg" value="Sign in with Google" />
					 </div>
					
				</form>
			</div>
			
			
		</div>
		<br>
		
	</div>
<?php
 
 include_once 'footer.php';

 ?>

