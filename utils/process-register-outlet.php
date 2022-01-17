<?php
    if($_POST){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];

        if(empty($name || $address || $phone)) {
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/register-outlet.php';</script>";
        } else {
            include ("../sql/db-laundry.php");
            $insert=mysqli_query($con,"insert into outlet (address, phone, branch) value ('".$address."','".$phone."','".$name."')");
            
            if($insert){
                echo "<script>alert('Sukses menambahkan outlet!');location.href='../admin/outlet.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan outlet! silakan coba kembali!');location.href='../admin/register-outlet.php';</script>";
            }
        }
    }
?>
