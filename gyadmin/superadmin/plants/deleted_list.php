<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/deleted_list/getdata.php";

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

                <!-- Breadcum Navigation -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                        <li class="breadcrumb-item active"> Plants </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Add Admins && Search -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Add Plant -->
                        <div class="col-md-3 mb-2">
                            <a href="add_plant.php" class="btn btn-outline-primary rounded btn-block" role="button"> 
                                <i class="icon ion-md-add"></i> Add Plant 
                            </a>
                        </div>
                        <!-- Add Plant End -->
                        
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
                                                <button href="add_admin.php" class="btn btn-outline-primary rounded btn-block" role="button"> 
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
                <!-- Add Admins && Search -->

                <!-- Table And Search COntainer -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Folder List -->
                        <div class="col-md-3">
                        
                            <!-- Normal List -->
                            <div class="card border-primary  text-center mb-3">

                                <!-- All And Delete List -->
                                <div class="card-header">
                                    Normal 
                                </div>

                               <div class="list-group">
                                    <a href="/gyadmin/superadmin/plants/" class="list-group-item list-group-item-action"> All List </a>
                                    <a href="/gyadmin/superadmin/plants/deleted_list.php" class="list-group-item list-group-item-action list-group-item-primary"> Deleted List </a>
                               </div>

                            </div>
                            <!-- Normal List End-->

                            <!-- Category List -->
                            <div class="card border-primary  text-center">

                                <!-- All And Delete List -->
                                <div class="card-header">
                                    By Category 
                                </div>

                               <div class="list-group">

                                        <?php
                                                foreach($category_list as $v) {
                                        ?>
                                                <a href="/gyadmin/superadmin/plants/?cat_id=<?= $v['id'] ?>" class="list-group-item list-group-item-action"><?= $v['name'] ?></a>
                                        <?php
                                                }
                                        ?>
                               </div>

                            </div>
                            <!-- Category List End-->

                        </div>
                        <!-- Folder List End-->
                    
                        <!-- Table -->
                        <div class="col-md-9">
                        <div class="table-responsive">      
                            <table class="table">
                            
                                <!-- Table Head -->
                                <thead>
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Added By</th>
                                        <th class="" scope="col">Deleted</th>
                                    </tr>
                                </thead>
                                <!-- Table Head End-->

                                <tbody class="mm_font" id="table_row">

                                    <?php
                                        foreach($result as $k => $v) :
                                    ?>

                                    <tr class="">
                                            <!-- Image  -->
                                            <td> 
                                                <div class="AdminUserListTable" style="background-image: url('<?= $v['image'] ?>')">  </div> 
                                            </td>
                                            <!-- Image End -->

                                            <!-- Name -->
                                            <td> <?= $v['name'] ?> </td>
                                            <!-- Name End -->

                                            <!-- price -->
                                            <td> <?= $v['price'] ?> </td>
                                            <!-- price End -->

                                            <!-- Category -->
                                            <td> <?= $v['category_name'] ?> </td>
                                            <!-- Category End -->

                                            <!-- Admin Name -->
                                            <td> <?= $v['admin_name'] ?> </td>
                                            <!-- Admin Name End -->
                                            
                                            
                                            <!-- Delete -->
                                            <td>
                                                <a class="btn btn-outline-danger btn-sm " href="/gyadmin/superadmin/plants/functions/delete/delete.php?deleted_page=true&id=<?= $v['id'] ?>&page=<?= $page ?>" role="button">
                                                    Undo
                                                </a>
                                            </td>
                                            <!-- Delete End -->
                                    </tr>

                                    <?php
                                        endforeach;
                                    ?>
                                    
                                </tbody>

                            </table>
                        </div>
                        </div>
                        <!-- Table End-->
                    
                    </div>
                </div>
                <!-- Table And Search COntainer End-->

               
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

