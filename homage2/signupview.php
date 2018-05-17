<?php
 
 include_once 'headerview.php';

?>
   
		<div class="agile-login">
	<br>
		<div class="wrapper">
			<h2 ><font color="#343A40">H O M A G E</font> </h2>
			<div class="w3ls-form">
				<form action="back/signup.php" method="POST">
					<label><font color="#343A40">Username</font></label> 
					<input type="text" name="username" placeholder="Enter Username" required/>

					<label><font color="#343A40">Email address</font></label> 
					<input type="email" name="emailadd" placeholder="Enter Email address" required/>

					 <label><font color="#343A40">Password</font></label>
					<input type="password" name="password" placeholder="Enter Password" required />

					 <label><font color="#343A40">Confirm Password</font></label>
					<input type="password" name="cpassword" placeholder="Enter Confirm Password" required />
			
				
					<input type="submit" value="CREATE" name="signup"  />
				</form>
			</div>
			
			
		</div>
		<br>
	</div>
<?php
 
 include_once 'footer.php';

 ?>