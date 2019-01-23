<?php

// Pagination Start
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM `forum`";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


$sql = "SELECT * FROM `users`";
$sql .= " ORDER BY `users`.`id` DESC LIMIT $offset, $no_of_records_per_page ";
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