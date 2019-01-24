<?php

    // Super Admin Index.php
    
    // Connect Mysql 
    require __DIR__ . "/../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/middlewares/is_user.php";

    // Functions
    require __DIR__ . "/functions/index/getdata.php";
    
    $title = "Home";

    // Require "Start Header"
    require __DIR__ . "/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/view/nav/navbar.php";

?>

    <!-- Container Start -->
    <div class="container-fluid mt-3">

        <div class="row">

            <!-- Url List Container -->
            <div class="col-md-3">

                <?php 
                    // Require " Url List "
                    require __DIR__ . "/view/left_url_list/left_url_list.php";
                ?>

                <!-- Search By Category -->
                <div class="list-group d-none d-md-block mb-3">
                    <a href="#!" class="list-group-item list-group-item-action list-group-item-success">
                        <i class="material-icons md-18 text-success">nature</i>
                        Search By Category
                        <i class="material-icons md-18 text-success">nature</i>
                    </a>

                    <a 
                    href="/users/"
                    class="list-group-item list-group-item-action"
                    >
                        Defalut
                    </a>

                    <?php
                        foreach($category_list as $v) {
                    ?>
                        <a
                         href="/users/?cat_id=<?= $v['id'] ?>"
                         class="list-group-item list-group-item-action <?= (isset($_GET['cat_id']) && $_GET['cat_id'] == $v['id'])? "list-group-item-primary":"" ?>"
                        >
                            <?= $v['name'] ?>
                        </a>
                    <?php
                    }
                    ?>

                </div>
                <!-- Search By Category End -->
            </div>
            <!-- Url List Container -->

            <!-- Normal Container -->
            <div class="col-md-9">

                <!-- User Index -->
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

                </div>
                <!-- User Index End -->
            </div>
            <!-- Normal Container End -->

        </div>

    </div>
    <!-- Container Start End -->

<?php

    // Require "Preloading"
    require __DIR__ . "/../initial/view/preloading/preloading.php";

    // Require "Footer"
    require __DIR__ . "/view/finish_footer.php";
?>

