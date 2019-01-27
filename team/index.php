<?php

    // Connect to DB
    require __DIR__ . "/..//initial/conn/index.php";

    // Functions
    require __DIR__ . "/functions/getdata.php";

    $title = "Team";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Team Container Start -->
<div class="container-fluid mt-4">

    <h4 class="text-center mb-4"> Green Yangon Team </h4>

    <div class="row">

    <?php
        foreach($result as $k => $v) {
    ?>
    
        <div class="col-md-3 justify-content-center">
            <div class="text-center mb-3">
                <div class="TeamImage">
                    <img src="<?= $v['image'] ?>" alt="<?= $v['name'] ?>" class="rounded-circle">
                    <div class="mt-2"> <h6> <?= $v['name'] ?> </h6> </div>
                    <div class="mt-2"> <h6> <?= $v['position'] ?> </h6> </div>
                </div>
            </div>
        </div>

    <?php      
        }
    ?>
    </div>
</div>
<!-- Team Container End -->


<?php
    // Require "Preloading"
    require __DIR__ . "/..//initial/view/preloading/preloading.php";
    
    // Require "Footer"
    require __DIR__ . "/..//initial/view/footer/footer.php";

    // Require "End Footer"
    require __DIR__ . "/..//initial/view/finish_footer.php";

?>