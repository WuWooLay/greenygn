<?php

// print_r($_SESSION['admin']);
// die();

// Get Data 
$email = $_SESSION['user']['email'];
$sql = "SELECT * FROM `users` WHERE `email` LIKE '$email' ";

if($result = mysqli_query($conn, $sql)) {
    // Mysql Work?

    // getResult
    $result = (mysqli_fetch_assoc($result));

    // echo "<pre>";
    // print_r($result);
    // die();
}

