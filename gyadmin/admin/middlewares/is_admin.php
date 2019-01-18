<?php

if (isset($_SESSION['admin']))
{
  $result = $_SESSION['admin'];
  // If Login Admin User 
  //   print_r($_SESSION['admin']);
  //   die();
  if($_SESSION['admin']['admin_role_id'] != 2) {
      header("Location: " . "/gyadmin/superadmin/");
  }

} else {
   //   Not Admin  
      header("Location: " . "/");
}

