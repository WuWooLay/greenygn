<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_user.php";

    // Functions
    // require __DIR__. "/functions/order.php";
    require __DIR__. "/functions/index/getdata.php";

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
                        <li class="breadcrumb-item active"> OrderList </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Order Pagination -->
                <div class="row">
                        
                        <!-- Pagination -->
                        <div class="col-md-3">
                            <form action="" method="get">
                                <div class="input-group mb-3">

                                        <input
                                         name="page"
                                         required type="number"
                                         class="form-control"
                                         min=1 
                                         max="<?= (isset($total_pages)) ? $total_pages : '' ?>"
                                         value="<?= (isset($page)) ? $page : '' ?>"
                                        >

                                        <?php  
                                            if( isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) :
                                        ?>
                                            <input
                                                name="cat_id"
                                                type="hidden"
                                                value="<?= $_GET['cat_id'] ?>"
                                            >
                                        <?php
                                            endif;
                                        ?>
                                    
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                                / <?= (isset($total_pages)) ? $total_pages : '' ?> Go
                                            </button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        <!-- Pagination End -->
                    
                </div>
                <!-- Order Pagination End -->
                
                <!-- Table Start -->
                <div class="table-responsive">
                
                <table class="table">
                            
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">OrderId</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">OrderDate</th>
                                    <th class="" scope="col">Detail</th>
                                </tr>
                            </thead>
                            <!-- Table Head End-->

                            <!-- Table Body -->
                            <tbody>
                                <?php
                                    foreach($result as $k => $v):
                                ?>
                                 <tr>
                                        <td>
                                            <div 
                                                class="Plant_Shopping_Cart sm" 
                                                style="background-image:url('<?= $v['image'] ?>')"
                                            >
                                            </div>
                                        </td>

                                        <td> #<?= $v['order_date'] ?>_GreenYgn_<?= $v['id'] ?></td>
                                        
                                        <td> 
                                            <?php 
                                                if($v['status'] == 1):
                                            ?>

                                            <a class="btn btn-primary btn-sm rounded-circle" href="#!">
                                                <i class="material-icons md-18">restore</i>
                                            </a>
                                            <span class="text-primary">
                                                Pending
                                            </span>
                                            
                                            <?php
                                                elseif($v['status'] == 2):
                                            ?>

                                                <a class="btn btn-success btn-sm rounded-circle" href="#!">
                                                    <i class="material-icons md-18">done</i>
                                                </a>
                                                <span class="text-success">
                                                    Success Purchase
                                                </span>
                                            <?php
                                                else:
                                            ?>
                                                <a class="btn btn-danger btn-sm rounded-circle" href="#!">
                                                    <i class="material-icons md-18">close</i>
                                                </a>
                                                <span class="text-danger">
                                                    Reject
                                                </span>
                                            <?php
                                                endif;
                                            ?>
                                        </td>

                                        <td> <?= $v['order_date'] ?></td>
                                        <td> 
                                                <a 
                                                    class="btn btn-primary btn-sm " 
                                                    href="#!?id=<?= $v['id'] ?>"
                                                >
                                                   Detail
                                                </a>
                                            
                                        </td>
                                 </tr>
                                <?php
                                    endforeach;
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

    <!-- Form -->
    <form class="d-none" method="post" id="Form">
            
            <input type="hidden" name="formArray" id="formArray">
            <input type="submit" name="submit" id="submit">
    </form>
    <!-- Form End-->


<?php

    // Require "Preloading"
    require __DIR__ . "/../../initial/view/preloading/preloading.php";
                                    
    // Require "Scroll Top"
    require __DIR__ . "/../../initial/view/footer/scrolltop.php";
    
    if((isset($_SESSION['cart']))):
?>

    <script>
        
        $(document).ready( function () {

            var obj = <?= json_encode($_SESSION['cart']) ?>;

            // Total Price Adding Function
            var total_add = function (objId) {
                // console.log('Total Add',obj[objId]);

                var all_total = 0;

                obj[objId].totalprice = parseInt(obj[objId].price) * parseInt(obj[objId].quantity) ;

                // console.log($('#Table_Row_Total_Price_'+objId));
                $('#Table_Row_Total_Price_'+objId).html(obj[objId].totalprice);

                Object.keys(obj).map(function(key, index) {
                    // console.log('index=>',index);
                    // console.log(obj[key]);
                    all_total += parseInt(obj[key].totalprice);
                });

                $("#All_Total_Price").html(all_total);

                
            };

            // Remove Count Function
            $('.Remove_Count').click( function () {
                
                var thisData = {
                    'id': $(this).data('id'),
                    'value': parseInt($(this).data('value'))
                };

                var parent = $(this).parent();

                // console.log(obj[thisData.id]); 
                // console.log('Parent', parent);

                if( obj[thisData.id].quantity > 1 && obj[thisData.id].quantity <= 20) {
                    // if Okay 
                    obj[thisData.id].quantity -= 1;
                    $(parent)[0].children[1].value = obj[thisData.id].quantity ;
                    
                } else {
                    // Else You Can Decrease
                    alert("Must Be At Least 1");
                }

                // Total Add
                total_add(thisData.id);
                // console.log(thisData);
            });

            // Add Count Function
            $('.Add_Count').click( function () {
                
                var thisData = {
                    'id': $(this).data('id'),
                    'value': parseInt($(this).data('value'))
                };

                var parent = $(this).parent();

                // console.log(obj[thisData.id]); 
                // console.log('Parent', $(parent));

                if( obj[thisData.id].quantity > 0 && obj[thisData.id].quantity < 20) {
                    // if Okay 
                    obj[thisData.id].quantity = parseInt(obj[thisData.id].quantity) + 1;
                    $(parent)[0].children[1].value = obj[thisData.id].quantity ;
                    
                } else {
                    // Else You Can Add
                    alert("You Can't Over 20 ");
                }
                // Total Add
                total_add(thisData.id);
                // console.log(thisData);
            });

            // Listener Function
            $('.Plant_Shopping_Cart_Input').on('keyup', function (e) {
                var thisData = {
                    'id': $(this).data('id'),
                    'value': parseInt($(this).data('value'))
                };

                if(this.value == "" || this.value == undefined ) {
                    alert("Plz Only Input Number");
                    // console.log('old Quantity=>', obj[thisData.id].quantity);
                    $(this).val( obj[thisData.id].quantity);
                    return false;
                }

                if(this.value > 20) {
                    alert("You Can't Over 20 ");
                    obj[thisData.id].quantity = 20;
                    $(this).val( obj[thisData.id].quantity);
                    total_add(thisData.id);
                    return false;
                } else if (this.value < 1) {
                    alert("Can't Less Than 1 Must Be Atleast 1");
                    $(this).val( obj[thisData.id].quantity); 
                    total_add(thisData.id);
                    return false;
                } else {
                    // console.log('old Quantity=>', obj[thisData.id].quantity);
                    obj[thisData.id].quantity = this.value;
                    $(this).val( obj[thisData.id].quantity);
                    total_add(thisData.id);
                    return false;
                }

                // Total Add
                total_add(thisData.id);

                // console.log(this.value);
            })

            // Submit
            $("#Submit").click( function () {

                // alert("Lwin");

                $('#formArray').val(JSON.stringify(obj));
                $("#submit").click();
            });

            // console.log(obj);
        });
    
    </script>

<?php
    endif;

    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

