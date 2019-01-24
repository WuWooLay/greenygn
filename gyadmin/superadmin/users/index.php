<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    // require __DIR__. "/functions/index/index_page_ban.php";
    require __DIR__. "/functions/index/getdata.php";

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
                        <li class="breadcrumb-item active"> Users </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Add Users && Search -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Add Users -->
                        <div class="col-md-3 mb-2">
                            <a href="add_user.php" class="btn btn-outline-primary  btn-block" role="button"> 
                                <i class="icon ion-md-add"></i> Add Users 
                            </a>
                        </div>
                        <!-- Add Users End -->
                        
                        <!-- Search Form -->
                        <div class="col-md-6 mb-2">

                                <!-- Search Form Container -->
                                <div class="container-fluid">

                                    <form method="GET" action="search.php">
                                        <div class="row">
                                            
                                            <!-- Search Form -->
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="name" class="form-control" type="text" placeholder="Search By Name">
                                                </div>
                                            </div>
                                            <!-- Search Form End -->
                                            
                                            <!-- Submit -->
                                            <div class="col-md-4">
                                                <button href="add_admin.php" class="btn btn-outline-primary  btn-block" role="button"> 
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
                </div>
                <!-- Add Users && Search -->

                 <!-- Table Start -->
                 <div class="table-responsive">
                    <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ph</th>
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
                                    
                                    
                                    <!-- Edit -->
                                    <td >
                                            <a class="btn btn-outline-success btn-sm " href="edit.php?id=<?= $v['id'] ?>" role="button">
                                                <i class="material-icons md-18"> create </i>
                                            </a>  
                                      
                                    </td>
                                    <!-- Edit End-->
                                    
                                    <!-- Ban -->
                                    <td > 
                                            <a class="btn btn-danger btn-sm" href="functions/index/ban.php?id=<?= $v['id'] ?>&page=<?= $page ?>" role="button">
                                                Ban
                                            </a> 
                                    </td>
                                    <!-- Ban End -->
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>

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

