<?php

require 'DB.class.php';
class sinhvien extends DB
{
    function allsv()
    {
        $con=$this->connect();
        $sql="select * from sinhvien";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while ($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectsv($id)
    {
        $con=$this->connect();
        $mysql="select * from sinhvien where Masv={$id}";
        $query=mysqli_query($con,$mysql);
        $result=array();
        if(mysqli_num_rows($query)>0)
        {
            $row=mysqli_fetch_assoc($query);
            $result=$row;
        }
        return $result;
    }
    function  add($id,$lop,$ten,$gt,$ngs,$ns,$dt,$htc,$htm,$pw)
    {
        $con=$this->connect();
        $sql="insert into sinhvien(Masv,MaLopHoc,Tensv,GioiTinh,NgaySinh,noisinh,dantoc,hotencha,hotenme,passwordsv)
              values('$id','$lop','$ten','$gt','$ngs','$ns','$dt','$htc','$htm','$pw')
        ";
        $query=mysqli_query($con,$sql);
        return $query;

    }
    function edit($id,$lop,$ten,$gt,$ngs,$ns,$dt,$htc,$htm,$pw)
    {
        $con=$this->connect();
        $sql="update sinhvien set
        MaLopHoc='$lop',
        Tensv='$ten',
        GioiTinh='$gt',  
        NgaySinh='$ngs',
        noisinh='$ns',
        dantoc='$dt',
        hotencha='$htc',
        hotenme='$htm',
        passwordsv='$pw',
        where Masv='$id'";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function alllop()
    {
        $con=$this->connect();
        $sql="select * from lophoc";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while ($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
}
