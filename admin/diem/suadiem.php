<?php
session_start();
require "../../includes/config.php";
$madiem=$_GET['cma'];
$malop=$t=$gt=$ns=$nois=$dt=$cha=$me="";
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
        echo "Bạn Chưa Nhập Vào Tên Sinh Viên";
    }else{
        $p=$_POST['txtpasssv'];
    }
    if( $malop && $t && $gt&&$ns&&$nois&&$dt&&$cha&&$me&&$p ){
        $query="update sinhvien set MaLopHoc='$malop',Tensv='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',hotencha='$cha',hotenme='$me',passwordsv='$p' where Masv='$masv'";
        $results = mysqli_query($conn,$query);
        header("location:../index.php?mod=diem");
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
            <td><input type="text" name="txtmalop" size="25" value="<?php echo $row['Masv']; ?>" readonly="readonly"/></td>
        </tr>

        <tr>
            <td>Mã Lớp</td>
            <td><input type="text" name="txtten" size="25" value="<?php echo $row['MaLopHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Môn</td>
            <td><input type="text" name="txtten" size="25" value="<?php echo $row['MaMonHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Học Kỳ</td>
            <td><input type="text" name="txtns" size="25" value="<?php echo $row['MaHocKy']; ?>" readonly="readonly"/> </td>
        </tr>
        <tr>
            <td>Điểm chuyên cần</td>
            <td><input type="text" name="txtnois" size="25" value="<?php echo $row['Diemchuyencan']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm kiểm tra giữa kỳ</td>
            <td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['Diemktgiuaky']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm thực hành</td>
            <td><input type="text" name="txtcha" size="25" value="<?php echo $row['DiemTH']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm quá trình</td>
            <td><input type="text" name="txtme" size="25" value="<?php echo $row['DiemQT']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm thi kết thúc học phần</td>
            <td><input type="text" name="txtpasssv" size="25" value="<?php echo $row['Diemthikt']; ?>" /></td>
        </tr>
        <td>Điểm tổng kết</td>
        <td><input type="text" name="txtten" size="25" value="<?php echo $row['Diemtongket']; ?>" /></td>
        </tr>
        <tr>
            <td></td>
        <td>  <input type="submit" name="ok" value="Sửa" /><br/>
        </td>
        </tr>
    </form>
</TABLE>