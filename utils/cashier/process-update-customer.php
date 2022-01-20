<?php
    if($_POST){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];

        if(empty($name || $address || $phone || $gender)) {
            echo "<script>alert('Harap semua data harus diisi!');location.href='../../cashier/update-customer.php?name=$name'</script>";
            } else {
            include ("../../sql/db-laundry.php");
            $query = "update member set name='$name', address='$address', gender='$gender' , phone='$phone' where name='$name'";
            $update=mysqli_query($con,$query);
            if($update){
                echo "<script>alert('Sukses update data member!');location.href='../../cashier/customer.php';</script>";
            } else {
            echo "<script>alert('Gagal update data member! silakan coba kembali!');location.href='../../cashier/update-customer.php?name=".$name."';</script>";
            } 
        }
    }
?>
