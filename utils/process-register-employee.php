<?php
    if($_POST){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $roles=$_POST['roles'];

        if(empty($name || $username || $password || $roles)) {
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/register-employee.php';</script>";
        } else {
            include ("../sql/db-laundry.php");
            $insert=mysqli_query($con,"insert into user (name, username, password, role) value ('".$name."','".$username."','".md5($password)."','".$roles."')");
            
            if($insert){
                echo "<script>alert('Sukses menambahkan karyawan!');location.href='../admin/employee.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan karyawan! silakan coba kembali!');location.href='../admin/register-employee.php';</script>";
            }
        }
    }
?>
