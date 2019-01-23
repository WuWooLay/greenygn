<?php


if( isset ($_GET['name'] )) {


    $name = validation($_GET['name']);

    if(strlen($name) < 2 ) {
        header("Location: " . "/gyadmin/superadmin/plants/");
        die("");
    }

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
    $sql  = " SELECT " . implode(",",$role) . ", `cat`.`name` as `category_name`, `a`.`name` as `admin_name` FROM `plants` as `p`";
    $sql .= " INNER JOIN `category` as `cat` ON  `p`.`category_id` = `cat`.`id` ";
    $sql .= " INNER JOIN `admin` as `a` ON `p`.`admin_id` = `a`.`id` ";
    $sql .= " WHERE `p`.`deleted_at` IS NULL AND `p`.`name` LIKE '%$name%'  ORDER BY `p`.`id` DESC  LIMIT 0,20";

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
    header("Location: " . "/gyadmin/superadmin/plants/");
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