<?php
session_start();

include './themepart/connection.php';
$path = "upload/";
if(isset($_POST['submitbtn']))
{
          
          $pname = $_POST['name'];
          $details = $_POST['details'];
          $price = $_POST['price'];
         
          $catname = $_POST['catname'];
          $file_name = $_FILES['file123']['name'];
          $file_tmp = $_FILES['file123']['tmp_name'];
          
          $q= mysqli_query($connection, "insert into tbl_product(product_name,product_details,product_price,category_id,product_image) values('{$pname}','{$details}','{$price}','{$catname}','{$file_name}')") or die(mysqli_error('Error In Connection'.$connect));
          
          if($q)
          {
              move_uploaded_file($file_tmp, "upload/" . $file_name);
              echo "<script>alert('Product Added');</script>";
          }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Website| Product Insert Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php
  include './themepart/topmenu.php';
  
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
include './themepart/sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="name" required=""class="form-control" id="exampleInputEmail1" placeholder="Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Details</label>
                    <input type="text" name="details" required="" class="form-control" id="exampleInputPassword1" placeholder="Product Details">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="number" name="price" required="" class="form-control" id="exampleInputEmail1" placeholder="Product Price">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">category Name</label>
                    <br/>
                    <?php   
                    $selectcategory = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error("Error In Connection" . $connection));
                        echo "<select name='catname'>";
                        while ($categoryrow = mysqli_fetch_array($selectcategory))
                        {
                                 echo "<option value =' {$categoryrow['category_id']} '>{$categoryrow['category_name']}</option>";
                        }
                                 echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" name="file123" required="" class="form-control" id="exampleInputEmail1" placeholder="Product Image">
                  </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submitbtn"class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Reset</button>
                </div>
              </form>
            </div>
 
          </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

