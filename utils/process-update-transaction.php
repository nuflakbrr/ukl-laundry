<?php
    if($_POST){
        // id member
        $member = $_POST['member'];

        // transanction
        $status = $_POST['status'];
        $payment = $_POST['payment'];

        include ("../sql/db-laundry.php");

        if(empty($status) || empty($payment)){
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/dashboard-admin.php';</script>";

        } else {
            $qry_member = mysqli_query($con, "select id from member where name='$member'");
            $row_member = mysqli_fetch_array($qry_member);
            $id_member = $row_member['id'];


            $update_transaction = mysqli_query($con,"update transaction set status='$status', payment='$payment' where id_member='$id_member'");
            
            if($update_transaction){
                echo "<script>alert('Ubah Data Transaksi Sukses!');location.href='../admin/dashboard-admin.php';</script>";
            } else {
                echo "<script>alert('Ubah Data Transaksi Gagal! silakan coba kembali!');location.href='../admin/dashboard-admin.php';</script>";
            }
        }
    }
?>