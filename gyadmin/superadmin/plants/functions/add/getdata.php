<?php 

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
