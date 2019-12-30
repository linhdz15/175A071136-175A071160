<div class="banner">
        <center><img src="../../giaodien/img/logo.png"></center>
    </div>
<br/>
<div style="text-align:right;margin-right:186px;font-weight: bold ">
<?php
session_start();
echo "Chào Bạn  " .$_SESSION['ses_Tensv'];
?>
    </div>
<style type="text/css">
    #menu ul{
        margin-left:145px;
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
        line-height: 27px;
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
        <li><a href="index.html">Trang Chủ</a></li>
        <li><a href="xemdiem_sv.php">Tra Cứu Điểm</a></li>
        <li><a href="sinhvien_xemthongtin.php">Thông Tin Sinh viên</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>
<?php
require "../../classes/diem.class.php";
$connect=new diem();
$students=$connect->alldiem();
$dis=$connect->dong();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#CAFFFF">
<br/>
<h1 class="h1" style="font-family:Tahoma;text-align: center;" >Điểm Sinh Viên</h1>
<center><form action="xemdiem_sv.php" method="post">
<select name="hk" style="width:100px;height: 25px ">
    <?php
    require '../../includes/config.php';
    $query="select * from hocky";
    $results=mysqli_query($conn,$query);
    while($data=mysqli_fetch_assoc($results)){
        echo "<option value='$data[TenHocKy]'>$data[TenHocKy]</option>";
    }
    ?>
</select>
    <input type="submit" name="ok" value="XEM" />
    </form></center>
<?php
    if(isset($_POST['ok']))
{
?>
<table width="73%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr class="diem" style="font-weight: bold;color: #0A246A">
        <td>Học Kỳ</td>
        <td>Môn Học</td>
        <td>Điểm chuyên cần</td>
        <td>Điểm kiểm tra giữa kỳ</td>
        <td>Điểm Thực hành</td>
        <td>Điểm quá trình</td>
        <td>Điểm thi kết thúc học phần</td>
        <td>Điểm Tổng kết</td>
        <td>Điểm chữ</td>
    </tr>
    <?php
    foreach ($students as $item) {
        if ($_SESSION['ses_Masv'] == $item['Masv']) {
            if ($_POST['hk'] == $item['TenHocKy']) {
                ?>
                <tr>
                <td><?php echo $item['TenHocKy']; ?></td>
                <td><?php echo $item['TenMonHoc']; ?></td>
                <td><?php echo $item['Diemchuyencan']; ?></td>
                <td><?php echo $item['Diemktgiuaky']; ?></td>
                <td><?php echo $item['DiemTH']; ?></td>
                <td><?php echo $item['DiemQT']; ?></td>
                <td><?php echo $item['Diemthikt']; ?></td>
                <td><?php echo $item['Diemtongket']; ?></td>
                <?php
                $tinh = 0;
                $tinh = ($item['Diemchuyencan'] + $item['Diemktgiuaky'] + $item['DiemTH'] + ($item['DiemQT'] + $item['Diemthikt']) * 2 + $item['Diemtongket'] * 3) / 10;
                $item['DiemChu'] = $tinh;
                ?>
                <?php if ($item['Diemchuyencan'] != null || $item['Diemktgiuaky'] != null || $item['DiemTH'] != null || $item['DiemQT'] != null ||
                    $item['Diemthikt'] != null
                ) {
                    ?>
                    <td><?php echo round($item['DiemChu'],1); ?></td>
                    </tr>
                    <?php
                }
            }
        }
    }
    }
    ?>
</table>


<table  border=0 cellpadding=5 cellspacing=0 align="center" width="983">
    <TR>
        <TD>	<tr>
        <td  colspan="2" bgcolor="#336699" align="center" style="color:white" >
            Copyright &copy; 2019 TRƯỜNG ĐẠI HỌC THỦY LỢI <br>
        </td>
    </tr>
    </td>
    </TR>
</table>
</body>
</html>