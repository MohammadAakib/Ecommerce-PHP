<?php
session_start();

include './themepart/connection.php';
if ($_POST) 
{
    $uemail = $_POST['txt4'];
    $upass = $_POST['txt5'];
    $q = mysqli_query($connection, "select * from  tbl_admin where admin_email = '{$uemail}' and admin_password =' {$upass} ' ") or die(mysqli_errno($connection));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);
   
    if($count==1)
    {
        $_SESSION['adminid'] = "{$row['admin_id']}";
        $_SESSION['adminemail'] = "{$row['txt4']}";
        $_SESSION['adminpassword'] = "{$row['txt5']}";
        header("location:home.php");
    }
    else
    {
        echo"<script>alert('Invaild Email Or Password');</script>" ;   
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
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
      <a href="login.php"><b>Login</b>Page</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log in to start your session</p>

      <form method="post" action="login.php">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="txt4">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="txt5">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
          <a href="forgetpassword.php">I forgot my password</a>
      </p> 
      <p class="mb-0">
          <a href="signup.php" class="text-center">Sign Up</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=".plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
