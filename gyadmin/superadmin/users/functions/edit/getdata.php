<?php


if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {
    // Get Data
    $sql = "SELECT * FROM `users` WHERE id = " . $_GET['id'];

    if($result = mysqli_query($conn, $sql)) {
        // Mysql Work?
                    // getResult
                    $result = (mysqli_fetch_assoc($result));
                    // echo "<pre>";
                    // print_r($result);
                    // die();
    }


} else {
    header('Location: ' . '/gyadmin/superadmin/users/');
    die();
}

