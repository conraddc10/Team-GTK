<?php
 
 include_once 'headeradmin.php';

?>
 
 


     <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
     
      <ul class="app-menu">
       
        
    
    
        <li>
            <a class="app-menu__item " href="admin.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Account Management</span>
            </a>
        </li>
        
         <li>
            <a class="app-menu__item active" href="admin2.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Film Mangement</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="../back/logout.php">
              <i class="app-menu__icon fa fa-dashboard"></i>
              <span class="app-menu__label">
                Logout
              </span>
            </a>
        </li>
      </ul>
    </aside> 

  
    <main class="app-content">
      <!--TABLE-->      
      <div class="tile mb-4">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="mb-3">FILM'S</h2>
            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col-lg-12" >
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th style="width: 150px;">Image</th>
                    <th>Article ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Header</th>
                    <th>Remarks</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'webprog');

                      $sql = "select * from product";
                      $result = mysqli_query($conn,$sql);

                      while ($row = mysqli_fetch_assoc($result)) {
                          $imageurl = 'uploads/' . $row['img'];

                        ?>
                      <tr>

                        <td>
                          <img src="<?php echo $imageurl; ?>" style="width: 100%; height: 150px;">
                        </td>
                        <td>
                          <?php echo $row['product_id'] ?>
                        </td>
                        <td>
                          <?php echo $row['name']; ?>
                        </td>
                        <td>
                          <?php echo $row['description']; ?>
                        </td>
                        <td>
                          <?php echo $row['price'] ; ?>
                        </td>
                        <td>
                          <?php echo $row['qty']; ?>
                        </td>
                        <td>
                          <button class="btn btn-primary" style="width: 100%;">
                            <a style="color: white;" href=updateproduct.php?product_id=<?php echo $row['product_id']; ?> >
                              Update
                            </a>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-warning" style="width: 100%;">
                            <a style="color: white;" href=removeproduct.php?product_id=<?php echo $row['product_id']; ?> >
                              Delete
                            </a>
                          </button>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </main>

  

<?php
 
 include_once 'footeradmin.php';

 ?>

  
    

