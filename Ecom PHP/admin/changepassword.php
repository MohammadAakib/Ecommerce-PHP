<?php
session_start();

include './themepart/connection.php';
if($_POST)
{   
    if( isset($_SESSION['adminid']))
    {
        $opass = $_POST['opass'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];
    
        $q = mysqli_query($connection, "select * from tbl_admin where  admin_id ='{$_SESSION['adminid']}' ") or die(mysqli_error($connection));
        $row = mysqli_fetch_array($q);
        if ($row['admin_password'] == $opass)
    {
        if ($npass == $cpass)
              {
                    if ($opass == $npass)
                {
                    echo "<script>alert('Old And New Password Are Same');</script>";
                }
                    else 
                    {
                    $updateq = mysqli_query($connection,  "update tbl_admin set admin_password= ' {$npass} ' where admin_id = '{$_SESSION ['adminid']} ' ") or die(mysqli_error($connection));
                    if ($updateq)
                {
                   echo "<script>alert('Password Changed');</script>";
                }
                    }
                }
        else 
        {
            echo "<script>alert('New And Confrim Password Must Be Same');</script>";
        }
        }
        else
        {
            echo "<script>alert('Old Password Not Match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Change</b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
       <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="opass" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="npass" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="cpass" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
