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
        $sql = "SELECT * FROM `users` WHERE `email` LIKE '$email'";
        
        if($result = mysqli_query($conn, $sql)) {
        // Mysql Work?

            if(mysqli_num_rows($result) == 1 ) {
            // Check Email is Used
                
                // Check Password is Wrong or Right
                $result = (mysqli_fetch_assoc($result));

                // Password Verify
                if(password_verify($password , $result['password'])) {
                    // Success Password

                    // echo "<pre>";
                    // print_r($result);
                    // die();

                    if($result['deleted_at']) {
                        $db_errors[] = "Your Acc Has Been Baned , You Can Contact Us.";
                    } else {
                        $_SESSION['user'] = [
                            'name' => $result['name'],
                            'role' => 'User',
                            'email' => $email,
                            'image' => $result['image'],
                            'id' => $result['id'],
                            'ph' => $result['ph'],
                            'address' => $result['address']
                        ];
                        header('Location: ' . '/users');

                    }
                    

                    // If Login User

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

