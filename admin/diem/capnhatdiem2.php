<?php
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Trang Nhập Điểm</title>
    <div class="banner">
        <center><img src="../../giaodien/img/logo.png"></center>
    </div>
</head>
<body bgcolor="#f0ffff">
<?php
// $ma=$lop=$hk=$mon=$dgia=$p1=$p2=$t1=$t22=$d="";
if (isset($_POST['themdiem'])) {
    $ma2 = $_POST['madiem'];
    $ma = $_POST['ma'];
    $lop = $_POST['lop'];
    $mon = $_POST['mon'];
    $hk = $_POST['hk'];
    /*if (empty($_POST['diem'])) {
    ?>
    <script type="text/javascript">
        alert("Bạn không thể sửa điểm đã có sẳn")
    </script>
    <?php
    }else{*/
   $dgia = $_POST['diem'];
//}

$p1 = $_POST['diem1'];
    $p2 = $_POST['diem2'];
    $t1 = $_POST['diem3'];
   $p4 = $_POST['diem4'];
    $d = $_POST['diem5'];
    $tb = $_POST['diem6'];
    $query = "select * from diem";
    $results = mysqli_query($conn, $query);
    for ($i = 0; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
        $sql = "update diem set 
                MaHocKy='$hk[$i]',
                MaMonHoc='$mon[$i]',
                Masv='$ma[$i]',
                MaLopHoc='$lop[$i]',
                DanhGia='$dgia[$i]',
                Diemktgiuaky='$p1[$i]',
                DiemTH='$p2[$i]',
                DiemQT='$t1[$i]',
                Diemthikt='$t22[$i]',
                Diemtongket='$d[$i]',
                DiemChu='$tb[$i]' 
                where MaDiem=" .$ma2[$i] ;
        $results1 = mysqli_query($conn, $sql);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Cập Nhật Điểm Thành Công")
            window.location="../qlgv.php?mod=sv";
        </script>
<?php
        
    }
}
?>
<table border="1" cellspacing="0" cellpadding="1">
    <tr style="font-weight: bold">
        <td></td>
        <td>Mã Sinh Viên</td>
        <td>Tên Sinh Viên</td>
        <td>Lớp</td>
        <td>Môn Học</td>
        <td>Học Kỳ</td>
        <td>Đánh Giá</td>
        <td>Điểm kiểm tra giữa kỳ</td>
        <td>Điểm thực hành</td>
        <td>Điểm quá trình</td>
        <td>Điểm thi kết thúc học phần</td>
        <td>Điểm tổng kết</td>
        <td>Điểm chữ</td>
    </tr>
    <?php
    $query="select * from diem,sinhvien WHERE diem.Masv=sinhvien.Masv";
    $results=mysqli_query($conn, $query);
    ?>
    <form action="capnhatdiem2.php" method="post">
        <hr>
        <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold" >
            <div>Danh Sách Lớp: <?php echo $_POST['day'] ?></div>
            <div> Mã Môn Học: <?php echo $_POST['mon'] ?></div>
            <div> Mã Học Kỳ: <?php echo $_POST['hk'] ?></div>
            <div> Mã Giảng Viên Nhập Điểm: <?php echo $_SESSION['ses_Magv'] ?></div>
        </div>
        <hr>
        <div>
            <div style="text-align: right;float: left">
                <a href="../qlgv.php"><button type='button'>Trở Về</button></a>
            </div>
            <div style="text-align: right">
                <input type="submit" name="themdiem" value="Thêm Điểm"/>
            </div>
        </div>
        <hr>
        <?php
        for($i=1;$i<=($row=mysqli_fetch_assoc($results));$i++) {
            if ($row['MaLopHoc'] == $_POST['day'] && $row['MaMonHoc'] == $_POST['mon'] && $row['MaHocKy'] == $_POST['hk'])   {
                echo "<tr>"; ?>
                <td><input style="width:90px" type="hidden" name="madiem[] ?>"
                           value="<?php echo "$row[MaDiem]"; ?>" readonly="readonly"/></td>
                <td><input style="width:90px" type="text" name="ma[] ?>"
                           value="<?php echo "$row[Masv]"; ?>" readonly="readonly"/></td>
                <td><input style="width:200px" type="text" name="ten[] ?>"
                           value="<?php echo "$row[Tensv]"; ?>" readonly="readonly"/></td>
                <td><input style="width:70px" type="text" name="lop[] ?>"
                           value="<?php echo $_POST['day'] ?>" readonly="readonly"/></td>
                <td><input style="width:90px" type="text" name="mon[] ?>"
                           value="<?php echo "$row[MaMonHoc]" ?>" readonly="readonly"/></td>
                <td><input style="width:100px" type="text" name="hk[]"
                           value="<?php echo "$row[MaHocKy]" ?>" readonly="readonly"/></td>
                <td><input style="width:100px" type="text" name="diem[]" value="<?php echo "$row[DanhGia]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem1[]" value="<?php echo "$row[Diemktgiuaky]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem2[] ?>" value="<?php echo "$row[DiemTH]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem3[]?>" value="<?php echo "$row[DiemQT]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem4[] ?>" value="<?php echo "$row[Diemthikt]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem5[]?>" value="<?php echo "$row[Diemtongket]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem6[] ?>"
                           readonly="readonly"/></td>

                </tr>
                <?php
            }
        }?>
    </form>
</table>
<hr>
</body>
