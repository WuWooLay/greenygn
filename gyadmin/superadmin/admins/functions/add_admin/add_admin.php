<?php

// HTML Special Character Remove
function validation ($str) {
    return  trim(htmlspecialchars($str));
}

// Register Function
function register () {

    global $email, $password, $name,
    $confirmpassword, $errors, $db_errors,
    $conn;

    // For Errors Count
    $errors = array();

    // Validate Email
    $email = isset($_POST['email']) ? validation($_POST['email']) : '' ;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid Email';
    }


    // Vlidate Password
    $password = isset($_POST['password']) ? validation($_POST['password']) : '' ;
    if (strlen($password) < 6) {
        $errors['password'] = 'Please enter a long password AtLeast 6';
    }


    // Validate Name
    $name = isset($_POST['name']) ? validation($_POST['name']) : '' ;
    if (strlen(preg_replace('/\s+/', ' ', $name)) < 3 ) {
        $errors['name'] = 'Please enter a long Name AtLeast 3';
    }
    
    // Validate Confirm Password
    $confirmpassword = isset($_POST['confirmpassword']) ? validation($_POST['confirmpassword']) : '' ;
    if ($password != $confirmpassword) {
        $errors['confirmpassword'] = 'Password are Not The Same ';
    }
   

    // If There is no errors
    if(count($errors) == 0 ) {  
        
        // Check This Email is used ?
        $sql = "SELECT * FROM `admin` WHERE `email` LIKE '$email'";
        
        if ($result = mysqli_query($conn, $sql)) {

            if(mysqli_num_rows($result) > 0 ) {
                // Check Email is Already Used
                $db_errors[] = "Your Email is Already Used .";
            } else {

                // If Email is Right

                // Make Password Hash
                $arr['input_hash'] = password_hash($password, PASSWORD_DEFAULT);

                // Sepcial Is?
                $role = "2";
                if($_SESSION['admin']['id'] == 1) {
                    $role = $_POST['admin_role_id'];
                }

                $default_image = "/assets/images/logo/greenygn_animate.svg";
                // Insert New Admin
                $sql =  "INSERT INTO `admin` (`id`, `name`, `email`, `password`, ";
                $sql .=  "`admin_role_id`, `position`, `other_position`, `image`, `ph`, ";
                $sql .=  "`address`, `bio`, `deleted_at`, `created_at`, `modified_at`) ";
                $sql .=  "VALUES (NULL, '$name', '$email', '".$arr['input_hash']."', '$role', 'admin', '', ";
                $sql .=  "'$default_image', NULL, NULL, NULL, NULL, NOW(), NOW())";
                // die($sql);
                // 
        
                if (mysqli_query($conn, $sql)) {
        
                    header('Location: ' . '/gyadmin/superadmin/admins/');
        
                } else {
                    // Mysqli Insert Error
                    $db_errors[] = "Error: " . mysqli_error($conn);
                }
            }

        } else {
             // Mysqli Insert Error
             $db_errors[] = "Error: " . mysqli_error($conn);
            // echo "<pre>";
            // print_r($arr);
            // print_r($db_errors);
            // echo "</pre>";
            // die();
        }
        
        // echo "<pre>";
        // print_r($arr);
        // print_r($db_errors);
        // echo "</pre>";
        // die();
    }

}

if(isset($_POST['submit']))
{
    register();
}

