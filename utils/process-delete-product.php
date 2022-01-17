<?php 
    if($_GET['type']){
        include ("../sql/db-laundry.php");
        $delete=mysqli_query($con,"delete from package where type='".$_GET['type']."'");
        if($delete){
            echo "<script>alert('Sukses hapus data produk!');location.href='../admin/product.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data produk! silakan coba kembali!');location.href='../admin/product.php';</script>";
        }
    }
?> 