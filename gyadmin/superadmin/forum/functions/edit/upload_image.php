<?php




if(isset($_POST['upload_image']))
{
    upload();
}

function upload() {
    global $conn, $req;

    // Declare Request Array
    $req = ['errors' => array(), 'success' => array() ];

    // Get id
    $req['id'] = $_POST['id'];

    // Validate Image
    $file = $_FILES["file"]["tmp_name"];

    if($check = @getimagesize($file)) {
        // Check Image True But If Error Occur We Show Errors
        
            // Allowed Extension
            $allowed =  ['png', 'jpg', 'jpeg'];
        
            // Get Origininal File's Extension
            $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        
            if( in_array($ext, $allowed) ) {
                // Image Type is Allowed in Array
                
                // Check file size
                $KB = ($_FILES["file"]["size"]/1024);
                if (($KB/1024) > 2) {
                    $req['errors'][] = "Sorry, your file is Larger Than 2Mb .";
                }
        
                // If All Are Okay
                if( count($req['errors']) == 0 ) {
                    // $req['success'][] = "All Are Okay ";
        
                    // Declare Patch
                    $path = __DIR__ . "/../../../../../assets/images/forums/";
                    // New Name
                    $newName =  "admin_id" . $_SESSION['admin']['id'] . "_" . date("H_i_s") . "_" . uniqid() . "." . $ext;
        
                    // Same Width Height
                    if(move_uploaded_file($file, $path . $newName)) {
                          
                           $sql = "UPDATE `forum` SET `image` = '/assets/images/forums/$newName'";
                           $sql .= " WHERE `forum`.`id` = " . $req['id'];
                            
                            // die($sql);

                            if(mysqli_query($conn, $sql))  {
                                $req["name"] = "";
                                $req["price"] = "";
                                $req['success'][] = "Successfully Uploaded Images";
                            } else {
                                $req['errors'][] = "Errors: DB WRONG !";
                            } 
        
                    } else {
                        $req['errors'][] = "Can't Upload Something Wrong";
                    }
                    
        
                    // echo "<pre>";
                    // print_r($check);
                    // die();
        
                }else if( count($req['errors']) != 0 ) {
                    // Continue Show Errors
                } else {
                    // Something Wrong
                    $req['errors'][] = "Something Wrong!!";
                }
        
        
            } else {
                // Not Image In Array
                $req['errors'][] = "$ext".  " JPG, PNG files Not Found In Image Array"; 
            }

    
    } else {
        //Check Not Image
        $req['errors'][] = "Only JPG & PNG files R allowed But Your " . $_FILES["file"]["name"];
    }


    
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // print_r($req);
    // echo (isset($newName)) ? "$newName" : "None" ;
    // die("");
}

