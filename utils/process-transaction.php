<?php
    if($_POST){
        // detail transaction
        $qty = $_POST['qty'];
        $type = $_POST['id_package'];

        // transanction
        $member = $_POST['member'];
        $date = $_POST['date'];
        $deadline = $_POST['deadline'];
        $date_pay = $_POST['date_pay'];
        $status = $_POST['status'];
        $payment = $_POST['payment'];

        // session login user
        session_start();
        $user = $_SESSION['id'];

        include ("../sql/db-laundry.php");

        if(empty($member) || empty($date) || empty($deadline) || empty($date_pay) || empty($status) || empty($payment)){
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='../admin/transaction.php?total_pckg=1';</script>";

        } else {
            $insert_transaction = mysqli_query($con,"insert into transaction (id_member, date, deadline, date_pay, status, payment, id_user) value ('".$member."','".$date."','".$deadline."','".$date_pay."','".$status."','".$payment."','".$user."')");
            
            if($insert_transaction){
                echo "<script>alert('Transaksi Sukses!');location.href='../admin/dashboard-admin.php';</script>";
            } else {
                echo "<script>alert('Transaksi Gagal! silakan coba kembali!');location.href='../admin/transaction.php?total_pckg=1';</script>";
            }
        }

        // insert data to table detail transaction
        $qry_dtl_transaction = mysqli_query($con,"select * from transaction order by id desc limit 1");
        $data_dtl_transaction = mysqli_fetch_array($qry_dtl_transaction);
        $id_transaction = $data_dtl_transaction['id'];

        for($i=0; $i<$qty; $i++){
            $insert_dtl_transaction = mysqli_query($con,"insert into detail_transaction (id_transaction, id_package, qty) value ('".$id_transaction."','".$type[$i]."','".$qty[$i]."')");
        }

        if($insert_dtl_transaction){
            echo "<script>alert('Transaksi Sukses!');location.href='../admin/dashboard-admin.php';</script>";
        } else {
            echo "<script>alert('Transaksi Gagal! silakan coba kembali!');location.href='../admin/transaction.php?total_pckg=1';</script>";
        }
    }
?>