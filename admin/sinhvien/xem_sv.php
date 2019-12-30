<?php

if($_SESSION['ses_level']!=1) {
    header("location:login.php");

}

?>
        <link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
function XacNhan(){
	if(!window.confirm('Bạn Có Chắc Muốn Xóa Sinh viên Này Không!!!')){
		return false;
	}
}
</script>
<H1 align="center" style="font-family: Tahoma">Quản Lý Sinh viên</H1>
<h2 align="center"><a href="sinhvien/add_sv.php"><button type='button'>Thêm Sinh viên</button> </a></h2>
<?php
?>

<form method="post">
	<select name="malophoc">
			<?php
			$con=new sinhvien();
			$data=$con->alllop();
			while($data){
				echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
			}
			?>

		</select>
</form>
<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10" >
<tr style="font-family: Tahoma;color: #0000bf;font-weight: bold">
<td>STT</td>
<td>Mã Sinh Viên</td>
<td>Mã Lớp Học</td>
<td>Tên Sinh viên</td>
<td>Giới tính</td>
<td>Ngày Sinh</td>
<td>Nơi Sinh</td>
<td>Dân Tộc</td>
<td>Họ Tên Cha</td>
<td>Họ Tên Mẹ</td>
<td>Sửa</td>
<td>Xóa</td>
</tr>
<?php
require "../classes/sinhvien.class.php";
$con=new sinhvien();
$sinhvien=$con->allsv();
$stt=0;
foreach($sinhvien as $row)
{
$stt++;
echo "<tr>";
echo "<td>$stt</td>";
echo "<td>$row[Masv]</td>";
echo "<td>$row[MaLopHoc]</td>";
echo "<td>$row[Tensv]</td>";
echo "<td>$row[GioiTinh]</td>";
echo "<td>$row[NgaySinh]</td>";
echo "<td>$row[noisinh]</td>";
echo "<td>$row[dantoc]</td>";
echo "<td>$row[hotencha]</td>";
echo "<td>$row[hotenme]</td>";

echo "<td><a href='sinhvien/sua_sv.php?cmasv=$row[Masv]'><button type='button'>Sửa</button></a></td>";
echo "<td><a href='sinhvien/xoa_sv.php?cmasv=$row[Masv]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
echo "</tr>";
}
?>