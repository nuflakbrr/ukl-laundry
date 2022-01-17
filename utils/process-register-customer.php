<?php
    if($_POST){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];

        if(empty($name || $address || $gender || $phone)) {
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/register-customer.php';</script>";
        } else {
            include ("../sql/db-laundry.php");
            $insert=mysqli_query($con,"insert into member (name, address, gender, phone) value ('".$name."','".$address."','".$gender."','".$phone."')");
            
            if($insert){
                echo "<script>alert('Sukses menambahkan pelanggan!');location.href='../admin/customer.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan pelanggan! silakan coba kembali!');location.href='../admin/register-customer.php';</script>";
            }
        }
    }
?>
