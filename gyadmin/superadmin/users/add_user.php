<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/add_user/add_user.php";

    $title = "Add";

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
                        if (isset($db_errors) && count($db_errors) > 0 ) {
                            foreach($db_errors as $v ) {
                ?>           
                            <div class="alert alert-danger" role="alert">
                                <?= $v ?>
                            </div>
                <?php
                            }      
                        }
                ?>
                <!-- Shwo DB Errors End -->

                 <!-- Shwo Errors -->
                 <?php 
                        if (isset($errors) && count($errors) > 0 ) {
                            foreach($errors as $v ) {
                ?>           
                            <div class="alert alert-danger" role="alert">
                                <?= $v ?>
                            </div>
                <?php
                            }      
                        }
                ?>
                <!-- Shwo Errors End -->

              

                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="/gyadmin/superadmin/users">Users</a></li>
                        <li class="breadcrumb-item active"> Add </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Form -->
                <div class="container-fluid mt-3">
                    <div class="row">


                        <div class="col-md-8">
                        
                            <form method="post">
                                
                            <h3 class=""> Add User </h3>
                                    
                                
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control " id="name" name="name" placeholder="Enter name" value="<?= isset($name) ? "$name":"" ?>" required="required">
                                </div>
                                <!-- Name End-->
                                
                                <!-- Email -->
                                <div class="form-group">
                                    
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control " id="email" name="email" placeholder="Enter email" value="<?= isset($email) ? "$email":"" ?>" required="required">
                                                
                                </div>
                                <!-- Email End-->
                                
                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input required="required" type="password" name="password" class="form-control " id="password" placeholder="Password" value="<?= isset($password) ? "$password":"" ?>">
                                </div>
                                <!-- Password End-->

                                <!-- RePassword -->
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input required="required" type="password" name="confirmpassword" class="form-control "  placeholder="Confirm Password" id="confirmpassword" value="">
                                </div>
                                <!-- RePassword End-->

                                <!-- Ph -->
                                <div class="form-group">
                                      <label for="ph"> Ph </label>
                                      <input value="<?= isset($ph) ? "$ph":"" ?>" class="form-control" type="tel" id="ph" name="ph" pattern="[0-9]{2}-[0-9]{6,9}" placeholder="Example 09-420012345" max="11" required="required">
                                </div>
                                <!-- Ph End -->
                                <button type="submit" name="submit" class="btn btn-outline-primary"> Add Admins </button>
                                
                            
                            </form>

                        </div>
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

