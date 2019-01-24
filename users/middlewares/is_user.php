<?php

if (!isset($_SESSION['user']))
{   //   Not User  
      header("Location: " . "/");
}

// echo "<pre>";
// print_r($_SESSION['user']);

// die();
