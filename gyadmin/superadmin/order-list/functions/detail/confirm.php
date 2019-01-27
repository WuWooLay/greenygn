<?php

    if(isset($_POST['confirm_submit'])){

        $sql = "UPDATE `orders` SET `status` = '2' WHERE `orders`.`id` = " . $_POST['id'];

        if(mysqli_query($conn, $sql)) {

        } else {
            $_SESSION['errors'] = 'Errors: ' . mysqli_error($conn);
        }
        // print_r($_POST);
        // die("");
    }
