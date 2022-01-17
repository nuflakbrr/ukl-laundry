<?php 
    if($_GET['name']){
        include ("../sql/db-laundry.php");
        $delete=mysqli_query($con,"delete from outlet where branch='".$_GET['name']."'");
        if($delete){
            echo "<script>alert('Sukses hapus data outlet!');location.href='../admin/outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data outlet! silakan coba kembali!');location.href='../admin/outlet.php';</script>";
        }
    }
?> 