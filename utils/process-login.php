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
                $_SESSION['role']=$dt_login['role'];
                $_SESSION['status_login']=true;

                // conditional redirect for role switch case
                switch($_SESSION['role']){
                    case 'admin':
                        header("location:../admin/dashboard-admin.php");
                        break;
                    case 'cashier':
                        header("location:../cashier/dashboard-cashier.php");
                        break;
                    case 'owner':
                        header("location:../owner/dashboard-owner.php");
                        break;
                    default:
                        header("location:../login.php");
                        break;
                }

                // conditional redirect for role if else
                // if($_SESSION['role']=='admin'){
                //     echo "<script>location.href='../admin/dashboard-admin.php';</script>";
                // } else if($_SESSION['role']=='cashier'){
                //     echo "<script>location.href='../cashier/dashboard-cashier.php';</script>";
                // } else if($_SESSION['role']=='owner'){
                //     echo "<script>location.href='../owner/dashboard-owner.php';</script>";
                // } else {
                //     echo "<script>alert('Username atau Password tidak benar!' silakan coba kembali!);location.href='../login.php';</script>";
                // }
            } else {
                echo "<script>alert('Username dan Password tidak benar!' silakan coba kembali!);location.href='../login.php';</script>";
            }
        }
    }
?>
