<?php
  session_start(); 
?>
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
    <title>Upload</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="admin/docs/css/main.css">
  
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar" style="background-color:#dfe6e9"></div>
    <aside class="app-sidebar" style="background-color:#2d3436">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/avatars/chuli.jpg" alt="User Image" style="width: 50%; height: 50%;" style="background-color:#dfe6e9">
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="indexuser.php">
               
                <span class="app-menu__label">Back</span>
            </a>
        </li>
       
     
       
      </ul>
    </aside>
    <main class="app-content">
      <div class="col-md-12" style="background-color:#dfe6e9">
        <form method="POST" enctype="multipart/form-data">
          <div class="tile" style="background-color:#b2bec3">
            <h3 class="tile-title">FILM INFO</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Film name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" required placeholder="Enter Film name" name="film_name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Director </label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" required placeholder="Enter Director name" name="film_director">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Writer </label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" required placeholder="Enter Writer name" name="film_writer">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Synopsis</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" required placeholder="Enter Synopsis" name="film_synopsis"></textarea>
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Film Statement</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" required placeholder="Enter Film Statement" name="film_statement"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Film</label>
                  <div class="col-md-8">
                    <input class="form-control" required type="file" name="file">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" required type="file" name="fileimg">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Production Team </label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" required type="text" placeholder="Enter Production team" name="film_production">
                  </div>
                </div>

            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-12 col-md-offset-3">
                  <button style="width: 150px;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                  <button style="width: 150px;" class="btn btn-secondary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cancel</button>



                </div>
              </div>
            </div>
      
      
      
      
            <?php
                 
             include_once 'back/inputcheck.php';


                $conn = mysqli_connect('localhost', 'root', '', 'homage');
                $targetdirfm = "uploads/";
                $targetdirimg = "poster/";

                if (isset($_POST['film_name']) && isset($_POST['film_director']) && isset($_POST['film_writer']) && isset($_POST['film_synopsis']) && isset($_POST['film_production']) && isset($_POST['film_statement'])) {
                
                  $fname = inputchecked($_POST['film_name']);
                  $fdirector = inputchecked($_POST['film_director']); 
                  $fwriter = inputchecked($_POST['film_writer']); 
                  $fsynopsis = inputchecked($_POST['film_synopsis']);
                  $fstatement = inputchecked($_POST['film_statement']);
                  $fproduction = inputchecked($_POST['film_production']);
                  $fuserid = $_SESSION['userid'];

                  //film upload
                  $filename = basename($_FILES["file"]["name"]);
                  $filename= dirchecked($filename);
                  $targetfilepath = $targetdirfm . $filename;
                  $filetype = pathinfo($targetfilepath, PATHINFO_EXTENSION);

                  

                  //film poster
                  $filenameimg = basename($_FILES["fileimg"]["name"]);
                  $targetfilepathimg = $targetdirimg . $filenameimg;
                  $filetypeimg = pathinfo($targetfilepathimg, PATHINFO_EXTENSION);

                  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilepath) && move_uploaded_file($_FILES["fileimg"]["tmp_name"], $targetfilepathimg)) {
                    $sql = "insert into film values(null,'$fname','$fdirector','$fwriter','$fproduction',
                    '$fsynopsis','$filename','$filenameimg','$fstatement',$fuserid)";
                    if (mysqli_query($conn,$sql)) {
                      ?>
                        <script type="text/javascript">alert("Sucessfully added")</script>
                      <?php
                       // echo $sql;
                    }else{
                      ?>
                        <script type="text/javascript">alert("Failed to Upload, Please try again")</script>
                      <?php
                       // echo $sql;
                    }
                      unset($_POST['film_name']);
                      unset($_POST['film_director']); 
                      unset($_POST['film_writer']);
                      unset($_POST['film_production']);
                      unset($_POST['film_synopsis']);
                      unset($_POST['film_statement']);
                     
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