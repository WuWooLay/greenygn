<?php


    if(isset($_SESSION['cart'])) {
        $total_price = 0;
        // Looping Each Cart Plant's ID
        foreach($_SESSION['cart'] as $key => $v ):
            
            $sql = "SELECT `id`, `image`, `name`, `price` FROM `plants` WHERE id = " . $key;
            
            if( $result = mysqli_query($conn, $sql)) {
                // Check Id is Right or Wrong
                if( $result->num_rows == 1 ) {
                    
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['cart'][$key] = [
                        'id' => $row['id'],
                        'image' => $row['image'],
                        'name' => $row['name'],
                        'price' => $row['price'],
                        'quantity' => 1,
                        'totalprice' => $row['price'],
                    ];
                    // print_r($row);
                    $total_price+=$row['price'];
                } else {
                    //Wrong ID
                    unset($_SESSION['cart'][$key]);

                    if(count($_SESSION['cart']) == 0) {
                        unset($_SESSION['cart']);
                    }
                }
                
            } else {
                // NOt Working DB Unset This Cart
                unset($_SESSION['cart'][$key]);
                if(count($_SESSION['cart']) == 0) {
                    unset($_SESSION['cart']);
                }
            }
            // echo $sql . "<br>";
            // print_r($v);
        endforeach;

        // echo $total_price;
        // print_r($_SESSION['cart']);
        // die();
    }