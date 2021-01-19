<?php
$connection = mysqli_connect("localhost", "root", "", "adminlte");
if($_POST)
{
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $pwd = $_POST['Password'];
    
    $insertq = mysqli_query($connection, "insert into tbl_user(user_name,user_email ,user_password) values('{$name}','{$email}','{$pwd}')")or die(mysqli_errno($connection));
    if($insertq)
    {
        echo "<script>alert('record added');</script>";
        header("location:login.php");
    }
}
?>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                                    <form action="register.php" method="post">
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="Email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>