<div class="banner">
    <center><img src="../../giaodien/img/logo.png"></center>
</div>
<br/>
<div style="text-align:right;margin-right:186px;font-weight: bold">
<?php
session_start();
echo "Chào Bạn " .$_SESSION['ses_Tensv'];
?>
    </div>
<style type="text/css">
    #menu ul{
        margin-left:143px;
    }

    #menu ul li{
        display:inline;

    }

    #menu ul a{
        text-decoration:none;
        width:195px;
        float:left;
        background:#336699;
        color:#FFFFFF;
        text-align:center;
        line-height:27px;
        font-weight:bold;
        border-left:1px solid #FFFFFF;
    }

    #menu ul a:hover{
        background:#000000;
    }
</style>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu" >

    <ul>
        <li><a href="xemdiem_sv.php">Xem Điểm</a></li>
        <li><a href="sinhvien_xemthongtin.php">Thông Tin Sinh Viên</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>
<?php
require "../../classes/sinhvien.class.php";
$connect=new sinhvien();
$students=$connect->allsv();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#CAFFFF">
<br/>
<h1 style="font-family:Tahoma;text-align: center;">THÔNG TIN Sinh viên</h1>
<table width="74%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr style="font-weight: bold;color: #0A246A">
        <td>Mã Sinh viên</td>
        <td>Lớp</td>
        <td>Tên Sinh Viên</td>
        <td>Giới Tính</td>
        <td>Ngày Sinh</td>
        <td>Nơi Sinh</td>
        <td>Dân Tộc</td>
        <td>Họ Tên Cha</td>
        <td>Họ Tên Mẹ</td>
    </tr>

    <?php
    foreach ($students as $item) {
        if ($_SESSION['ses_Masv'] == $item['Masv'])
        {
        ?>
        <tr>
            <td><?php echo $item['Masv']; ?></td>
            <td><?php echo $item['Tensv']; ?></td>
            <td><?php echo $item['MaLopHoc']; ?></td>
            <td><?php echo $item['GioiTinh']; ?></td>
            <td><?php echo $item['NgaySinh']; ?></td>
            <td><?php echo $item['noisinh']; ?></td>
            <td><?php echo $item['dantoc']; ?></td>
            <td><?php echo $item['hotencha']; ?></td>
            <td><?php echo $item['hotenme']; ?></td>
            <?php }

                ?>
        </tr>
    <?php }
    ?>
</table>
<table  border=0 cellpadding=5 cellspacing=0 align="center" width="983">
    <TR>
        <TD>	<tr>
        <td  colspan="2" bgcolor="#336699" align="center" style="color:white" >
            Copyright &copy; 2019 ĐẠI HỌC THỦY LỢI <br>
        </td>
    </tr>
    </td>
    </TR>
</table>
</body>
</html>