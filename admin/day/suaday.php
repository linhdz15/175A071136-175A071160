<?php
session_start();
require "../../classes/day.class.php";
$connect=new day();
$day=$_GET['maday'];
$conn=$connect->selectquery($day);
?>
<center><img src="../../giaodien/img/logo.png"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Sửa Lịch Dạy</h1>
<form action="sua_day.php?maday=<?php echo $conn['MaDayHoc'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	
<tr>
			<td>Mã môn học:</td>
			<td><input type="text" name="txtmh" size="25" value="<?php echo $conn['MaMonHoc']; ?>"/></td>
		</tr>
<tr>
			<td>Mã Giảng Viên:</td>
			<td><input type="text" name="txtmagv" size="25" value="<?php echo $conn['Magv']; ?>"/></td>
		</tr>
		<tr>
			<td>Mã Lớp Học:</td>
			<td><input type="text" name="txtlop" size="25" value="<?php echo $conn['MaLopHoc']; ?>"/></td>
        </tr>
        <tr>
			<td>Mã Học Kỳ:</td>
			<td><input type="text" name="txthk" size="25" value="<?php echo $conn['MaHocKy']; ?>"/></td>
        </tr>
        <tr>
			<td>Mô tả:</td>
			<td><input type="text" name="txtmota" size="25" value="<?php echo $conn['MoTaPhanCong']; ?>"/></td>
		</tr>

<tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa lịch dạy" /><br/>
			</td>
		</tr>
</table>
</form>
</body>