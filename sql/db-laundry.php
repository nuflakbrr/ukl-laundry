<?php
    $con=mysqli_connect('localhost','root','','db-laundry');
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } 
    // else {
    //     printf('<h1>KONEKSI KESAMBUNG WOI</h1>');
    // }
?>