<?php


function validation ($str) {
   return  trim(htmlspecialchars($str));
}

function login () {
    global $email, $password, $errors,
    $db_errors, $conn;

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

    if(count($errors) == 0 ) {
        
        // Check This Email is There ?
        $sql = "SELECT * FROM `admin` WHERE `email` LIKE '$email'";
        
        if($result = mysqli_query($conn, $sql)) {
        // Mysql Work?

            if(mysqli_num_rows($result) == 1 ) {
            // Check Email is Used
                
                // Check Password is Wrong or Right
                $result = (mysqli_fetch_assoc($result));

                // Password Verify
                if(password_verify($password , $result['password'])) {
                    // Success Password

                    $_SESSION['admin'] = [
                        'name' => $result['name'],
                        'role' => $result['role'],
                        'email' => $email
                    ];

                    // If Login User
                    if($result['admin_role_id' == 1]) {
                        header('Location: ' . '/gyadmin/superadmin');
                    } else {
                        header('Location: ' . '/gyadmin/admin');
                    }

                } else {
                    // Wrong Password
                    $db_errors[] = "Your Password is Wrong";
                }  

            } else {
                // Mysqli Insert Error
                $db_errors[] = "Your Email is Not Registered ";
            }

        } else {
             // Mysqli Insert Error
             $db_errors[] = "Error: " . mysqli_error($conn);
        }

    }
    
}

if(isset($_POST['submit'])) 
{
    login();
}

