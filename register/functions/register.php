<?php

// HTML Special Character Remove
function validation ($str) {
    return  trim(htmlspecialchars($str));
}

// Register Function
function register () {
    global $email, $password, $confirmpassword, $errors, $conn;

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

    $confirmpassword = isset($_POST['confirmpassword']) ? validation($_POST['confirmpassword']) : '' ;
   
    if ($password != $confirmpassword) {
        $errors['confirmpassword'] = 'Password are Not The Same ';
    }

    // Validate Confirm Password



}

if(isset($_POST['submit']))
{
    register();
}


