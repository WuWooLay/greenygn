<?php


    if(isset($_POST['submit'])) {
        
        // echo "<pre>";

        $arr = json_decode($_POST["formArray"]);
        

        $sql = "INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_phone`, `user_address`, `status`, `order_date`, `send_date`, `deleted_at`, `created_at`, `modified_at`) ";
        $sql .= " VALUES (NULL, '".$_SESSION["user"]["id"]."', ";
        $sql .= " '".$_SESSION["user"]["name"]."', '".$_SESSION["user"]["ph"]."', ";
        $sql .= " '".$_SESSION["user"]["address"]."', '1', NOW(), NULL, NULL, NOW(), NOW())";
        
        if(mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            
            foreach($arr as $v) {
                $sql = "INSERT INTO `order_details` (`order_id`, `plant_id`, `image`, `quantity`, `plant_amount`, `total_amount`) ";
                $sql .= " VALUES ('$id', '$v->id', '$v->image', '$v->quantity', '$v->price', '$v->totalprice')";
                // echo "<br> $sql";
                mysqli_query($conn, $sql);
            }

            $_SESSION['success'] = "Successfully Pending";
            unset($_SESSION['cart']);
            // Redirect to Detail Cart
            header("Location:". "/users/orderlist/detail.php?id=" . $id );
            die();
        } else {
            $_SESSION['error'] = "ERROR : " . mysqli_error($conn);
        }
        // $id = mysqli_insert_id($conn)
        // 
        
      

        // print_r($_SESSION);
        // echo "$sql";
        // die("");
    }


