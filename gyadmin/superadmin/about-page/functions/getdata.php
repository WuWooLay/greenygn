<?php


    $sql = "SELECT `about_page`.* , `a`.`name` as `admin` FROM `about_page` ";
    $sql .= " INNER JOIN `admin` as a ON ";
    $sql .= " `about_page`.`admin_id` = `a`.`id` WHERE `about_page`.`id` = 1";

    
if($res = mysqli_query($conn, $sql)) {
    // Mysql Work?
    // Declare Result
    $result = array();
   
    // Fetching Array To Result
    while($row = mysqli_fetch_assoc($res)) {
       $result = $row;
    }

    
    // echo "<pre>";
    // print_r($result);
    // foreach($result as $k => $v) {
    //     echo $k .  "<br>" ;
    //     // echo ($v["deleted_at"]) ? "true" : "false" . "<br>" ;
    //     print_r($v);
    // }

    // die();
}
