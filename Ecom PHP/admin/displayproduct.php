<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Website | DataTables</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <?php
            include './themepart/sidebar.php';
            ?>
            <!-- Main Sidebar Container -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Product DataTables</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Product DataTables</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        include './themepart/connection.php';
                        if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query = mysqli_query($connection, "delete from tbl_product where product_id='{$id}'") 
                    or die(mysqli_error($connection));
                    
                }
                        $query =" SELECT
    `tbl_product`.`product_id`
    , `tbl_product`.`product_name`
    , `tbl_category`.`category_name`
    , `tbl_product`.`product_details`
    , `tbl_product`.`product_price`
    , `tbl_product`.`product_image`
FROM
    `tbl_category`
    INNER JOIN `tbl_product` 
        ON (`tbl_category`.`category_id` = `tbl_product`.`category_id`);";
                        $query = mysqli_query($connection, $query) or die(mysqli_error("Error In Connection" . $connection));
                        ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Product Details</th>
                                        <th>Product Price</th>
                                        
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr>";
                                        echo "<td>{$row['product_id']}</td>";
                                        echo "<td>{$row['product_name']}</td>";
                                        echo "<td>{$row['category_name']}</td>";
                                        echo "<td>{$row['product_details']}</td>";
                                        echo "<td>{$row['product_price']}</td>";
                                        
                                        echo "<td><img style=height:80px; width=80px; src='upload/{$row['product_image']}'></td>";
                                        echo "<td><a href='#'><img src='myimages/edit.png' style width='50px;'></a> | <a href='deleteproduct.php?deleteid={$row['product_id']}'><img src='myimages/delete.png' style width='50px;'></a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </section>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>

