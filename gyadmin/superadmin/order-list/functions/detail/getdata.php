<?php

    $sql = "SELECT `orders`.* , `users`.`image` AS `user_image` FROM `orders` ";
    $sql .= " INNER JOIN `users` ON `orders`.`user_id`  = `users`.`id` ";
    $sql .= " WHERE `orders`.`id` = " . $_GET['id'];

    // echo $sql;
    // die("");

    if($row = mysqli_query($conn, $sql)) {
        
        if($row->num_rows == 0) {
            header("Location: " . "/gyadmin/superadmin/order-list/");
            die("");
        }
        
        $result = mysqli_fetch_assoc($row);

        $sql = "SELECT  `order_details`.*, `plants`.`name` AS `plant_name` FROM `order_details` ";
        $sql .= " INNER JOIN `plants` ON `order_details`.`plant_id`  = `plants`.`id` ";
        $sql .= " WHERE `order_id` = " . $_GET['id'];

        // echo $sql;
        // die("");

        $order_details = array();
        if($row = mysqli_query($conn, $sql)) {
            while($order_row = mysqli_fetch_assoc($row)) {
                $order_details[] = $order_row;
            }           
        }


        // echo "<pre>";
        // print_r($result);
        // print_r($order_details);
        // die();

    } else {
        header("Location: " . "/users/orderlist");
        die("NNN");
    }