<?php

    // Super Admin Index.php

    // Connect Mysql 
    require __DIR__ . "/../../../initial/conn/index.php";
    
    // Middlewares
    require __DIR__ . "/../middlewares/is_superadmin.php";

    // Functions
    require __DIR__. "/functions/edit/edit.php";
    require __DIR__. "/functions/edit/upload_image.php";
    require __DIR__. "/functions/edit/getdata.php";

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

                <!-- Profile Start -->
                <div class="container">

                    <!-- Breadcum Navigation -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/gyadmin/superadmin/">DashBoard</a></li>
                            <li class="breadcrumb-item"><a href="/gyadmin/superadmin/users/">Users</a></li>
                            <li class="breadcrumb-item active"> Edit </li>
                        </ol>
                    </nav>
                    <!-- Breadcum Navigation End -->

                    <!-- Profile Form And Image -->
                    <div class="row">

                            <!-- Profile Image -->
                            <div class="col-md-4 justify-content-center">

                                <h3 class="text-center"> Profile </h3>
                              
                                <!-- Image Container -->
                                <div class="text-center mb-3">
                                    <div class="TeamImage">
                                        
                                        <img src="<?= $result['image'] ?>" alt="Lwin Moe Paing" class="rounded-circle">
                                       
                                        <div class="mt-3"> 
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block" data-toggle="modal" data-target="#UploadImage">
                                                Change Image
                                            </button>
                                        </div>

                                        <div class="mt-3"> <h6> <?= $result['name'] ?> </h6> </div>
                                        
                                    </div>
                                </div>
                                <!-- Image Container End-->


                            </div>
                            <!-- Profile Image End -->

                            <!-- Form Start -->
                            <div class="col-md-8">
                                
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


                                <!-- Show Errors Messages -->
                                <?php 
                                    if (isset($req["errors"]) && count($req["errors"]) > 0 ) {
                                        foreach($req["errors"] as $v ) {
                                ?>           
                                        <div class="alert alert-danger" role="alert">
                                            <?= $v ?>
                                        </div>
                                <?php
                                        }      
                                    }
                                ?>
                                <!-- Show Errors Messages End-->

                                <!-- Show Success Messages -->
                                <?php 
                                    if (isset($req["success"]) && count($req["success"]) > 0 ) {
                                        foreach($req["success"] as $v ) {
                                ?>           
                                        <div class="alert alert-success" role="alert">
                                            <?= $v ?>
                                        </div>
                                <?php
                                        }      
                                    }
                                ?>
                                <!-- Show Success Messages End-->

                                <form method="POST">

                                    <!-- Id -->
                                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                    <!-- Id End -->

                                    <!-- Name -->
                                    <div class="form-group">
                                      
                                      <label for="name">Name</label>
                                      <input value="<?= $result['name'] ?>" name="name" type="text" class="form-control" id="name" placeholder="Enter Name">
                                  
                                    </div>
                                    <!-- Name End -->


                                    <!-- Address -->
                                    <div class="form-group">
                                      
                                      <label for="address">Address</label>
                                      <input value="<?= $result['address'] ?>" name="address" type="text" class="form-control" id="address" placeholder="Enter Address">
                                  
                                    </div>
                                    <!-- Address End -->

                                    <!-- Bio -->
                                    <div class="form-group">
                                      
                                      <label for="bio"> Bio </label>
                                      <input value="<?= $result['bio'] ?>" name="bio" type="text" class="form-control" id="bio" placeholder="Enter Bio">
                                  
                                    </div>
                                    <!-- Bio End -->

                                    <!-- Phone -->
                                    <div class="form-group">
                                      
                                      <label for="ph"> Ph </label>
                                      <input value="<?= $result['ph'] ?>" 
                                        class="form-control" 
                                        type="tel" 
                                        id="ph" 
                                        name="ph" 
                                        pattern="[0-9]{2}-[0-9]{6,9}" 
                                        placeholder="Example 09-420012345"
                                        max=11 
                                      >
                                  
                                    </div>
                                    <!-- Phone End -->

                                    <button type="submit" name="edit_submit" class="btn btn-primary"> Save </button>
                               
                                </form>
                            </div>    
                            <!-- Form End -->

                    </div>
                    <!-- Profile Form And Image End -->

                </div>
                <!-- Profile End -->
            
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
                    <h5 class="modal-title" id="UploadImageTitle"> Image Upload</h5>
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
                            <input  name="file" type="file" class="custom-file-input" id="customFile">
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

