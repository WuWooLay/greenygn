<?php

    // Middle ware
    require __DIR__ . "/initial/middlewares/auth_sessions.php";

    // Functions
    require __DIR__ . "/initial/functions/getdata.php";


    $title = "Home";

    // Require "Start Header"
    require __DIR__ . "/initial/view/begin_header.php";
?>



<?php
    // Require "End Header"
    require __DIR__ . "/initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/initial/view/nav/navbar.php";
?>

<!-- Icon And Watch And Login -->
<div class="WatchAndLogin">

    <!-- GetStart COntainer -->
    <div class="GetStartContainer">
        <?php require __DIR__ . "/initial/view/getstart_button/getstart.php" ;?>
    </div>
    <!-- GetStart COntainer End-->

</div>
<!-- Icon And Watch And Login End-->

<!-- About Of Us -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center"> What We Are Doing?</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni cum et, laudantium deleniti reiciendis itaque ipsam cumque rem! Earum iusto sit magnam ipsum, quasi molestiae est assumenda amet magni fugit!
            </p>
        </div>
    </div>
</div>
<!-- About Of Us End-->

<!-- Some Plant Show -->
<div class="container mt-5">
    <div class="row">

    <div class="col-12 justify-content-center mb-3 ">
            <h3 class="text-center"> Plants </h3>
    </div>

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

<!-- Hover To Forum -->
<div class="HoverContainer mt-3 border-top border-bottom">
    <!-- About Forum -->
    <div class="Left">
        
        <div class="container pt-5">
            <div class="row mt-5 justify-content-center">
                <div class="col-11 mt-5">
                    <h3 class="text-center mb-4"> ALL the Forum Content Learn It </h3>

                    <h4 class="text-center">
                        All the Guideline From Former And Agri professional 
                        would give advice to you .
                    </h4>

                    <h4 class="text-center">
                        Warmly Welcome From Green Yangon .
                    </h4>
                </div>
            </div>
        </div>

    </div>
    <!-- About Forum End -->

    <!-- Forum Pic -->
    <div class="Right" id="Hover">
        <!-- Button -->
        <a href="/forum" class="RightLink btn btn-success ">
          Learn From Forum 
        </a>
        <!-- Button End -->
    </div>
    <!-- Forum Pic End-->
</div>
<!-- Hover To Forum End-->

<!-- Clear FLoat -->
<div class="float-clear">

</div>
<!-- Clear FLoat End-->


<?php
    // Require "Preloading"
    require __DIR__ . "/initial/view/preloading/preloading.php";

    // Require "Footer"
    require __DIR__ . "/initial/view/footer/footer.php";
?>
<script>

        $(document).ready( function () {
            
            // Hover Js
            
            
            
            // Svg Success
            $("#Getstart_Middle").on("mouseenter", function () {
                $("#GetStart_Boy_And_Girl").css('transform', 'scale(0.9)');
                $(this).css('transform', 'scale(0.96)');
            });

            $("#Getstart_Middle").on("mouseleave", function () {
                $("#GetStart_Boy_And_Girl").css('transform', 'scale(0)');
                $(this).css('transform', 'scale(1)');
            });

            $("#Getstart_Middle").click(function () {
                location.href = "/login";
            });
        });

</script>
<?php
    // Require "End Footer"
    require __DIR__ . "/initial/view/finish_footer.php";

?>