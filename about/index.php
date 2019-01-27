<?php

    // Connect to DB
    require __DIR__ . "/..//initial/conn/index.php";

    // Function Call
    require __DIR__ . "/functions/getdata.php";

    $title = "About";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Team Container Start -->
<div class="container-fluid mt-4">

    <h4 class="text-center mb-4"> About Of Us  </h4>

    <?php 
        foreach($result as $k => $v) {
    ?>
        <h5 class="text-center"><?= $v['description'] ?></h5>
    <?php
        }
    ?>

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