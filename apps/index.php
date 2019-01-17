<?php

    $title = "Application";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Forum Container Start -->
<div class="container-fluid mt-3">

   <!-- Apps -->
   <div class="container-fluid mt-4">

   <h4 class="text-center mb-4"> Other Platform And Applications </h4>

    <div class="row">


        <!-- Green Ways -->
        <div class="col-md-3 justify-content-center">
            <div class="text-center mb-3">
                <div class="TeamImage">

                    <div class="ImageContainer">
                        <img src="/assets/images/apps/greenways.png" alt="Lwin Moe Paing" class="ImageNeedBg ">
                    </div>

                    <div class="mt-2"> <h6>  Greenways </h6> </div>
                    <div> 
                        <p>
                            စိမ္းလန္းေသာျမန္မာ႔ေျမအတြက္ ယံုၾကည္စိတ္ခ်စရာအေကာင္းဆံုး စိုက္ပ်ိဳး/ ေမြးျမဴေရးဆိုင္ရာ ဖုန္းေဆာ႔ဝဲလဲ
                        </p> 
                    </div>
                    <div> 
                        <a class="btn btn-outline-primary" href="https://play.google.com/store/apps/details?id=greenway_myanmar.org" role="button"> Go </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Green Ways End -->

        <!-- Proximity -->
        <div class="col-md-3 justify-content-center">
            <div class="text-center mb-3">
                <div class="TeamImage">
                    <div class="ImageContainer">
                        <img src="/assets/images/apps/proximity.png" alt="Lwin Moe Paing" class="ImageNeedBg ">
                    </div>
                    <div class="mt-2"> <h6>  Proximity Design </h6> </div>
                    <div> 
                        <p>
                            They moved to Myanmar and entered the rural market, working alongside rural farmers
                        </p> 
                    </div>
                    <div> 
                        <a class="btn btn-outline-primary" href="https://proximitydesigns.org/" role="button"> Go </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Proximity End -->
    </div>
    </div>
   <!-- Apps End -->
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


