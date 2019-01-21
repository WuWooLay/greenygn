<?php

    // Super Admin Index.php
    
    // Connect Mysql 
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
    <div class="container-fluid mt-3">

        <div class="row">

            <!-- Url List Container -->
            <div class="col-md-3">

                <?php 
                    // Require " Url List "
                    require __DIR__ . "/view/left_url_list/left_url_list.php";
                ?>

            </div>
            <!-- Url List Container -->

            <!-- Normal Container -->
            <div class="col-md-9">
            
            </div>
            <!-- Normal Container End -->

        </div>
    
    </div>
    <!-- Container Start End -->

<?php

    // Require "Preloading"
    require __DIR__ . "/../../initial/view/preloading/preloading.php";

    // Require "Footer"
    require __DIR__ . "/view/finish_footer.php";
?>

