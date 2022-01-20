<?php 
    if($_GET['name']){
        include ("../../sql/db-laundry.php");
        $delete=mysqli_query($con,"delete from member where name='".$_GET['name']."'");
        if($delete){
            echo "<script>alert('Sukses hapus data member!');location.href='../../cashier/customer.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data member! silakan coba kembali!');location.href='../../cashier/customer.php';</script>";
        }
    }
?> 