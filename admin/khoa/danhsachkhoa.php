<?php
require "../classes/khoa.class.php";
$con=new khoa();
$khoa=$con->allkhoa();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Khoa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 align="center"style="font-family:Tahoma;font-weight: bold">Danh sách Khoa</h1>
<table align="center" border="1" cellspacing="0" cellpadding="10">
    <tr style="font-weight: bold">
        <td>Mã Khoa</td>
        <td>Tên Khoa</td>
    </tr>
    <?php foreach ($khoa as $item){ ?>
        <tr>
            <td><?php echo $item['Makhoa']; ?></td>
            <td><?php echo $item['Tenkhoa']; ?></td>
        </tr>
    <?php } ?>
</table>

