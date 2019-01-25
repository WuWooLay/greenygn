<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_user.php";

    // Functions

    $title = "Cart";

    // Require "Start Header"
    require __DIR__ . "/../view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/../view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/../view/nav/navbar.php";

?>

    <!-- Container Start -->
    <div class="container-fluid mt-3">

        <div class="row">

            <!-- Url List Container -->
            <div class="col-md-3">

                <?php 
                    // Require " Url List "
                    require __DIR__ . "/../view/left_url_list/left_url_list.php";
                ?>

            </div>
            <!-- Url List Container -->

            <!-- Normal Container -->
            <div class="col-md-9">
                
                <!-- Show Errors Messages -->
                    <?php 
                        if (isset($_SESSION['errors'])) {
                    ?>           
                        <div class="alert alert-danger" role="alert">
                            <?= ($_SESSION['errors']) ?>
                        </div>
                    <?php
                        unset($_SESSION['errors']);
                        }
                    ?>
                <!-- Show Errors Messages End-->

                <!-- Show Success Messages -->
                    <?php 
                        if (isset($_SESSION['success'])) {
                    ?>           
                        <div class="alert alert-success" role="alert">
                            <?= ($_SESSION['success']) ?>
                        </div>
                    <?php
                        unset($_SESSION['success']);
                        }
                    ?>
                <!-- Show Success Messages End-->

                <!-- Map Container -->
                <div class="container-fluid">
                    
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mapContainer">
                                <?php 
                                    require __DIR__ . "/../view/map/map.php";
                                ?>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                    
                                <div class="border-bottom">
                                    <div class="Card_Svg_Container">
                                        <img class="img-fluid" src="/assets/images/logo/greenygn_animate.svg" alt="">
                                    </div>
                                </div>
                                    
                                    <div class="card-body text-center">

                                    <h4 class="card-title mb-4">
                                    Search Plant By Geology 
                                    </h4>

                                    <h4 class="card-title mb-4">
                                     Comming Soon
                                    </h4>

                                    <h4 class="card-title">
                                        <span id="state"> </span> State
                                    </h4>

                                    <p class="card-text">
                                                   With Our Datamining , We Believe We Can Develop Our Myanmar To Be 
                                                   Green Land In Future .
                                    </p>

                                    </div>
                                </div>
                        </div>
                    </div>
                        
                </div>
                <!-- Map Container End -->
                
               
            </div>
            <!-- Normal Container End -->

        </div>
    
    </div>
    <!-- Container Start End -->



<?php

    // Require "Preloading"
    require __DIR__ . "/../../initial/view/preloading/preloading.php";
                                    
    // Require "Scroll Top"
    require __DIR__ . "/../../initial/view/footer/scrolltop.php";
?>
    <script>
        $(document).ready( function () {

            var mapArray = [
                "Sagaing",
                "Kachin",
                "TaNintharyi",
                "Shan",
                "Magwe",
                "Ayeyarwady",
                "Chin",
                "Rakhing",
                "Mon",
                "Yangon",
                "Bago",
                "Mandalay",
                "Kayin",
                "Kayah",
            ];

            mapArray.map( function (v, k) {
                console.log(v);
                $('#'+v).on("mouseenter", function () {
                    $(this).css({
                        "fill": "#28a745",
                        "transform": "scale(1.03)",
                        "z-index": "9"
                    });
                    
                    $("#state").html($(this).data('state'));
                });

                $('#'+v).on("mouseleave", function () {
                    $(this).css({
                        "fill": "#ffffff",
                        "transform":" scale(1.0)",
                        "z-index": "0"
                    });
                });
            });            
        });
    </script>
<?php
    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

