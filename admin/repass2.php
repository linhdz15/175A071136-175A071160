

<?php
require '../classes/DB.class.php';
session_start();
$u=$_SESSION['ses_Masv'];
$psv=$_SESSION['ses_passwordsv'];
?>
<?php
$connect=new DB();
$con=$connect->connect();
$old=$new=$pre=" ";
if(isset($_POST['sv'])){
	if($_POST['txtpasssv'] == null){
		echo "ban chua nhap mat khau.";
	}else{
		if($_POST['txtpasssv'] != $psv){
			echo "mat khau va mat khau cu khong trung.";
		}else{
			$old=$_POST['txtpasssv'];
		}
	}
	if($_POST['txtpasssv2'] == null){
		echo "ban chua nhap mat khau moi.";
	}else{
		if($_POST['txtpasssv2'] != $_POST['txtpasssv3']){
			echo "mat khau nhap vao khong trung nhau";
		}else{
			$mk="/^[a-zA-Z0-9]{6,}$/";
			if(preg_match($mk,$_POST["txtpasssv2"])) {
				$new = $_POST['txtpasssv2'];
			}else{
				?>
				<script type="text/javascript">
					alert("Password Nhap Vao Khong Hop Le.!");
					window.location="repass2.php";
				</script>
				<?php
				exit();
			}
		}
	}
	if($u && $psv && $old && $new && $pre){
		$query="update sinhvien SET passwordsv='$new' where Masv=$u";
		$results = mysqli_query($con,$query);
		?>
		<script type="text/javascript">
		alert("Đã Thay doi mat khau thanh cong!");
		window.location="qlsv.php";
		</script>
		<?php
		exit();

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Thay Đổi Mât Khẩu</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="../giaodien/css/css/style.css">

  
</head>

<body>
  <div class="wrap">
<h1 class="h1" style="font-family:Tahoma;text-align: center;" >ĐỔI MẬT KHẨU</h1>
		<form action="repass2.php" method="post">
		<input type="password" name="txtpasssv" placeholder="mật khẩu cũ" required >
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasssv2" placeholder="mật khẩu mới" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasssv3" placeholder="nhập lại mật khẩu mới" required>
		<a href="" class="forgot_link">Làm mới</a>
		<button><input type="submit" name="sv" value="Thay đổi" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>