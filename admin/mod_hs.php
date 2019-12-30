<?php
if (!defined("ROOT"))
{
    echo "You don't have permission to access this page!"; exit;
}
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod=="sv")
{
    include ROOT . "/sinhvien/xemdiem_sv.php";
}
if($mod=="tt")
{
    include ROOT . "/sinhvien_xemthongtin.php";
}
?>