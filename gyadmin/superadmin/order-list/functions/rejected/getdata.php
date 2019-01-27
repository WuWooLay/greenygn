<?php
// Pagination Start
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM `plants` WHERE `deleted_at` IS NULL";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

// Out In Query

// Get Data List Of Orders

$sql = "SELECT * FROM `orders` WHERE `status` = 0 ";
$sql .= " ORDER BY `orders`.`id` DESC LIMIT $offset, $no_of_records_per_page ";


if($res = mysqli_query($conn, $sql)) {
    // Mysql Work?
    // Declare Result
    $result = array();
   
    // Fetching Array To Result
    $i = 0;
    while($row = mysqli_fetch_assoc($res)) {

       $result[$i] = $row;

       $sql = "SELECT `image` FROM `order_details`  ";
       $sql .= " WHERE `order_id` = ". $row["id"] ." ORDER BY `order_details`.`total_amount` LIMIT 0,1";

       $result[$i]['image'] =   mysqli_fetch_assoc(mysqli_query($conn, $sql))['image'];

       $i++;
    }
}

// echo "<pre>";
// print_r($result);
// die();