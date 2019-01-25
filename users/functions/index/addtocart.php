<?php

    session_start();


    // Page Dir For Redirect
    if(isset($_GET['page_dir']) && $_GET['page_dir']!= "") {
        $page_dir = $_GET['page_dir'] . ".php";
    } else {
        $page_dir = "index.php";
    }

    // Page Number
    if(isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    // If Cat Search 
    if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
        $cat_id = "cat_id=". $_GET['cat_id'];
    } else {
        $cat_id = "";
    }

    // If Get Plants Id & Set Session
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'] ;

        // Set Session And Delete Session Undo
        if(isset($_SESSION['cart'][$id])){

            unset($_SESSION['cart'][$id]);


            if(count($_SESSION['cart']) == 0) {
                unset($_SESSION['cart']);
            }
            
        } else {
            $_SESSION['cart'][$id] = [
                "quantity" => 1,
            ];
        }

        header("Location: " . "/users/$page_dir?page=$page&" . (isset($_GET['cat_id']) ? $cat_id : ""));
        die("/users/$page_dir?page=$page&". isset($_GET['cat_id']) ? $cat_id : "");

    } else {
        header("Location: " . "/users/$page_dir?page=$page&". (isset($_GET['cat_id']) ? $cat_id : ""));
        die("/users/$page_dir?page=$page&". isset($_GET['cat_id']) ? $cat_id : "");
    }

    
    echo '<br>' . $page_dir;
    die();

?>