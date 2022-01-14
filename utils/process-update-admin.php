<?php
    if($_POST){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $roles=$_POST['roles'];

        if(empty($name || $username || $password || $roles)) {
            echo "<script>alert('Harap semua data harus diisi!');location.href='../update-admin.php?name=$name'</script>";
            } else {
            include ("../sql/db-laundry.php");
            $query = "update user set name='$name', username='$username', password='$password', role='$roles' where name='$name'";
            $update=mysqli_query($con,$query);
            if($update){
                echo "<script>alert('Sukses update data!');location.href='../admin/employee.php';</script>";
            } else {
            echo "<script>alert('Gagal update data!');location.href='../update-admin.php?name=".$name."';</script>";
            } 
        }
    }
?>
