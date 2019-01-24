<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/search/search.php";
    // require __DIR__. "/functions/index/getadmins.php";

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

              

                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                        <li class="breadcrumb-item active"> Admins </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Add Admins && Search -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Back To Admins -->
                        <div class="col-md-3 mb-2">
                            <a href="/gyadmin/superadmin/admins/" class="btn btn-danger btn-block" role="button"> 
                                <i class="icon ion-md-add"></i> Back 
                            </a>
                        </div>
                        <!-- Back To Admins End -->

                        <!-- Search Form -->
                        <div class="col-md-6 mb-2">
                            <!-- Search Form Container -->
                            <div class="container-fluid">
                                <form method="GET" action="">
                                    <div class="row">
                                        
                                        <!-- Search Form -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input required="required" name="name" class="form-control" type="text" placeholder="Search By Name">
                                            </div>
                                        </div>
                                        <!-- Search Form End -->
                                        
                                        <!-- Submit -->
                                        <div class="col-md-4">
                                            <button href="add_admin.php" class="btn btn-outline-primary btn-block" role="button"> 
                                                <i class="icon ion-md-add"></i> Search 
                                            </button>
                                        </div>
                                        <!-- Submit End -->

                                    </div>
                                </form>
                            </div>
                            <!-- Search Form Container End-->
                        </div>
                        <!-- Search Form End -->
                    
                    </div>
                </div>
                <!-- Add Admins && Search -->

                <!-- Table Start -->
                <div class="table-responsive">
                    <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ph</th>
                                    <th scope="col">Role</th>
                                    <th class="" scope="col">Edit</th>
                                    <th class="" scope="col">Ban</th>
                                </tr>
                            </thead>

                            <tbody class="mm_font" id="table_row">

                            <?php 
                                foreach($result as $k => $v) {
                            ?>  
                                <tr class="<?= $v['deleted_at'] ? 'table-danger' : '' ?>">
                                    <!-- Image  -->
                                    <td > 
                                        <div class="AdminUserListTable" style="background-image: url('<?= $v['image'] ?>')">  </div> 
                                    </td>
                                    <!-- Image End -->

                                    <td > <?= $v['name'] ?> </td>
                                    <td > <?= $v['email'] ?> </td>
                                    
                                    <!-- Phone -->
                                    <td > 
                                        <?php 
                                            if(strlen($v['ph']) > 0) {
                                        ?>
                                            <a  class="btn btn-primary btn-sm rounded-circle" href="tel:<?= $v['ph'] ?>">
                                                <i class="material-icons md-18"> phone </i>
                                            </a>
                                            <?= $v['ph'] ?>
                                        <?php       
                                            } else {
                                        ?>
                                            <a  class="btn btn-outline-danger btn-sm rounded-circle" href="#!">
                                                <i class="material-icons md-18"> phone </i>
                                            </a>
                                        <?php       
                                            }
                                        ?>
                                    </td>
                                    <!-- Phone End -->
                                    
                                    <!-- Super Admin Or Admin -->
                                    <td >
                                        <?=
                                            $v['role_name'] == "superadmin" ? 
                                            "<i class='text-primary material-icons md-18'>security</i> SuperAdmin" : 
                                            "<i class='text-info material-icons md-18'> group </i> Admin" 
                                        ?> 
                                     </td>
                                    <!-- Super Admin Or Admin End-->
                                    
                                    <!-- Edit -->
                                    <td >
                                        <?php 
                                            if($_SESSION['admin']['id'] == 1) {
                                                // If He Is God 
                                                if($v['id'] == 1 ) {
                                                // Cant It's Your Self 
                                        ?>
                                            <a class="btn btn-outline-success btn-sm " href="/gyadmin/superadmin/profile/" role="button">
                                                <i class="material-icons md-18"> create </i>
                                            </a>  
                                        <?php
                                                } else {
                                                // Ban All 
                                        ?>
                                            <a class="btn btn-outline-success btn-sm " href="edit.php?id=<?= $v['id'] ?>" role="button">
                                                <i class="material-icons md-18"> create </i>
                                            </a>  
                                        <?php   
                                                }
                                            } else {
                                                // Normal Super Admin
                                                if($v['role_name'] == "superadmin") {
                                                // Each Super Admin Can't Ban   

                                                    if($v['id'] == $_SESSION['admin']['id']){
                                        ?>
                                            <a class="btn btn-outline-success btn-sm " href="/gyadmin/superadmin/profile/" role="button">
                                                <i class="material-icons md-18"> create </i>
                                            </a>   
                                        <?php
                                                    } else {

                                        ?>
                                                Can't Edit
                                        <?php
                                                    }
                                                } else {
                                                // Can Ban   
                                        ?>
                                                <a class="btn btn-outline-success btn-sm " href="edit.php?id=<?= $v['id'] ?>" role="button">
                                                    <i class="material-icons md-18"> create </i>
                                                </a>  
                                        <?php
                                                }
                                            }
                                        ?>   
                                      
                                    </td>
                                    <!-- Edit End-->
                                    
                                    <!-- Ban -->
                                    <td > 
                                       <?php 
                                           if($_SESSION['admin']['id'] == 1) {
                                              // If He Is God 
                                              if($v['id'] == 1 ) {
                                              // Cant It's Your Self 
                                       ?>
                                              YourSelf
                                       <?php
                                              } else {
                                              // Ban All 
                                       ?>
                                            <a class="btn btn-danger btn-sm" href="functions/index/ban.php?id=<?= $v['id'] ?>" role="button">
                                                Ban
                                            </a> 
                                       <?php   
                                              }
                                           } else {
                                               // Normal Super Admin
                                               if($v['role_name'] == "superadmin") {
                                               // Each Super Admin Can't Ban   
                                        ?>
                                              Can't Ban
                                        <?php
                                               } else {
                                               // Can Ban   
                                        ?>
                                            <a class="btn btn-danger btn-sm" href="functions/index/ban.php?id=<?= $v['id'] ?>" role="button">
                                                Ban
                                            </a> 
                                        <?php
                                               }
                                           }
                                        ?>                                        
                                    </td>
                                    <!-- Ban End -->
                                </tr>
                            <?php
                                }
                            ?>

                           

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
    require __DIR__ . "/../../../initial/view/preloading/preloading.php";
                                    
    // Require "Scroll Top"
    require __DIR__ . "/../../../initial/view/footer/scrolltop.php";

    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

