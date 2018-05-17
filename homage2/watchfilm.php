<?php include_once 'header.php';?>
<hr>
<br>   
<br>

  <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'homage');

                      $sql = "select * from film where film_id=".$_POST['id'];
                      $result = mysqli_query($conn,$sql);
				
                      
                      while ($row = mysqli_fetch_assoc($result)) {
                          
                        
							
                        ?>

<div class="container">
	<div class="row">
			<div class="col-md-6">
				<br>
				    <video width="1000" height="500" controls>
					<source src=uploads/<?php echo $row['film_dir'];?> type="video/mp4">     
					</video>
					
					<hr>
					<h1>
						<b>

						<?php 
						echo $row['film_name']; 
						
						?>
						</b>
					</h1>
					<hr>
				
					
					<h4>
						<?php
							echo $row['film_synopsis'];
							 
						?>
					</h4>
					<br>
					
					<hr>
					<h5>
						<?php
							echo $row['film_statement'];
							 
						?>
					</h5>
					<br>
					
					<hr>

					<h6>
						Director: <?php echo $row['film_director']; ?>
						<br>
						Writer:   <?php  echo $row['film_writer']; ?>
						<br>
						Production Team: <?php echo $row['film_production']; ?>

					</h6>
					<hr>
					<br>
					<br>

				  <?php
                      }
                    ?>
					

			</div>

		
	</div>
	
</div>
<br>   
  

<?php include_once 'footer.php';?>
