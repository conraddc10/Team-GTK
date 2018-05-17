<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="admin/docs/css/main.css">
  
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php 

      $conn = mysqli_connect('localhost', 'root', '', 'webprog');

      $id = $_GET['product_id'];
      $sql = "select * from product where product_id = '$id'" ;
      $result = mysqli_query($conn,$sql);
      
      $row = mysqli_fetch_assoc($result);

      $price = $row['price'];
      $description = $row['description'];
      $qty = $row['qty'];

    ?>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <!-- Sidebar toggle button-->
      <a >
        Administration Interface
      </a>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/avatars/chuli.jpg" alt="User Image" style="width: 50%; height: 50%;">
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="admin_index.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Articles</span>
            </a>
        </li>
        
		
		
        <li>
            <a class="app-menu__item" href="customers.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="login.php">
              <i class="app-menu__icon fa fa-dashboard"></i>
              <span class="app-menu__label">
                Logout
              </span>
            </a>
        </li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data">
          <div class="tile">
            <h3 class="tile-title">Update An Article</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Article Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" required placeholder="Enter new article name" name="pro_name" value = "<?php echo $row['name']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Headers</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" required placeholder="Enter new header" name="pro_price" value = "<?php echo $row['price']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Description</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" required placeholder="Enter new description" name="pro_description"><?php echo $row['description']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" required type="file" name="file">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Remarks</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" required type="text" placeholder="Enter new Remarks." name="pro_qty" value = "<?php echo $row['qty']; ?>">
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-12 col-md-offset-3">
                  <button style="width: 150px;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                  <button style="width: 150px;" class="btn btn-secondary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                    <a style="color: white;" href="admin_index.php">
                      Cancel
                    </a>
                  </button>
                </div>
              </div>
            </div>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'webprog');
                $targetdir = "uploads/";

                if (isset($_POST['pro_name']) && isset($_POST['pro_price']) && isset($_POST['pro_description'])) {
                  
                  $name = $_POST['pro_name']; 
                  $price = $_POST['pro_price']; 
                  $description = $_POST['pro_description']; 
                  $qty = $_POST['pro_qty'];
                 
                  $filename = basename($_FILES["file"]["name"]);
                  $targetfilepath = $targetdir . $filename;
                  $filetype = pathinfo($targetfilepath, PATHINFO_EXTENSION);

                  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilepath)) {
                    $sql = "update product set name = '$name', img = '$filename', description = '$description', price = '$price', qty = '$qty' where product_id = '$id'";
                    if (mysqli_query($conn,$sql)) {
                      ?>
                        <script type="text/javascript">
                          alert("sucessfully Updated");
                          window.location.href = "admin_index.php";
                        </script>

                      <?php
                 
                    }else{
                      ?>
                        <script type="text/javascript">alert("failed to add, please try again")</script>
                      <?php
                    }
                      unset($_POST['pro_name']);
                      unset($_POST['pro_price']); 
                      unset($_POST['pro_description']);
                      unset($_POST['prxo_qty']);
                      unset($_POST);
                  }
                }

                mysqli_close($conn);
            ?>
          </div>
        </form>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="admin/docs/js/jquery-3.2.1.min.js"></script>
    <script src="admin/docs/js/popper.min.js"></script>
    <script src="admin/docs/js/bootstrap.min.js"></script>
    <script src="admin/docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="admin/docs/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="admin/docs/js/plugins/chart.js"></script>
    <script type="text/javascript">
    </script>
  </body>
</html>