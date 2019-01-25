<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_user.php";

    // Functions
    require __DIR__. "/functions/getdata.php";

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

                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/users/"> Plants </a></li>
                        <li class="breadcrumb-item active"> Cart </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->
                
                <!-- Table Start -->
                <div class="table-responsive">
                
                <table class="table">
                            
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th class="text-right pr-5" scope="col">TotalPrice</th>
                                    <th class="" scope="col">Deleted</th>
                                </tr>
                            </thead>
                            <!-- Table Head End-->

                            <!-- Table Body -->
                            <tbody>
                                <?php 

                                    if(isset($_SESSION['cart'])):

                                        foreach($_SESSION['cart'] as $v):
                                ?>
                                    <tr>

                                        <td>
                                            <div
                                             class="Plant_Shopping_Cart"
                                             style="background-image:url('<?= $v['image'] ?>')"
                                            >
                                            </div>
                                        </td>

                                        <td>
                                            <?= $v['name'] ?>
                                        </td>

                                        <td>
                                            <?= $v['price'] ?>
                                            <span>Kyts</span>
                                        </td>
                                        
                                        <!-- Add Remove And Input -->
                                        <td class="Add_Remove_Td">

                                            <button class="btn btn-sm Remove_Count">
                                                <i class="material-icons md-18">remove</i>
                                            </button> 
                                                          <input type="number" class="Plant_Shopping_Cart_Input" min="1" max="20" value="1">
                                            <button class="btn btn-sm Add_Count">
                                                <i class="material-icons md-18">add</i>
                                            </button> 
                                          
                                        </td>
                                        <!-- Add Remove And Input End -->
                                        
                                        <!-- Total Price -->
                                        <td class="text-right pr-5">
                                            <span class="price">
                                                <?= $v['price'] ?>
                                            </span>
                                            <span>Kyts</span>
                                        </td>
                                        <!-- Total Price End-->
                                        
                                        <!-- Remove Item -->
                                        <td>
                                            <a 
                                                href="/users/functions/index/addtocart.php?id=<?= $v['id'] ?>&amp;page_dir=cart" 
                                                class="btn btn-danger btn-sm"
                                            >
                                                Remove
                                            </a>  
                                        </td>
                                        <!-- Remove Item End-->

                                    </tr>
                                <?php
                                        endforeach;
                                ?>
                                    <tr class="Total_Row" id="Total_Row">
                                        <td colspan="4"></td>
                                        
                                        <!-- All Total Price -->
                                        <td class="text-right pr-5">
                                            <span>5000</span>
                                            <span>Kyts</span>
                                        </td>
                                        <!-- All Total Price End-->
                                        
                                        <td>
                                            <a 
                                                href="#!" 
                                                class="btn btn-primary"
                                                id="Check"
                                            >
                                                Check
                                            </a>  
                                        </td>
                                        
                                    </tr>
                                <?php
                                    else:
                                ?>
                                    <tr>
                                        <td colspan="6"> 
                                            <div class="alert alert-warning"> <strong>Empty Cart</strong> You need to put some items to cart!! </div>
                                        </td>
                                    </tr>
                                <?php    
                                    endif;
                                ?>
                            </tbody>
                            <!-- Table Body End-->
                </table>
                
                </div>
                <!-- Table End -->

               
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

            var obj = <?= (isset($_SESSION['cart'])) ? json_encode($_SESSION['cart']) : "" ?>;

            console.log(obj);
        });
    
    </script>

<?php
    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

