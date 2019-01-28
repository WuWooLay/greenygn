<?php

    // Middle ware
    require __DIR__ . "/initial/middlewares/auth_sessions.php";

    // Functions
    require __DIR__ . "/initial/functions/getdata.php";


    $title = "Home";

    // Require "Start Header"
    require __DIR__ . "/initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/initial/view/nav/navbar.php";
?>

<!-- Icon And Watch And Login -->
<div class="WatchAndLogin">

</div>
<!-- Icon And Watch And Login End-->

<!-- About Of Us -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center"> What We Are Doing?</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni cum et, laudantium deleniti reiciendis itaque ipsam cumque rem! Earum iusto sit magnam ipsum, quasi molestiae est assumenda amet magni fugit!
            </p>
        </div>
    </div>
</div>
<!-- About Of Us End-->

<!-- Some Plant Show -->
<div class="container-fluid mt-3">
    <div class="row">
  
    <?php 
        foreach($plants as $v):
    ?>  
        <!-- Foreach Plants -->
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card">
                <div class="Plant_Card_Bg_Image" style="background-image:url('<?= $v['image'] ?>')">

                </div>
                <div class="card-body text-center">
                                                        
                    <h5 class="card-title">
                        <?= $v['name'] ?> 
                        <a href="/login" class="badge badge-pill badge-primary Plant_Card_Badge">
                        <?= $v['category_name'] ?>
                        </a>
                    </h5>

                    <p class="card-text">
                    Price : <?= $v['price'] ?> Kyats
                    </p>

                    <a href="/login" class="btn btn-primary btn-sm">Buy Now </a>
                </div>
            </div>
        </div>
        <!-- Foreach Plants End-->
    <?php
        endforeach;
    ?>
</div>
</div>
<!-- Some Plant Show End-->


<?php
    // Require "Preloading"
    require __DIR__ . "/initial/view/preloading/preloading.php";

    // Require "Footer"
    require __DIR__ . "/initial/view/footer/footer.php";

    // Require "End Footer"
    require __DIR__ . "/initial/view/finish_footer.php";

?>