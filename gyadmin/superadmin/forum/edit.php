<?php

    // Super Admin  superadmin/admins
    
    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/edit/edit.php";
    require __DIR__. "/functions/edit/upload_image.php";
    require __DIR__. "/functions/edit/getdata.php";

    $title = "Forum";

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
                    <li class="breadcrumb-item"><a href="/gyadmin/superadmin/forum">Forums</a></li>
                        <li class="breadcrumb-item active"> Edit </li>
                    </ol>
                </nav>
                <!-- Breadcum Navigation End -->

                <!-- Form -->
                <div class="container-fluid mt-3">
                    <div class="row">
                        
                        <!-- Edit Form -->
                        <div class="col-md-6">
                        
                            <form method="post" enctype="multipart/form-data">
                                
                            <h3 class=""> Edit Forum </h3>

                                <!-- Id -->
                                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                <!-- Id End-->
                                
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control " id="title" name="title" placeholder="Enter name" value="<?= $result['title'] ?>" required="required">
                                </div>
                                <!-- Title End-->
                                
                                <!-- Email -->
                                <div class="form-group">
                                    
                                    <label for="description">Description</label>
                                    <textarea class="form-control " name="description" id="description" cols="30" rows="8"><?=  $result['description'] ?></textarea>
                                                
                                </div>
                                <!-- Email End-->

                                <button type="submit" name="submit" class="btn btn-outline-primary"> Update Forum </button>

                            </form>

                        </div>
                        <!-- Edit Form End -->

                         <!-- Photo Change -->
                         <div class="col-md-6">
                            <!-- Change Image Button Call Modal -->
                            <button type="button" class="mb-3 btn btn-outline-primary btn-block" data-toggle="modal" data-target="#UploadImage">
                                                Change Image
                            </button>
                            <!-- Change Image Button Call Modal End -->
                                
                             <div class="PlantBackgroundChange">
                                    <div style="background-image:url('<?= $result['image'] ?>')"></div>
                             </div>

                        </div>
                        <!-- Photo Change -->

                    </div>
                </div>
                <!-- Form End -->

            </div>
            <!-- Normal Container End -->

        </div>
    
    </div>
    <!-- Container Start End -->

    <!-- Model Image -->
    <div class="modal fade" id="UploadImage" tabindex="-1" role="dialog" aria-labelledby="UploadImageTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UploadImageTitle"> Image Upload </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    
                    <!-- Image  Upload Form -->
                    <form method="post" enctype="multipart/form-data">
                            <!-- Id -->
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                            <!-- Id End-->
                            <div class="custom-file mb-3">
                            <input required  name="file" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <button type="submit" name="upload_image" class="btn btn-primary">Upload</button>

                    </form>
                    <!-- Image  Upload Form  End -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Model End-->


<?php

    // Require "Preloading"
    require __DIR__ . "/../../../initial/view/preloading/preloading.php";
                                    
    // Require "Scroll Top"
    require __DIR__ . "/../../../initial/view/footer/scrolltop.php";

    // Require "Footer"
    require __DIR__ . "/../view/finish_footer.php";
?>

