<?php

// HTML Special Character Remove
function validation ($str) {
    return  trim(htmlspecialchars($str));
}

// Register Function
function register () {
    global $email, $password, $name, $ph,
    $confirmpassword, $errors, $db_errors,
    $conn;

    // For Errors Count
    $errors = array();

    // Validate Email
    $email = isset($_POST['email']) ? validation($_POST['email']) : '' ;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid Email';
    }

    
    // Validate Name
    $name = isset($_POST['name']) ? validation($_POST['name']) : '' ;
    if (strlen($name) < 3 ) {
        $errors['name'] = 'Please enter a long Name AtLeast 3';
    }

    
    // Validate ph
    $ph = isset($_POST['ph']) ? validation($_POST['ph']) : '' ;
    if (strlen($ph) < 9 ) {
        $errors['ph'] = 'Please enter a long ph AtLeast 8';
    }

    // Vlidate Password
    $password = isset($_POST['password']) ? validation($_POST['password']) : '' ;
    if (strlen($password) < 6) {
        $errors['password'] = 'Please enter a long password AtLeast 6';
    }

    
    // Validate Confirm Password
    $confirmpassword = isset($_POST['confirmpassword']) ? validation($_POST['confirmpassword']) : '' ;
    if ($password != $confirmpassword) {
        $errors['confirmpassword'] = 'Password are Not The Same ';
    }

    // If There is no errors
    if(count($errors) == 0 ) {  
        
        // Check This Email is used ?
        $sql = "SELECT * FROM `users` WHERE `email` LIKE '$email'";
        
        if ($result = mysqli_query($conn, $sql)) {

            if(mysqli_num_rows($result) > 0 ) {
                // Check Email is Already Used
                $db_errors[] = "Your Email is Already Used .";
            } else {

                // If Email is Right

                // Make Password Hash
                $arr['input_hash'] = password_hash($password, PASSWORD_DEFAULT);
        
                // Insert New User
                $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `ph`,";
                $sql .= " `address`, `bio`, `deleted_at`, `created_at`, `modified_at`)";
                $sql .= " VALUES (NULL, '$name', '$email', '". $arr['input_hash'] ."', '$ph', NULL, NULL, NULL, NOW(), NOW())"; 
        
                if (mysqli_query($conn, $sql)) {
        
                    $_SESSION['user'] = [
                        'name' => $name,
                        'role' => 'User',
                        'email' => $email
                    ];

                    // If Login User
                    header('Location: ' . '/users');
        
                } else {
                    // Mysqli Insert Error
                    $db_errors[] = "Error: " . mysqli_error($conn);
                }
            }

        } else {
             // Mysqli Insert Error
             $db_errors[] = "Error: " . mysqli_error($conn);
        }
        
        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";
    }

}

if(isset($_POST['submit']))
{
    register();
}


