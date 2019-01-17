<?php

// Connect Mysql
require __DIR__ . "/../conn/index.php";


// If User Session
if (isset($_SESSION['user']))
{
  // logged in !
  header("Location: " . "/user");

} else if (isset($_SESSION['admin']))
{
  // admin Logged in
  header("Location: " . "/gyadmin");
}

