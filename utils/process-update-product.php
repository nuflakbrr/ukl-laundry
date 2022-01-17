<?php
    if($_POST){
        $type=$_POST['type'];
        $price=$_POST['price'];

        if(empty($type || $price)) {
            echo "<script>alert('Harap semua data harus diisi!');location.href='../admin/update-product.php?type=$type'</script>";
            } else {
            include ("../sql/db-laundry.php");
            $query = "update package set type='$type', price='$price' where type='$type'";
            $update=mysqli_query($con,$query);
            if($update){
                echo "<script>alert('Sukses update data produk!');location.href='../admin/product.php';</script>";
            } else {
            echo "<script>alert('Gagal update data produk! silakan coba kembali!');location.href='../admin/update-product.php?type=".$type."';</script>";
            } 
        }
    }
?>
