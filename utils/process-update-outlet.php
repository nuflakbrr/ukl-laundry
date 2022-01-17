<?php
    if($_POST){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];

        if(empty($name || $address || $phone)) {
            echo "<script>alert('Harap semua data harus diisi!');location.href='../admin/update-outlet.php?name=$name'</script>";
            } else {
            include ("../sql/db-laundry.php");
            $query = "update outlet set branch='$name', address='$address', phone='$phone' where branch='$name'";
            $update=mysqli_query($con,$query);
            if($update){
                echo "<script>alert('Sukses update data outlet!');location.href='../admin/outlet.php';</script>";
            } else {
            echo "<script>alert('Gagal update data outlet! silakan coba kembali!');location.href='../admin/update-outlet.php?name=".$name."';</script>";
            } 
        }
    }
?>
