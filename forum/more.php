<?php

    // Connect to DB
    require __DIR__ . "/..//initial/conn/index.php";

    // Function Call
    require __DIR__ . "/functions/more/getdata.php";

    $title = "Forum";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<div class="More_Image_Container" style="background-image:url('<?= $result['image'] ?>')">
        
</div>

<!-- Forum Container Start -->
<div class="container-fluid mt-3">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <h4><?= $result['title'] ?></h4>

            <p><?= $result['description'] ?></p>

        </div>
    </div>

</div>
<!-- Forum Container End -->


<?php
    // Require "Preloading"
    require __DIR__ . "/..//initial/view/preloading/preloading.php";
    
    // Require "Footer"
    require __DIR__ . "/..//initial/view/footer/footer.php";

    // Require "End Footer"
    require __DIR__ . "/..//initial/view/finish_footer.php";

?>


