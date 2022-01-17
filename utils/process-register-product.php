<?php
    if($_POST){
        $type=$_POST['type'];
        $price=$_POST['price'];

        if(empty($type || $price)) {
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/register-product.php';</script>";
        } else {
            include ("../sql/db-laundry.php");
            $insert=mysqli_query($con,"insert into package (type, price) value ('".$type."','".$price."')");
            
            if($insert){
                echo "<script>alert('Sukses menambahkan produk!');location.href='../admin/product.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan produk! silakan coba kembali!');location.href='../admin/register-product.php';</script>";
            }
        }
    }
?>
