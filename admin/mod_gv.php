<?php
if (!defined("ROOT"))
{
    echo "You don't have permission to access this page!"; exit;
}
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod=="sv")
{
    include ROOT . "/diem/xemdiem_gv.php";
}
if($mod=="gv")
{
    include ROOT . "/xem_gv.php";
}

?>