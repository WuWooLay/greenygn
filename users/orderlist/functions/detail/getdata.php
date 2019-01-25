<?php

    $sql = "SELECT * FROM `orders` WHERE `id` = " . $_GET['id'];

    if($row = mysqli_query($conn, $sql)) {
        
        if($row->num_rows == 0) {
            header("Location: " . "/users/orderlist");
            die("");
        }
        
        $result = mysqli_fetch_assoc($row);

        // Not Self Data Details
        if ($result["user_id"] != $_SESSION['user']['id']) {

            $_SESSION['errors'] = "Not your Data";
            header("Location: " . "/users/orderlist");
            die("");
        }

        $sql = "SELECT  `order_details`.*, `plants`.`name` AS `plant_name`  FROM `order_details` ";
        $sql .= " INNER JOIN `plants` ON `order_details`.`plant_id`  = `plants`.`id` ";
        $sql .= " WHERE `order_id` = " . $_GET['id'];

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