<?php

session_start();
unset($_SESSION['cart']);

header("Location: " . "/users/cart");

die();

?>