<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_user.php";

    // Functions
    require __DIR__. "/functions/detail/getdata.php";

    $title = "Orders";

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

                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/users/"> Plants </a></li>
                        <li class="breadcrumb-item"> <a href="/users/orderlist"> OrderList </a> </li>
                        <li class="breadcrumb-item active"> Detail </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->
                
                <!-- Thank You -->
                <div>

                </div>
                <!-- Thank You End-->

                <!-- Details Container-->
                <div class="contaienr-fluid">
                        <div class="row">

                           

                            <!-- Order Information -->
                            <div class="col-md-7">
                                <div class="table-respoinsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th class="text-right pr-4" scope="col">Price</th>
                                            <th class="text-center Quantity" scope="col">Qty</th>
                                            <th class="text-right pr-4" scope="col">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <!-- Order Details -->
                                        <?php 
                                            $all_total_amount = 0;
                                            foreach($order_details as $v):
                                                $all_total_amount += $v['total_amount'];
                                        ?>
                                        <tr>
                                            <td>
                                                <div 
                                                    class="Plant_Shopping_Cart sm rounded" 
                                                    style="background-image:url('<?= $v['image'] ?>')"
                                                >
                                                </div>
                                            </td>
                                            <td><?= $v['plant_name']?></td>
                                            <td class="text-right pr-4" ><?= $v['plant_amount']?> Kyats</td>
                                            <td class="text-center"> ( <?= $v['quantity']?> ) </td>
                                            <td class="text-right pr-4" ><?= $v['total_amount']?> Kyats</td>
                                        </tr>
                                        <?php
                                            endforeach;
                                        ?>
                                        
                                        <!-- Order Details End -->
                                            
                                        <!-- Last Row -->
                                            <tr>
                                                <td class="text-right" colspan="4">Total Price</td>
                                                <td class="text-right pr-4"> <?= $all_total_amount ?> Kyats</td>
                                            </tr>
                                        <!-- Last Row -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Order Information End -->

                            <!-- Customer Information -->
                            <div class="col-md-5">

                            </div>
                            <!-- Customer Information End-->
                        </div>
                </div>
                <!-- Details Container End-->

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
    

    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

