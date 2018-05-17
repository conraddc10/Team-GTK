<?php
    session_start();

?>


      
  <!-- Page Content -->
    <div class="container">
<br>
<br>
<br>
<br>

 <div class="col-md-12">
    <i> <h1 class="my-4">SHORT FILMS </h1></i>
      
     <hr>



      <?php
                      $userid = $_SESSION['userid'];

                      $conn = mysqli_connect('localhost', 'root', '', 'homage');

                      $sql = "select * from film";
                      $result = mysqli_query($conn,$sql);

                      while ($row = mysqli_fetch_assoc($result)) {
                          $postid = $row['film_id'];
                          $type = -1;


                            // Checking user status
                    $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE like_uamid=".$userid." and like_filmid=".$postid;

                    
                    $status_result = mysqli_query($conn,$status_query);
                    $status_row = mysqli_fetch_array($status_result);
                    $count_status = $status_row['cntStatus'];
                    if($count_status > 0){
                        $type = $status_row['type'];
                    }

                    //Count post total likes and unlikes
                    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and like_filmid=".$postid;
                    $like_result = mysqli_query($conn,$like_query);
                    $like_row = mysqli_fetch_array($like_result);
                    $total_likes = $like_row['cntLikes'];

                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and like_filmid=".$postid;
                    $unlike_result = mysqli_query($conn,$unlike_query);
                    $unlike_row = mysqli_fetch_array($unlike_result);
                    $total_unlikes = $unlike_row['cntUnlikes'];

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
            

                
             <button class="btn btn-info" type="submit" name="id" value=<?php echo $row['film_id']; ?>> 
             Watch
            </button>
             
             
    </form>

         <div class="post">
                        <!-- <h1><?php echo $title; ?></h1> -->
                        <div class="post-text">
                            <!-- <?php echo $content; ?> -->
                        </div>
                        <div class="post-action">

                            <input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                            <input type="button" value="Unlike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)

                        </div>
                    </div>
      
          
          
        </div>
      </div>
      <hr>
      <!-- /.row -->
        <?php
                      }
                    ?>
      



     
  

      <!-- Pagination -->
    <!--   <ul class="pagination justify-content-center">
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
   