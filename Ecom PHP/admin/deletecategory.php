<?php
session_start();

include './themepart/connection.php';
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
     $q = mysqli_query($connection, "delete from tbl_category where category_id=$id") or die(mysqli_error($connection));
    header("location:displaycategory.php");
}
?>
