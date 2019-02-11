<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_user.php";

    // Functions
    require __DIR__. "/functions/order.php";
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
                                    <tr id="Table_Row_Id_<?= $v['id'] ?>">

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

                                            <button class="btn btn-sm Remove_Count" data-id="<?= $v['id'] ?>" data-value="<?= $v['price'] ?>">
                                                <i class="material-icons md-18">remove</i>
                                            </button> 
                                                        <input
                                                            type="number"
                                                            class="Plant_Shopping_Cart_Input"
                                                            min="1"
                                                            max="20"
                                                            value="1"
                                                            data-id="<?= $v['id'] ?>" data-value="<?= $v['price'] ?>"
                                                         >
                                           
                                            <button class="btn btn-sm Add_Count" data-id="<?= $v['id'] ?>" data-value="<?= $v['price'] ?>">
                                                <i class="material-icons md-18">add</i>
                                            </button> 
                                          
                                        </td>
                                        <!-- Add Remove And Input End -->
                                        
                                        <!-- Total Price -->
                                        <td class="text-right pr-5">
                                            <span class="price" id="Table_Row_Total_Price_<?= $v['id'] ?>">
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
                                    
                                    <!-- Clear Cart -->
                                    <td colspan="1">
                                            <a href="/users/functions/index/clearcart.php" class="btn btn-outline-danger">
                                                Clear Cart
                                            </a>
                                    </td>
                                    <!-- Clear Cart End-->

                                    <td colspan="3"></td>
                                        
                                        <!-- All Total Price -->
                                        <td class="text-right pr-5">
                                            <span id="All_Total_Price"><?= $total_price ?></span>
                                            <span>Kyts</span>
                                        </td>
                                        <!-- All Total Price End-->
                                        
                                        <td>
                                            <a 
                                                href="#!" 
                                                class="btn btn-primary"
                                                id="Submit"
                                            >
                                                Submit
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

