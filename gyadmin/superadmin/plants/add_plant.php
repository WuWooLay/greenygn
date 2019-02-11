<?php

    // Super Admin  superadmin/plants
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/add/add.php";
    require __DIR__. "/functions/add/add_category.php";
    require __DIR__. "/functions/add/getdata.php";

    $title = "Plants";

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
                
                <!-- Shwo DB Errors -->
                <?php 
                        if (isset($req['errors']) && count($req['errors']) > 0 ) {
                            foreach($req['errors'] as $v ) {
                ?>           
                            <div class="alert alert-danger" role="alert">
                                <?= $v ?>
                            </div>
                <?php
                            }      
                        }
                ?>
                <!-- Shwo DB Errors End -->

                <!-- Shwo Success -->
                <?php 
                        if (isset($req['success']) && count($req['success']) > 0 ) {
                            foreach($req['success'] as $v ) {
                ?>           
                            <div class="alert alert-success" role="alert">
                                <?= $v ?>
                            </div>
                <?php
                            }      
                        }
                ?>
                <!-- Shwo Success End -->


                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="/gyadmin/superadmin/plants/">Plants</a></li>
                        <li class="breadcrumb-item active"> Add </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Form -->
                <div class="container-fluid mt-3">
                    <div class="row">

                        <!-- Add Plant Column -->
                        <div class="col-md-6">
                        
                            <form method="post" enctype="multipart/form-data">
                                
                            <h3 class=""> Add Plant </h3>

                                <!-- Id -->
                                <input type="hidden" name="admin_id" value="<?= $_SESSION['admin']['id'] ?>">
                                <!-- Id End-->
                                
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control " id="name" name="name" placeholder="Enter name" value="<?= isset($req['name']) ? $req['name'] : "" ?>" required="required">
                                </div>
                                <!-- Name End-->
                                
                                <!-- Price -->
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control " id="price" name="price" placeholder="1000" value="<?= isset($req['price']) ? $req['price'] : "" ?>" required="required">
                                </div>
                                <!-- Price End-->

                                <!-- Category List -->
                                <div class="form-group">
                                    <label for="category"> Category List </label>
                                    <select name="category_id" id="category" class="custom-select">

                                        <?php
                                                foreach($category_list as $v) {
                                        ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                                        <?php
                                                }
                                        ?>
                                        
                                    </select>
                                </div>
                                <!-- Category List end -->

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="customFile"> Image Upload </label>
                                    <div class="custom-file mb-3">
                                        <input required name="file" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <!-- Image Upload End -->
                                
                                <button type="submit" name="submit" class="btn btn-outline-primary"> Add Plant </button>
                            
                            </form>

                        </div>
                        <!-- Add Plant Column End-->
                        
                        <!-- Add Category Column -->
                        <div class="col-md-6">
                        
                            <form method="post" class="">
                                
                            <h3 class=""> Add Category </h3>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control " id="name" name="cat_name" placeholder="Enter name" value="<?= isset($req['cat_name']) ? $req['cat_name'] : "" ?>" required="required">
                                </div>
                                <!-- Name End-->
                                
                                <button type="submit" name="category_submit" class="btn btn-outline-primary">
                                 Add Category 
                                </button>
                            
                            </form>

                        </div>
                        <!-- Add Category Column End -->
                    </div>
                </div>
                <!-- Form End -->

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

