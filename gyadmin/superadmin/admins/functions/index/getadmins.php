<?php


$role = [
    '`a`.`id`',
    '`a`.`name`',
    '`a`.`email`',
    '`a`.`admin_role_id`',
    '`a`.`image`',
    '`a`.`ph`',
    '`a`.`deleted_at`'
];

$sql = "SELECT " . implode(",",$role) .", `ar`.`name` as `role_name` ";
$sql .= " FROM `admin` as `a` INNER JOIN `admin_role` as `ar` ";
$sql .= " ON `a`.`admin_role_id`= `ar`.`id`";

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