<?php

// Connect Mysql
require __DIR__ . "/../conn/index.php";


// If User Session
if (isset($_SESSION['user']))
{
  // logged in !
  header("Location: " . "/users");

} else if (isset($_SESSION['admin']))
{
  $result = $_SESSION['admin'];

  echo "<pre>";
  print_r($_SESSION['admin']);
  echo "</pre>";
  // If Login User
  if($_SESSION['admin']['admin_role_id'] == 1) {
      header('Location: ' . '/gyadmin/superadmin');
  } else {
      header('Location: ' . '/gyadmin/admin');
  }

}

