<?php
session_start();

include './themepart/connection.php';
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
     $q = mysqli_query($connection, "delete from tbl_product where product_id=$id") or die(mysqli_error($connection));  
     header("location:displayproduct.php");
}
?>
