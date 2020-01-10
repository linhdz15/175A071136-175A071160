<?php
session_start();
require "../../includes/config.php";
$madiem=$_GET['cma'];
$diem=$diem1=$diem2=$diem3=$diem4=$diem5=$diem6="";
if(isset($_POST['ok'])){

    if($_POST['txthk'] == null){
        echo "ban chua nhap hoc ky";
    }else{
        $mahk=$_POST['txthk'];
    }
    if($_POST['txtmamon'] == null){
        echo "ban chua nhap ma mon";
    }else{
        $mamon=$_POST['txtmamon'];
    }
    if($_POST['txtmalop'] == null){
        echo "ban chua nhap ma lop";
    }else{
        $malop=$_POST['txtmalop'];
    }
    if($_POST['txtmasv'] == null){
        echo "ban chua nhap danh gia";
    }else{
        $masv=$_POST['txtmasv'];
    }

    if($_POST['diem'] == null){
        echo "ban chua nhap danh gia";
    }else{
        $diem=$_POST['diem'];
    }
    if($_POST['diem1'] == null){
        echo "Bạn Chưa Nhập Vào Diem Thi Giua Ky";
    }else{
        $diem1=$_POST['diem1'];
    }
    if($_POST['diem2'] == null){
        echo "Bạn Chưa Nhập Vào Diem Thuc Hanh";
    }else{
        $diem2=$_POST['diem2'];
    }
    if($_POST['diem3'] == null){
        echo "Bạn Chưa Nhập Vào Diem Qua Trinh";
    }else{
        $diem3=$_POST['diem3'];
    }
    if($_POST['diem4'] == null){
        echo "Bạn Chưa Nhập Vào Diem Thi KT";
    }else{
        $diem4=$_POST['diem4'];
    }
    if($_POST['diem5'] == null){
        echo "Bạn Chưa Nhập Vào Diem Tong ket";
    }else{
        $diem5=$_POST['diem5'];
    }
    if($_POST['diem6'] == null){
        echo "Bạn Chưa Nhập Vao Diem Chu";
    }else{
        $diem6=$_POST['diem6'];
    }
    if($mahk && $mamon && $masv && $malop && $diem && $diem1&&$diem2&&$diem3&&$diem4&&$diem5&&$diem6 ){
        $query="update diem set MaHocKy='$mahk',MaMonHoc='$mamon', Masv='$masv', MaLopHoc='$malop',DanhGia='$diem',Diemktgiuaky='$diem1',DiemTH='$diem2',DiemQT='$diem3',Diemthikt='$diem4',Diemtongket='$diem5',DiemChu='$diem6' where MaDiem='$madiem'";
        $results = mysqli_query($conn,$query);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Sửa Điểm Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location="../index.php?mod=diem";
        </script>
        <?php
        exit();



    }
}
$query="select * from diem where MaDiem='$madiem'";
$results = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($results);
?>
<center><img src="../../giaodien/img/logo.png"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">TRANG SỬA ĐIỂM</h1>
<table align="center" border="1" cellspacing="0" cellpadding="10">
    <form action="suadiem.php?cma=<?php echo $row['MaDiem']; ?>" method="post">
        <tr>
            <td>Mã Sinh viên</td>
            <td><input type="text" name="txtmasv" size="25" value="<?php echo $row['Masv']; ?>" readonly="readonly"/></td>
        </tr>

        <tr>
            <td>Mã Lớp</td>
            <td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaLopHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Môn</td>
            <td><input type="text" name="txtmamon" size="25" value="<?php echo $row['MaMonHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Học Kỳ</td>
            <td><input type="text" name="txthk" size="25" value="<?php echo $row['MaHocKy']; ?>" readonly="readonly"/> </td>
        </tr>
        <tr>
            <td>Đánh Giá</td>
            <td><input type="text" name="diem" size="25" value="<?php echo $row['DanhGia']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm kiểm tra giữa kỳ</td>
            <td><input type="text" name="diem1" size="25" value="<?php echo $row['Diemktgiuaky']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm thực hành</td>
            <td><input type="text" name="diem2" size="25" value="<?php echo $row['DiemTH']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm quá trình</td>
            <td><input type="text" name="diem3" size="25" value="<?php echo $row['DiemQT']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm thi kết thúc học phần</td>
            <td><input type="text" name="diem4" size="25" value="<?php echo $row['Diemthikt']; ?>" /></td>
        </tr>
        <td>Điểm tổng kết</td>
        <td><input type="text" name="diem5" size="25" value="<?php echo $row['Diemtongket']; ?>" /></td>
        </tr>
        </tr>
        <td>Điểm Chữ</td>
        <td><input type="text" name="diem6" size="25" value="<?php echo $row['DiemChu']; ?>" /></td>
        </tr>
        <tr>
            <td></td>
        <td>  <input type="submit" name="ok" value="Sửa" /><br/>
        </td>
        </tr>
    </form>
</TABLE>