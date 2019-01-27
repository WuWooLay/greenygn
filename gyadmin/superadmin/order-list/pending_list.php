<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/pending/getdata.php";

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
                        <li class="breadcrumb-item active"> Orders </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Add Admins && Search -->
                <div class="container-fluid">
                    <div class="row">

                        
                        <!-- Search Form -->
                        <div class="col-md-9 mb-2">

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
                <!-- Add Admins && Search -->

                <!-- Table And Search COntainer -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Folder List -->
                        <div class="col-md-3">
                        
                            <!-- Normal List -->
                            <div class="card border-primary  text-center mb-3">

                                <!-- All And Rejected List -->
                                <div class="card-header">
                                    Normal 
                                </div>

                               <div class="list-group">
                                    <a href="/gyadmin/superadmin/order-list/" class="list-group-item list-group-item-action"> All List </a>
                                    <a href="/gyadmin/superadmin/order-list/pending_list.php" class="list-group-item list-group-item-action list-group-item-primary"> Pending List </a>
                                    <a href="/gyadmin/superadmin/order-list/rejected_list.php" class="list-group-item list-group-item-action"> Reject List </a>
                               </div>

                            </div>
                            <!-- Normal List End-->

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
                                            <th scope="col">OrderId</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">OrderDate</th>
                                            <th scope="col">Details</th>
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
                                                    class="Plant_Shopping_Cart sm rounded" 
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
                                                        href="detail.php?id=<?= $v['id'] ?>"
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

