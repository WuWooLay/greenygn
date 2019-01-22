<?php

// Validation Get Id
if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {

        
        $sql = "SELECT * FROM `plants` WHERE `id` = " . $_GET['id'];
        
        if( $result = mysqli_query($conn, $sql)) {
           
            if( $result->num_rows == 1 ) {
                $result = mysqli_fetch_assoc($result);
               
                // echo "<pre>";
                // print_r($result);
                // die();

            } else {
                
                header('Location: ' . '/gyadmin/superadmin/plants/');
                die();
            }
        }
} else {
    header('Location: ' . '/gyadmin/superadmin/plants/');
    die();
}


// Get data Of Category
$sql = "SELECT * FROM `category` WHERE deleted_at IS NULL ";

if($category = mysqli_query($conn, $sql)) { 

        $category_list = array();

        while($row = mysqli_fetch_assoc($category)) {
            $category_list[] = $row;
        }

        // echo "<pre>";
        // print_r($category_list);
        // foreach($category_list as $v) {
        //     echo $v['name'];
        // }
        // die();
} else {
        $_SESSION['errors'] = "ERRORS: " . mysqli_error($conn);
}

