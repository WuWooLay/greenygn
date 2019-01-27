<?php

// Validation Get Id
if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {

        
        $sql = "SELECT * FROM `forum` WHERE `id` = " . $_GET['id'];
        
        if( $result = mysqli_query($conn, $sql)) {
           
            if( $result->num_rows == 1 ) {
                $result = mysqli_fetch_assoc($result);
               
                // echo "<pre>";
                // print_r($result);
                // die();

            } else {
                
                header('Location: ' . '/forum');
                die();
            }
        }
} else {
    header('Location: ' . '/forum');
    die();
}



