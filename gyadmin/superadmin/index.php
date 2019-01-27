<?php

    // Super Admin Index.php
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/middlewares/is_superadmin.php";

    // Functions
    require __DIR__ . "/functions/getdata.php";
    
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

                <!-- Start DashBoard -->
                <div class="container-fluid">

                    <!-- Plants -->
                    <div class="row">

                        <!-- Plants Card -->
                        <div class="col-md-3 mb-3">
                            <div class="card text-white text-center DashBoard_Card_1 ">

                                <div class="card-header ">
                                    <i class="material-icons md-18 text-white">nature</i>
                                    Plants
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Plants <span id=""><?= $plant_list ?></span> </h5>
                                    <a href="/gyadmin/superadmin/plants/" class="btn btn-outline-light"> View </a>
                                    <a href="/gyadmin/superadmin/plants/add_plant.php" class="btn btn-outline-light"> Add </a>
                                </div>

                            </div>
                        </div>
                        <!-- Plants Card End-->

                        <!-- Order Card -->
                        <div class="col-md-3 mb-3">
                            <div class="card text-white text-center DashBoard_Card_2">

                                <div class="card-header ">
                                    <i class="material-icons md-18 text-white">message</i>
                                    Orders List
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Orders <span id=""><?= $order_list ?></span> </h5>
                                    <a href="/gyadmin/superadmin/order-list" class="btn btn-outline-light"> Check </a>
                                </div>

                            </div>
                        </div>
                        <!-- Order Card End-->

                        <!-- Forum Card -->
                        <div class="col-md-3 mb-3">
                            <div class="card text-white text-center DashBoard_Card_3">

                                <div class="card-header ">
                                    <i class="material-icons md-18 text-white">forum</i>
                                    Forums List
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Forums <span id=""><?= $forum_list ?></span> </h5>
                                    <a href="/gyadmin/superadmin/forum/" class="btn btn-outline-light"> View </a>
                                    <a href="/gyadmin/superadmin/forum/add_forum.php" class="btn btn-outline-light"> Add </a>
                                </div>

                            </div>
                        </div>
                        <!-- Forum Card End-->

                        <!-- User Card -->
                        <div class="col-md-3 mb-3">
                            <div class="card text-white text-center DashBoard_Card_4">

                                <div class="card-header ">
                                    <i class="material-icons md-18 text-white">person</i>
                                    Users List
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Users <span id=""><?= $user_list ?></span> </h5>
                                    <a href="/gyadmin/superadmin/users/" class="btn btn-outline-light"> View </a>
                                    <a href="/gyadmin/superadmin/users/add_user.php" class="btn btn-outline-light"> Add </a>
                                </div>

                            </div>
                        </div>
                        <!-- User Card End-->

                        <!-- Admin Card -->
                        <div class="col-md-3 mb-3">
                            <div class="card text-white text-center DashBoard_Card_5">

                                <div class="card-header ">
                                    <i class="material-icons md-18 text-white">security</i>
                                    Admins List
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Admins <span id=""><?= $admin_list ?></span> </h5>
                                    <a href="/gyadmin/superadmin/admins/" class="btn btn-outline-light"> View </a>
                                    <a href="/gyadmin/superadmin/admins/add_admin.php" class="btn btn-outline-light"> Add </a>
                                </div>

                            </div>
                        </div>
                        <!-- Admin Card End-->

                    </div>
                    <!-- Plants End-->
                
                </div>
                <!-- Start DashBoard End -->
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

