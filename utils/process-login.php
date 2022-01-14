<?php
    if($_POST){
        $username=$_POST['username']; 
        $password=$_POST['password'];

        if(empty($username || $password)){
            echo "<script>alert('Tidak boleh kosong! Harap isi dengan lengkap!');location.href='../login.php';</script>";
        } else {
            include "../sql/db-laundry.php";
            $qry_login=mysqli_query($con,"select * from user where username = '".$username."' and password = '".md5($password)."'");
            
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id']=$dt_login['id'];
                $_SESSION['name']=$dt_login['name'];
                $_SESSION['status_login']=true;
                header("location: ../dashboard-admin.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar!');location.href='../login.php';</script>";
            }
        }
    }
?>
