<?php
session_start();
$a=$_SESSION['ses_Magv'];
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <div class="banner">
        <center><img src="../../giaodien/img/logo.png"></center>
</div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Nhập Điểm</title>

</head>
<body bgcolor="#CAFFFF">
<?php

?>
<center><h1>TRANG NHẬP ĐIỂM</h1></center>
<form action="add_chon2.php" method="post">
    <div style="text-align:center">
        <select name="day" style="width:100px;height: 25px ">
            <?php
            $query="select * from day where Magv=$a";
            $results=mysqli_query($conn,$query);
            while($data=mysqli_fetch_assoc($results)){
                echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                $_SESSION['malop']=$data['MaLopHoc'];
            }
            ?>
        </select>
        <select name="mon" style="width:100px;height: 25px" >
            <?php
            $query2="select * from giangvien where Magv=$a";
            $results2=mysqli_query($conn,$query2);
            while($data2=mysqli_fetch_assoc($results2)){
                echo "<option value='$data2[MaMonHoc]'>$data2[MaMonHoc]</option>";
                $_SESSION['mamon']=$data2['MaMonHoc'];
            }
            ?>

        </select>
        <select name="hk" style="width:100px;height: 25px">
            <?php
            $query3="select * from hocky";
            $results3=mysqli_query($conn,$query3);
            while($data3=mysqli_fetch_assoc($results3)){
                echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
                $_SESSION['mahk']=$data3['MaHocKy'];
            }
            ?>

        </select>
        <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

    </div>
</form>
<?php
$dayhoc=$monhoc=$hk="";
if(isset($_POST['add'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hk = $_POST['hk'];
    if ($dayhoc && $monhoc && $hk) {
       
        if (isset($_POST['themdiem'])) {
            $query = "select * from sinhvien";
            $results = mysqli_query($conn, $query);
            for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
                
                    $ma = $_POST["ma$i"];
                    $lop = $_POST["lop$i"];
                    $mon = $_POST["mon$i"];
                    $hk = $_POST["hk$i"];
                    $diem="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($diem,$_POST["diem$i"])) {
                   $dgia = $_POST["diem$i"];
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Danh gia Khong Hop Le!");
                        window.location="add_diemsv.php";
                    </script>
                <?php
                exit();
                    }
                $diem1="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($diem1,$_POST["diem1$i"])) {
                    $p1 = $_POST["diem1$i"];
                }
                else{
                ?>
            <script type="text/javascript">
            alert("Ban Nhap Diem kt giua ky Khong Hop Le!");
            window.location="add_diemsv.php";
                </script>
                <?php
            exit();
                }
                $p22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($p22,$_POST["diem2$i"])) {
                    $p2 = $_POST["diem2$i"];
                }
                else{
                ?>
            <script type="text/javascript">
            alert("Ban Nhap Diem thuc hanh Khong Hop Le!");
            window.location="add_diemsv.php";
             </script>
             <?php
            exit();
                }
             $t11="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
             if(preg_match($t11,$_POST["diem3$i"])) {
                 $t11 = $_POST["diem3$i"];
                         }
                         else{
                         ?>
                <script type="text/javascript">
                    alert("Ban Nhap Diem qua trinh Khong Hop Le!");
                    window.location="add_diemsv.php";
                </script>
            <?php
            exit();
            }
            $t22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
            if(preg_match($t22,$_POST["diem4$i"])) {
                $t2 = $_POST["diem4$i"];
            }
            else{
            ?>
            <script type="text/javascript">
        alert("Ban Nhap Diem tong ket khong Hop Le!");
        window.location="add_diemsv.php";
             </script>
        <?php
        exit();
            }
        $dt="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($dt,$_POST["diem5$i"])) {
            $d = $_POST["diem5$i"];
        }
        else{

        ?>
        <script type="text/javascript">
        alert("Ban Nhap Diem Thi Khong Hop Le!");
        window.location="add_diemsv.php";
         </script>

        <?php
        exit();
        }
                    $tb = $_POST["diem6$i"];
                    $sql = "insert into diem(MaHocKy,MaMonHoc,Masv,MaLopHoc,DanhGia,Diemktgiuaky,DiemTH,DiemQT,Diemthikt,Diemtongket,DiemChu )
 							values('" . $hk . "','" . $mon . "','" . $ma . "','" . $lop . "','" .$dgia . "','" . $p1 . "','" . $p2 . "','" . $t1 . "','" . $t2 . "','" . $d . "','" . $tb . "')";
                    $results1 = mysqli_query($conn, $sql);
                    header('location:add_diemsv.php');

                //}
            }
        }
    }
    ?>
    <br/>
    <table border="1" cellspacing="0" cellpadding="1">
        <tr style="font-weight: bold">
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
        $query="select * from sinhvien";
        $results=mysqli_query($conn, $query);
        ?>
        <form action="add_diemsv.php " method="post">
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
                if ($row['MaLopHoc'] == $_POST['day']) {
                    echo "<tr>"; ?>
                    <td><input style="width:90px" type="text" name="ma<?php echo $i; ?>"
                               value="<?php echo "$row[Masv]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:200px" type="text" name="ten<?php echo $i; ?>"
                               value="<?php echo "$row[Tensv]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:70px" type="text" name="lop<?php echo $i; ?>"
                               value="<?php echo $_POST['day'] ?>" readonly="readonly"/></td>
                    <td><input style="width:90px" type="text" name="mon<?php echo $i; ?>"
                               value="<?php echo $_POST['mon'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="hk<?php echo $i; ?>"
                               value="<?php echo $_POST['hk'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="diem<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem1<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem2<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem3<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem4<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem5<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem6<?php echo $i; ?>"/></td>
                    </tr>
                    <?php
                }
            }?>
        </form>
    </table>
    <hr>
    <?php
}

?>
</body>
