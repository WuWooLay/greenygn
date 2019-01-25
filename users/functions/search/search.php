<?php

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

// Page Dir For Redirect
if(isset($_GET['page_dir']) && $_GET['page_dir']!= "") {
    $page_dir = $_GET['page_dir'] . ".php";
} else {
    $page_dir = "index.php";
}


if( isset ($_GET['name'] )) {

    // Validation Name
    $name = validation($_GET['name']);
 

   

    if(strlen($name) < 2 ) {
        header("Location: " . "/users/$page_dir?page=$page&" . (isset($_GET['cat_id']) ? $cat_id : ""));
        die("");
    }

    // Out In Query
    $role = [
        '`p`.`id`',
        '`p`.`image`',
        '`p`.`name`',
        '`p`.`price`',
        '`p`.`admin_id`',
    ];
    // Get Data List Of Plants
    $sql  = " SELECT " . implode(",",$role) . ", `cat`.`id` as `cat_id`, `cat`.`name` as `category_name`, `a`.`name` as `admin_name` FROM `plants` as `p`";
    $sql .= " INNER JOIN `category` as `cat` ON  `p`.`category_id` = `cat`.`id` ";
    $sql .= " INNER JOIN `admin` as `a` ON `p`.`admin_id` = `a`.`id` ";
    $sql .= " WHERE `p`.`deleted_at` IS NULL AND `p`.`name` LIKE '%$name%' ORDER BY `p`.`id` DESC LIMIT 0,20";

    // die($sql . "<br>");

    if($res = mysqli_query($conn, $sql)) {
        // Mysql Work?
        // Declare Result
        $result = array();
       
        // Fetching Array To Result
        while($row = mysqli_fetch_assoc($res)) {
           $result[] = $row;
        }
    
        
        // echo "<pre>";
        // foreach($result as $k => $v) {
        //     echo $k .  "<br>" ;
        //     // echo ($v["deleted_at"]) ? "true" : "false" . "<br>" ;
        //     print_r($v);
        // }
    
        // die(" ");
    } 

} else {
    header("Location: " . "/users/$page_dir?page=$page&" . (isset($_GET['cat_id']) ? $cat_id : ""));
    die("");
}

function validation($str) {
    return  trim(htmlspecialchars($str));
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