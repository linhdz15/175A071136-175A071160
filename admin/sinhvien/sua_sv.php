<?php
session_start();
require "../../classes/sinhvien.class.php";
$con=new sinhvien();
require "../../includes/config.php";
$masv=$_GET['cmasv'];
$malop=$t=$gt=$ns=$nois=$dt=$cha=$me=$p="";
if(isset($_POST['ok'])){
	if($_POST['txtmalop'] == null){
		echo "ban chua nhap ma lop hoc";
	}else{
		$malop=$_POST['txtmalop'];
	}
	if($_POST['txtten'] == null){
		echo "ban chua nhap ten";
	}else{
		$t=$_POST['txtten'];
	}
	if($_POST['txtgt'] == null){
		echo "Bạn Chưa Nhập Vào giới tính";
	}else{
		$gt=$_POST['txtgt'];
	}
	if($_POST['txtns'] == null){
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	}else{
		$ns=$_POST['txtns'];
	}
	if($_POST['txtnois'] == null){
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	}else{
		$nois=$_POST['txtnois'];
	}
	if($_POST['txtdantoc'] == null){
		echo "Bạn Chưa Nhập Vào Dân Tộc";
	}else{
		$dt=$_POST['txtdantoc'];
	}
	if($_POST['txtcha'] == null){
		echo "Bạn Chưa Nhập Vào Họ Tên Cha";
	}else{
		$cha=$_POST['txtcha'];
	}
	if($_POST['txtme'] == null){
		echo "Bạn Chưa Nhập Vào Họ Tên Mẹ";
	}else{
		$me=$_POST['txtme'];
	}
	if($_POST['txtpasssv'] == null){
		echo "Bạn Chưa Nhập Vào  Pass Sinh viên";
	}else{
		$p=$_POST['txtpasssv'];
	}
	if( $masv && $malop && $t && $gt && $ns && $nois &&$dt && $cha && $me && $p){
		$query="update sinhvien set MaLopHoc='$malop',Tensv='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',
		hotencha='$cha',hotenme='$me',passwordsv='$p' where Masv='$masv'";
		$results = mysqli_query($conn,$query);
		header("location:../index.php?mod=sv");
		exit();
	}
	
}
$row=$con->selectsv($masv);
?>
<center><img src="../../giaodien/img/logo.png"></center>
<body bgcolor="#CAFFFF">
<h1 style="text-align: center">TRANG SỬA HỌC THÔNG TIN SINH VIÊN</h1>
<table align="center" border="1" cellspacing="0" cellpadding="10">
<form action="sua_sv.php?cmasv=<?php echo $row['Masv']; ?>" method="post">
	<tr>
		<td>Mã Lớp Học</td>
			<td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaLopHoc']; ?>" /></td>
		</tr>

		<tr>
		<td>Tên Sinh viên</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $row['Tensv']; ?>" /></td>
		</tr>
		<tr>
			<td>giới tính</td>
			<td><input type="radio" name="txtgt" value="Nam" value="<?php echo $row['GioiTinh']; ?>">Nam
			    <input type="radio" name="txtgt" value="Nữ" value="<?php echo $row['GioiTinh']; ?>">Nữ 
			</td>
		</tr>
		<tr>
			<td>Ngày Sinh:</td>
			<td><input type="date" name="txtns" size="25" value="<?php echo $row['NgaySinh']; ?>" /> </td>
		</tr>
		<tr>
			<td>Nơi Sinh:</td>
			<td><input type="text" name="txtnois" size="25" value="<?php echo $row['noisinh']; ?>"/> </td>
		</tr>
		<tr>
			<td>Dân Tộc:</td>
			<td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['dantoc']; ?>"/> </td>
		</tr>
		<tr>
			<td>Họ Tên Cha:</td>
			<td><input type="text" name="txtcha" size="25" value="<?php echo $row['hotencha']; ?>"/> </td>
		</tr>
		<tr>
			<td>Họ Tên Mẹ:</td>
			<td><input type="text" name="txtme" size="25" value="<?php echo $row['hotenme']; ?>"/> </td>
		</tr>
<tr>
			<td>Password Sinh viên:</td>
			<td><input type="password" name="txtpasssv" size="25" value="<?php echo $row['passwordsv']; ?>" /></td>
		</tr>
	
	</tr>

			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</form>
</TABLE>
</body>