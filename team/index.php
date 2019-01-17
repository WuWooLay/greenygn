<?php

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
        for( $i = 0 ; $i < 8 ; $i++) {
    ?>
    
        <div class="col-md-3 justify-content-center">
            <div class="text-center mb-3">
                <div class="TeamImage">
                    <img src="/assets/images/logo/greenygn_animate.svg" alt="Lwin Moe Paing" class="">
                    <div class="mt-2"> <h6> Co-Founder @ Readmal </h6> </div>
                    
                    <?php 
                    
                        $arr = ['Ui/Ux Designer', 'Wit-2018 Design Winner', 'UniHack3-Champion'];
                        
                        foreach($arr as $v) {
                    ?>
                        <div> <a href="#!"> <?= $v ?> </a> </div>

                    <?php
                        }
                    ?>
                    
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