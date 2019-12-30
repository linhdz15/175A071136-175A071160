<?php
$masv=$_GET['cmasv'];
//require "../../includes/config.php";
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from sinhvien where Masv='$masv'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=sv");
exit();
?>