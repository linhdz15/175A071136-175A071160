<?php
session_start();
require '../classes/DB.class.php';
$connect=new DB();
$con=$connect->connect();
$usv=$psv="";
if(isset($_POST['sv'])){
	if($_POST['txtusersv'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="loginsv.php";
		</script>
		<?php
		exit();
	}else{
		$usv=$_POST['txtusersv'];

	}
	if($_POST['txtpasssv'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
		window.location="loginsv.php";
		</script>
		<?php
		exit();
	}
	else{
		$psv=$_POST['txtpasssv'];
	}
	if($usv && $psv){
		

		$query="select * from sinhvien where Masv='$usv' and passwordsv='$psv'";
		$results = mysqli_query($con,$query);
		if($rowcount=mysqli_num_rows($results) ==0) {
				?>
				<script type="text/javascript">
					alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
					window.location = "loginsv.php";
				</script>
				<?php
				exit();
			} else {
				$data=mysqli_fetch_assoc($results);
				$_SESSION['ses_Masv'] = $data['Masv'];
				$_SESSION['ses_Tensv'] = $data['Tensv'];
				$_SESSION['ses_passwordsv']=$data['passwordsv'];
				header("location:qlsv.php");
				exit();
			}
		}
	$dis=$con->close();
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG ĐĂNG NHẬP SINH VIÊN</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="../giaodien/css/css/style.css">

  
</head>

<body>
<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRƯỜNG ĐẠI HỌC THỦY LỢI</div>
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRA CỨU ĐIỂM</div>
  <div class="wrap" style="margin-top:30px">
		<form action="loginsv.php" method="post">
		<input type="text" name="txtusersv" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasssv" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">Làm mới lại?</a>
		<button><input type="submit" name="sv" value="Đăng Nhập" /></button>
	</form>
	<a href="./sinhvien/taotaikhoan.php" style="font-size:14px">Tạo Tài Khoản</a>
	</div>
<br/>
<div style="border: 1px solid #CDCDCD;background-color: #e4e0d8;width: 500px;margin-left: 440px;font-family: Tahoma">
	<h6 style="font-weight: bold">Một số hướng dẫn cần thiết :</h6>
	<li>Đối tượng sử dụng : Sinh Viên Trường đại học Thủy Lợi.</li>
	<li>Sinh viên đăng nhập vào hệ thống bằng mã số sinh viên.</li>
	<li>Mật khẩu mặc định là mã số sinh viên.</li>
	<li>Khi truy cập lần thứ nhất, sinh viên lưu ý :</li>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Phải thay đổi mật khẩu.</h6>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Trong quá trình truy cập, nếu có thắc mắc gì hay quên</h6>
		<h6>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp mật khẩu truy cập sinh viên liên hệ nhà trường </h6>
			<h6>&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp tại phòng đào tạo</h6>
</div>
    <script src="js/index.js"></script>

</body>&nbsp
</html>