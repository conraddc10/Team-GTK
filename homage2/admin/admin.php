<?php include_once 'headeradmin.php';?>

  
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
     
      <ul class="app-menu">
       
        
		
		
        <li>
            <a class="app-menu__item active" href="admin.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Account Management</span>
            </a>
        </li>
        
         <li>
            <a class="app-menu__item" href="admin2.php">
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
              <h2 class="mb-3">USER'S</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th style="width: 150px;">Account ID</th>
                    <th>Username</th>
                    <th>Email address</th>
                    <th>Password</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'homage');

                      $sql = "select * from uam where not uam_id = 1";
                      $result = mysqli_query($conn,$sql);

                      while ($row = mysqli_fetch_assoc($result)) {
                                                    
                        ?>
                      <tr>
                        <td>
                          <?php echo $row['uam_id']; ?>
                        </td>
                        <td>
                          <?php echo $row['uam_username']; ?>
                        </td>
                        <td>
                          <?php echo $row['uam_emailadd']; ?>
                        </td>
                        <td>
                          <?php echo $row['uam_password']; ?>
                        </td>

                        <td>
                            
                          <button class="btn btn-secondary"  style="width: 100%;" style="color: white;">
                            
                             <a href=updateuser.php?uam_id=<?php echo $row['product_id']; ?> >
                              Update
                              </a>

                          </button>
                          
                        </td>

                        <td>
                         
                            
                            <button class="btn btn-danger" style="width: 100%;">
                            <a style="color: white;" href=deleteuser.php?uam_id=<?php echo $row['uam_id']; ?> >
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


  <?php include_once 'footeradmin.php'; ?>