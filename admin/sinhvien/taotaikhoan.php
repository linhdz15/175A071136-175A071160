<?php
session_start();
$m=$malop=$t=$gt=$ns=$nois=$dt=$cha=$me=$p="";
require "../../classes/sinhvien.class.php";
$con=new sinhvien();
if(isset($_POST['ok'])) {
	if ($_POST['txtmasv'] == null) {
		echo "Bạn Chưa Nhập Mã Sinh Viên!<br/>";
	} else {
		$rule="/^[a-zA-Z0-9].{1,5}$/";
		if(preg_match($rule,$_POST['txtmasv'])) {
			$m = $_POST['txtmasv'];
		}
		else{
			?>
			<script type="text/javascript">
				alert("Ma Hoc Sinh Khong Hop Le.!");
				window.location="taotaikhoan.php";
			</script>
			<?php
			exit();

		}
	}
	if($_POST['malophoc'] != null)
	{
		$malop=$_POST['malophoc'];
	}
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Tên Sinh Viên";
	}else{
		$hoten="/^[a-zA-Z'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ� �ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ� ��ỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
		if(preg_match($hoten,$_POST['txtten'])) {
			$t = $_POST['txtten'];
		}else{
			?>
			<script type="text/javascript">
				alert("Ho Ten Hoc Sinh Khong Hop Le.!");
				window.location="taotaikhoan.php";
			</script>
			<?php
			exit();
		}
	}
	if($_POST['txtgt']==1) {
		$gt ="Nam";
	}
	else {
		$gt ="Nữ";
	}
	if($_POST['txtngs'] == null){
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	}else{
		$ns=$_POST['txtngs'];
	}
	if($_POST['txtns'] == null){
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	}else{
		$nois=$_POST['txtns'];
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
		echo "Bạn Chưa Nhập Mật Khẩu Sinh Viên";
	}else{
		$pass="/^[a-zA-Z0-9]{6,}$/";
		if(preg_match($pass,$_POST['txtpasssv'])) {
			$p = $_POST['txtpasssv'];
		}
		else{
			?>
			<script type="text/javascript">
				alert("Password Nhap Vao Khong Hop Le.!");
				window.location="taotaikhoan.php";
			</script>
			<?php
			exit();
		}
	}

	if($m && $malop && $t && $gt && $ns && $nois &&$dt && $cha &&$me && $p ){
		$sinhvien=$con->add($m,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		?>
		<script type="text/javascript">
		alert("Bạn Đã Thêm Sinh viên Thành Công.Nhấn OK Để Tiếp Tục Thêm Sinh viên!");
		window.location="taotaikhoan.php";
		</script>
		<?php
		exit();
		require("../../classes/DB.class.php");
		
		
	}
}
?>
<style type="text/css">
	#menu table td
{
	font-weight: bold;
}
</style>
<body bgcolor="#CAFFFF">
<center><img src="../../giaodien/img/logo.png"></center>
	<h1 align="center">Tạo Tài Khoản Sinh Viên</h1>
<form action="taotaikhoan.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
			<td>Mã Sinh viên:</td>
			<td>  <input type="text" name="txtmasv" size="25" placeholder="1 đến 5 số nguyên từ 0-9"/><br/>
			</td>
		</tr>
<tr>
			<td>Mã Lớp Học</td>
			<td><select name="malophoc">

				<?php
				$connect=new db();
				$conn=$connect->connect();
				$query="select * from lophoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
		}
				?>
			</select></td>
		</tr>
<tr>
			<td>Tên Sinh viên</td>
			<td><input type="text" name="txtten" size="25" /></td>
		</tr>
<tr>
			<td>Giới tính</td>
			<td><input type="radio" name="txtgt" value="1">Nam
			    <input type="radio" name="txtgt" value="2">Nữ
			</td>
		</tr>
<tr>
			<td>Ngày Sinh:</td>
			<td><input type="date" name="txtngs" size="25" /> </td>
		</tr>
		<tr>
			<td>Nơi Sinh:</td>
			<td><input type="text" name="txtns" size="25" /> </td>
		</tr>
		<tr>
			<td>Dân Tộc:</td>
			<td><input type="text" name="txtdantoc" size="25" /> </td>
		</tr>
		<tr>
			<td>Họ Tên Cha:</td>
			<td><input type="text" name="txtcha" size="25" /> </td>
		</tr>
		<tr>
			<td>Họ Tên Mẹ:</td>
			<td><input type="text" name="txtme" size="25" /> </td>
		</tr>
<tr>
			<td>Password Sinh viên:</td>
			<td><input type="password" name="txtpasssv" size="25" placeholder="Trên 6 kí tự"/></td>
		</tr>
<tr>
			<td>
				<input type="reset" value="làm mới">
			</td>
			<td>  
				<input type="submit" name="ok" value="Tạo Tài khoản" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>
