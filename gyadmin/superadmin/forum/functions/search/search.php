<?php


if( isset ($_GET['title'] )) {


    $title = validation($_GET['title']);

    if(strlen($title) < 2 ) {
        header("Location: " . "/gyadmin/superadmin/forum/");
        die("");
    }

    // Out In Query
    $role = [
        '`f`.`id`',
        '`f`.`image`',
        '`f`.`title`',
        '`f`.`admin_id`',
        '`f`.`deleted_at`'
    ];

    $sql = "SELECT " . implode(",",$role) .", `ar`.`name` as `admin_name`, `ar`.`ph` ";
    $sql .= " FROM `forum` as `f` INNER JOIN `admin` as `ar` ";
    $sql .= " ON `f`.`admin_id`= `ar`.`id` WHERE `f`.`title` LIKE '%$title%' ORDER BY `f`.`id` DESC";

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
    
        // die(" EI ");
    } 

} else {
    header("Location: " . "/gyadmin/superadmin/forum/");
    die("");
}

function validation($str) {
    return  trim(htmlspecialchars($str));
}
