<?php
require 'DB.class.php';
class khoa extends DB
{
    function allkhoa()
    {
        $con=$this->connect();
        $sql="select * from khoa";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectkhoa($id)
    {
        $conn=$this->connect();
        $query="select * from khoa where Makhoa='$id'";
        $mang=array();
        $results = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($results);
        $mang=$row;
        return $mang;
    }
}