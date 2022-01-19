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

        if($_POST['type'] == 'package'){
            $id_transaction = mysqli_insert_id($con);
            $id_package = $_POST['id_package'];
            $insert_detail_transaction = mysqli_query($con,"insert into detail_transaction (id_transaction, id_package, qty) value ('".$id_transaction."','".$id_package."','".$qty."')");
        } else {
            $id_transaction = mysqli_insert_id($con);
            $id_product = $_POST['id_product'];
            $insert_detail_transaction = mysqli_query($con,"insert into detail_transaction (id_transaction, id_product, qty) value ('".$id_transaction."','".$id_product."','".$qty."')");
        }

        echo mysqli_error($con);
    }
?>