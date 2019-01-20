<?php

    function save_image($image_url) {
        global $conn;
        $sql = "UPDATE `admin` SET `image` = '/assets/images/admins/".  $image_url ;
        $sql .= "' WHERE `admin`.`id` = " . $_POST['id'];

        return mysqli_query($conn, $sql);
    }

    if(isset($_POST['upload_image']))
    {
        

        // Declare Req Array Errors or Success
        $req = ['errors' => array(), 'success' => array()];

        $file = $_FILES["file"]["tmp_name"];

        if($check = @getimagesize($file)) {
            // Check Image True

            // Allowed Extension
            $allowed =  ['png', 'jpg', 'jpeg'];
            // Get Origininal File's Extension
            $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

            if( in_array($ext, $allowed) ) {
                // Image Type is Allowed in Array
                
                // Check file size
                $KB = ($_FILES["file"]["size"]/1024);
                if (($KB/1024) > 1) {
                    $req['errors'][] = "Sorry, your file is Larger Than 1Mb .";
                }

                // If All Are Okay
                if( count($req['errors']) == 0 ) {
                    // $req['success'][] = "All Are Okay ";

                    // Declare Patch
                    $path = __DIR__ . "/../../../../../assets/images/admins/";
                    // New Name
                    $newName =  "id" . $_POST['id'] . "_" . date("H_i_s") . "_" . uniqid() . "." . $ext;

                    // check Extenstion
                    switch ($ext) {
                        case 'jpg':
                        case 'jpeg':
                          //Make Jpeg
                          $image = imagecreatefromjpeg($file);
                          break;
                        case 'png':
                          //Make Png
                          $image = imagecreatefrompng($file);
                          break;
                    }

                    list($w, $h) = $check;

                    // echo "<pre>";
                    // print_r(  $h );
                    // die();
                    // get width $w and height $h for the image

                    // If Height is Greader Than Width
                    
                    if ($w < $h) // then keep the width and scale the height
                    { 
                        $image = imagecrop($image, array(
                                                    "x" => 0,
                                                    "y" => ($w - $h) / 2,
                                                    "width" => $w,
                                                    "height" => $w
                        ));
                    }
                    else if ($h < $w) 
                    {

                        // then keep the height and scale the width
                        $image = imagecrop($image, array(
                                                    "x" => ($w - $h) / 2,
                                                    "y" => 0,
                                                    "width" => $h,
                                                    "height" => $h
                        ));
                    }

                    // if($h > $w ) {
                    //     $_SESSION['errors'] = "Height Is Greater Than Width Plz ReUpload";
                    //     die( header("Location: " . "/gyadmin/superadmin/admins/edit.php?id=" . $_POST['id']) );
                    // }

                    if( floor($h/$w) != 1 ) {
                        // If Width is not equal to Height ;
                        // Check For Make Images ANd Croping Save
                        switch ($ext) {
                            case 'jpg':
                            case 'jpeg':
                            //Make Jpeg
                            if (
                                imagejpeg($image, $path . $newName)
                            ) {
                                if (save_image($newName)) {$req['success'][] = "Successfully Uploaded";}
                                else {$req['errors'][] = "Errors: DB WRONG !";} 
                            }
                            break;
                            case 'png':
                            //Make Png
                            if (
                                imagepng($image, $path . $newName)
                            ){
                                if (save_image($newName)) {$req['success'][] = "Successfully Uploaded";}
                                else {$req['errors'][] = "Errors: DB WRONG !";} 
                            }
                            break;
                        }
                    } else {
                        // Same Width Height
                        if(move_uploaded_file($file, $path . $newName)) {
                            $sql = "UPDATE `admin` SET `image` = '".  "/assets/images/admins/" . $newName ;
                            $sql .= "' WHERE `admin`.`id` = " . $_POST['id'];
                            // die($sql);
                            if(mysqli_query($conn, $sql))  {
                                $req['success'][] = "Successfully Uploaded";
                            } else {
                                $req['errors'][] = "Errors: DB WRONG !";
                            } 

                        }
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

      
        // echo '<pre>';
        // var_dump($_FILES);
        // echo "id" . $_POST['id'] . "_" . uniqid();
        // $KB = ($_FILES["file"]["size"]/(1024 * 1024));
        // echo "<br>" . $KB . "MB";
        // // echo "<br>" . ($KB/1024) . "MB";
        // echo '</pre>';
        // die();
    }



