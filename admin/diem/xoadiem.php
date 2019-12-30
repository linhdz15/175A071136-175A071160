<?php
session_start();
$masv=$_GET['cma'];
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from diem where MaDiem='$masv'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=diem");
exit();
?>