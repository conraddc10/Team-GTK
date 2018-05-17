<?php
 
 include_once 'header.php';
  include_once 'back/inputcheck.php';
?>
   
<!-- Page Content -->
    <div class="container">
<br>
<br>
<br>
    
      <i> <h1 class="my-4">SHORT FILMS </h1></i>
     <hr>


      <?php

                      $conn = mysqli_connect('localhost', 'root', '', 'homage');

        

    
                        
                      

                      $sql = "SELECT * from film where film_name='".inputchecked($_POST['search'])."'";



                      $result = mysqli_query($conn,$sql);
                    //  unset($_POST['search']);

                      if ($result->num_rows==0) {
                        header('location:searchpagenr.php');
                      }
                       
                       

                      while ($row = mysqli_fetch_assoc($result)) {
                         
                           

                        ?>
      
            
      <div class="row">
        <div class="col-md-6">
          <!-- <a href="#"> -->
            <img width="400px" height="400px" class="img-fluid rounded mb-3 mb-md-0" src=poster/<?php echo $row['film_poster']; ?> >
          <!-- </a> -->
        </div>
        <div class="col-md-5">
          <h2>
            Title:
            &nbsp;
            <?php
             echo $row['film_name'];
            ?>
          </h2>
          <br>
          <br>
          <br>
          <h3>
            Synopsis:
          </h3>
          <br>
          <p>

           <?php echo $row['film_synopsis']; ?> 
          </p>
            <br>
              <hr>
    <form method="POST" action="watchfilm.php" >
            

                
             <button class="btn btn-info" type="submit" name="dir" value=<?php echo $row['film_dir']; ?>> 
             Watch</button>
              <input type="hidden"  name="id" value=<?php echo $row['film_id'] ?>>
             
    </form>
      
          
          
        </div>
      </div>
      <hr>
      <!-- /.row -->
        <?php
       
                      }
                    ?>

<?php
 
 include_once 'footer.php';

 ?>
      
  
      



     
  

      <!-- Pagination -->
      <!-- <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul> -->

    </div>
    <!-- /.container -->
   