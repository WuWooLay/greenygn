<?php 


$sql = "SELECT * FROM `about_page` WHERE id = 1";

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