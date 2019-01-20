<?php

if (isset($_SESSION['admin']))
{
  $result = $_SESSION['admin'];

  // If Login User
  //   print_r($_SESSION['admin']);
  //   die();

  if($_SESSION['admin']['admin_role_id'] != 1) {
      header("Location: " . "/gyadmin/admin/");
  }
  
} else {
   //   Not Admin  
      header("Location: " . "/");
}

