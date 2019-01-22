<?php


if( isset($_POST['category_submit']) ) {
        category_upload();
}

function category_upload() {
        global $conn, $req;

        // Declare Request Array
        $req = ['errors' => array(), 'success' => array() ];

        // Validate Name
        $req['cat_name'] = isset($_POST['cat_name']) ? validation($_POST['cat_name']) : '' ;
        // Delete All White Space
        $req['cat_name'] =  preg_replace('/\s+/', ' ', $req['cat_name']);
        if (strlen($req['cat_name']) < 3 ) {
            $req['errors'][] = 'Must Be Category Name Atleast 3words';
        }
      

        // If All Are Okay
        if( count($req['errors']) == 0 ) {
            // $req['success'][] = "All Are Okay ";

           $sql = "INSERT INTO `category` (`id`, `name`, `created_at`, `modified_at`, `deleted_at`)";
           $sql .= " VALUES (NULL, '". $req['cat_name'] ."', NOW(), NOW(), NULL)";
                                

            if(mysqli_query($conn, $sql))  {
                $req["cat_name"] = "";
                $req['success'][] = "Successfully Uploaded With MoveUploaded";
            } else {
                $req['errors'][] = "Errors: DB WRONG !";
            } 
            
        } else if( count($req['errors']) != 0 ) {
            // Continue Show Errors
        } else {
            // Something Wrong
            $req['errors'][] = "Something Wrong!!";
        }


        // echo "<pre>";
        // print_r($_POST);
        // print_r($req);
        // echo (isset($newName)) ? "$newName" : "None" ;
        // die("");
}




