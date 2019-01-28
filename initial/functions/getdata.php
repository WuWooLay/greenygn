<?php

// Out In Query
$role = [
    '`p`.`id`',
    '`p`.`image`',
    '`p`.`name`',
    '`p`.`price`',
    '`p`.`admin_id`'
];

// Get Data List Of Plants
$sql  = "SELECT " . implode(",",$role) . ", `cat`.`id` as `cat_id`, `cat`.`name` as `category_name`, `a`.`name` as `admin_name` FROM `plants` as `p`";
$sql .= " INNER JOIN `category` as `cat` ON  `p`.`category_id` = `cat`.`id` ";
$sql .= " INNER JOIN `admin` as `a` ON `p`.`admin_id` = `a`.`id` ";
$sql .= " WHERE `p`.`deleted_at`  IS NULL  ORDER BY `p`.`id` DESC LIMIT 0, 4 ";

// die($sql);

if($res = mysqli_query($conn, $sql)) {
    // Mysql Work?
    // Declare Result
    $plants = array();
   
    // Fetching Array To plants
    while($row = mysqli_fetch_assoc($res)) {
       $plants[] = $row;
    }

    
    // echo "<pre>";
    // foreach($plants as $k => $v) {
    //     echo $k .  "<br>" ;
    //     // echo ($v["deleted_at"]) ? "true" : "false" . "<br>" ;
    //     print_r($v);
    // }
    // die();
}
