<?php


function validation ($str) {
   return  trim(htmlspecialchars($str));
}

function login () {
    global $email, $password, $errors, $conn;

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

}

if(isset($_POST['submit'])) 
{
    login();
}

