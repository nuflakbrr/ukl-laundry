<?php
    if($_POST){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $roles=$_POST['roles'];

        if(empty($name || $username || $password || $roles)) {
            echo "<script>alert('Harap semua data harus diisi!');location.href='../admin/update-employee.php?name=$name'</script>";
            } else {
            include ("../sql/db-laundry.php");
            $query = "update user set name='$name', username='$username', password='".md5($password)."', role='$roles' where name='$name'";
            $update=mysqli_query($con,$query);
            if($update){
                echo "<script>alert('Sukses update data karyawan!');location.href='../admin/employee.php';</script>";
            } else {
            echo "<script>alert('Gagal update data karyawan! silakan coba kembali!');location.href='../admin/update-employee.php?name=".$name."';</script>";
            } 
        }
    }
?>
