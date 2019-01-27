<?php


    // Get Plants List

    $sql = "SELECT COUNT(id) as `count` FROM `plants`";
    $plant_list = 0;

    if($result = mysqli_query($conn, $sql)) {
        $plant_list = mysqli_fetch_assoc($result)["count"];
    }

    // echo"<pre>";
    // print_r($plant_list);
    // die();


    // Get Orders List
    $sql = "SELECT COUNT(id) as `count` FROM `orders`";
    $order_list = 0;
  
    if($result = mysqli_query($conn, $sql)) {
          $order_list = mysqli_fetch_assoc($result)["count"];
    }
  
    // echo"<pre>";
    // print_r($order_list);
    // die();
  

    // Get Forums List

    $sql = "SELECT COUNT(id) as `count` FROM `forum`";
    $forum_list = 0;
  
    if($result = mysqli_query($conn, $sql)) {
          $forum_list = mysqli_fetch_assoc($result)["count"];
    }
  
    // echo"<pre>";
    // print_r($forum_list);
    // die();


    // Get Users List

    $sql = "SELECT COUNT(id) as `count` FROM `users`";
    $user_list = 0;
  
    if($result = mysqli_query($conn, $sql)) {
          $user_list = mysqli_fetch_assoc($result)["count"];
    }
  
    // echo"<pre>";
    // print_r($forum_list);
    // die();


    // Get Admin List

    $sql = "SELECT COUNT(id) as `count` FROM `admin`";
    $admin_list = 0;
  
    if($result = mysqli_query($conn, $sql)) {
          $admin_list = mysqli_fetch_assoc($result)["count"];
    }
  
    // echo"<pre>";
    // print_r($forum_list);
    // die();

    
  
  
      

  
      

