<?php

    // Super Admin Index.php

    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/middlewares/is_superadmin.php";
    
    $title = "Home";

    // Require "Start Header"
    require __DIR__ . "/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/view/nav/navbar.php";

?>

    <!-- Container Start -->
    <div class="container-fluid">


    
    </div>
    <!-- Container Start End -->

<?php
  // Require "Footer"
  require __DIR__ . "/view/finish_footer.php";
?>

