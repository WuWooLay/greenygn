<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/detail/confirm.php";
    require __DIR__. "/functions/detail/reject.php";
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
                        <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                        <li class="breadcrumb-item"><a href="/gyadmin/superadmin/order-list">Orders</a></li>
                        <li class="breadcrumb-item active"> Details </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Detail COntainer -->
                <div class="container-fluid">
                    <div class="row">

                            <!-- Order Information -->
                            <div class="col-md-7">

                                <!-- 3 Thank You -->
                                    <?php 
                                        if($result['status'] == 1):
                                    ?>
                                        <div class="container-fluid mb-3">
                                            <div class="row">

                                                <!-- Confirm -->
                                                <div class="col-6">
                                                    <form  method="post" action="">
                                                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                            <button name="confirm_submit" class="btn btn-success  btn-block" type="submit"> 
                                                                <i class="icon ion-md-add"></i> Confirm 
                                                            </button>  
                                                    </form>
                                                </div>
                                                <!-- Confirm End -->

                                                <!-- Reject -->
                                                <div class="col-6">
                                                    <form  method="post" action="">
                                                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                            <button name="reject_submit" class="btn btn-danger btn-block" type="submit"> 
                                                                <i class="icon ion-md-add"></i> Reject 
                                                            </button>  
                                                    </form>
                                                </div>
                                                <!-- Reject End -->

                                            </div>
                                        </div>
                                        <!-- Thank You -->
                                       
                                        <form  method="post" action="">
                                            
                                        </form>
                                        <!-- Thank You End -->                                           
                                    <?php
                                        elseif($result['status'] == 2):
                                    ?>
                                        <!-- Success Confirm You -->
                                        <div class="alert alert-success"> 
                                                <strong> Successfully Purchase Confirm <i class="material-icons md-18">check</i> </strong>
                                                <i class="material-icons"></i>
                                            </div>
                                        <!-- Success Confirm You End -->
                                    <?php
                                        else:
                                    ?>
                                        <!-- Reject Order -->
                                        <div class="alert alert-danger"> 
                                        
                                                <strong> Rejected Order 
                                                                <i class="material-icons md-18">backspace</i>
                                                </strong>

                                                <i class="material-icons"></i>
                                        </div>
                                        <!-- Reject Order End -->
                                    <?php 
                                        endif;
                                    ?>
                                <!-- 3 Thank You End -->
                                <!-- Table Start -->
                                <div class="table-responsive">
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
                                <!-- Table End -->

                            </div>
                            <!-- Order Information End -->

                            <!-- Customer Information -->
                            <div class="col-md-5">
                                <div class="card">
                                    
                                <div class="border-bottom">
                                    <div class="Card_Svg_Container">
                                        <img class="img-fluid rounded-circle" src="<?= $result['user_image'] ?>" alt="">
                                    </div>
                                </div>
                                    
                                    <div class="card-body text-center">
                                                
                                    <p class="card-text">
                                        User Name : <?= $result['user_name'] ?>
                                    </p>

                                    <p class="card-text">
                                        User Ph : 
                                        
                                        <?= $result['user_phone'] ?>
                                        <a  class="btn btn-primary btn-sm " href="tel:<?= $result['user_phone'] ?>">
                                        <i class="material-icons md-18"> phone </i>
                                        </a> 
                                    </p>

                                    <p class="card-text">
                                        User Address : <?= $result['user_address'] ?>
                                    </p>

                                    </div>
                                </div>            
                            </div>
                            <!-- Customer Information End-->
                    </div>                  
                </div>
                <!-- Detail COntainer End-->

               
            </div>
            <!-- Normal Container End -->

        </div>
    
    </div>
    <!-- Container Start End -->


<?php

    // Require "Preloading"
    require __DIR__ . "/../../../initial/view/preloading/preloading.php";
                                    
    // Require "Scroll Top"
    require __DIR__ . "/../../../initial/view/footer/scrolltop.php";

    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

