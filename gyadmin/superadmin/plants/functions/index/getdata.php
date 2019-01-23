<?php

// Pagination Start
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$cat = (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) ? "AND `p`.`category_id` = " . $_GET['cat_id'] : ""; 

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM `plants` WHERE `deleted_at` IS NULL";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

// Out In Query
$role = [
    '`p`.`id`',
    '`p`.`image`',
    '`p`.`name`',
    '`p`.`price`',
    '`p`.`admin_id`',
    '`p`.`deleted_at`'
];

// Get Data List Of Plants
$sql  = "SELECT " . implode(",",$role) . ", `cat`.`name` as `category_name`, `a`.`name` as `admin_name` FROM `plants` as `p`";
$sql .= " INNER JOIN `category` as `cat` ON  `p`.`category_id` = `cat`.`id` ";
$sql .= " INNER JOIN `admin` as `a` ON `p`.`admin_id` = `a`.`id` ";
$sql .= " WHERE `p`.`deleted_at`  IS NULL  $cat ORDER BY `p`.`id` DESC LIMIT $offset, $no_of_records_per_page ";

// die($sql);

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
    // die();
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