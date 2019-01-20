<?php



    if(isset($_POST['submit'])) {

        $errors = array() ;
        
        $description = isset($_POST['description']) ? validation($_POST['description']) : '' ;
        $description = preg_replace('/\s+/', ' ', $description);
        if (strlen($description) == 3 ) {
            $errors['description'] = 'Please enter a long Name AtLeast 3';
        }

        if(count($errors) > 0 ) {

        } else {
            // echo "<pre>";
            // print_r($_POST);
            // die();
            $sql = "UPDATE `about_page` SET `description` = '$description',";
            $sql .= " `admin_id` = '". $_POST['admin_id'] ."' WHERE `about_page`.`id` = 1";

            if(mysqli_query($conn, $sql)) {
                $_SESSION['success'] = "Successfully Updated";
            } else {
                $_SESSION['errors'] = "DB Errors : " . mysqli_error($conn);
            }

        }
        // echo "<pre>";
        // print_r($_POST);
        // die();
    }

    // HTML Special Character Remove
    function validation ($str) {
        return  trim(htmlspecialchars($str));
    }