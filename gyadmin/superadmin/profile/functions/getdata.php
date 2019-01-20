<?php

// print_r($_SESSION['admin']);
// die();

// Get Data 
$email = $_SESSION['admin']['email'];
$sql = "SELECT * FROM `admin` WHERE `email` LIKE '$email' ";

if($result = mysqli_query($conn, $sql)) {
    // Mysql Work?

    // getResult
    $result = (mysqli_fetch_assoc($result));

    // echo "<pre>";
    // print_r($result);
    // die();
}

