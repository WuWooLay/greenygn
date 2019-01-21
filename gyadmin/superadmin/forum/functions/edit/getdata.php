<?php

// Validation Get Id
if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {

        
        $sql = "SELECT * FROM `forum` WHERE `id` = " . $_GET['id'];
        
        if( $result = mysqli_query($conn, $sql)) {
           
            if( $result->num_rows == 1 ) {

            } else {

            }
        }

} else {
    header('Location: ' . '/gyadmin/superadmin/forum/');
    die();
}



