<?php

    // Middle ware
    require __DIR__ . "/../initial/middlewares/auth_sessions.php";

    // Function => Login Functions
    require __DIR__ . "/functions/login.php";

    $title = "Login";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Forum Container Start -->
<div class="container-fluid mt-3">

    <h3 class="text-center"> Login </h3>

    <div class="row justify-content-center">


        <div class="col-md-4">
        
            <form method="post">
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


                <div class="form-group">

                    <label for="email">Email address</label>
                  
                    <input
                        type="email" 
                        class="form-control <?= (isset($errors['email']))? 'is-invalid' :'' ?>" 
                        id="email"
                        name="email" 
                        placeholder="Enter email"
                        value="<?= (isset($email)) ? $email : '' ?>" 
                        required="required"
                    >
                   
                    <?php 
                        if (isset($errors['email'])) {
                    ?>
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?>
                            </div>
                    <?php
                        }
                    ?>
              
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    
                    <input
                        required="required"
                        type="password"
                        name="password"
                        class="form-control <?= (isset($errors['password']))? 'is-invalid' :'' ?>"
                        id="password"
                        placeholder="Password"
                        value="<?= (isset($password)) ? $password : '' ?>" 
                    >

                    <?php 
                        if (isset($errors['password'])) {
                    ?>
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?>
                            </div>
                    <?php
                        }
                    ?>

                  

                </div>

                <button type="submit" name="submit" class="btn btn-outline-primary"> Login </button>
                <a href="/register"> Register ? </a>
            </form>

        </div>
    </div>
    
</div>
<!-- Forum Container End -->


<?php
    // Require "Preloading"
    require __DIR__ . "/..//initial/view/preloading/preloading.php";
    
    // Require "Footer"
    require __DIR__ . "/..//initial/view/footer/footer.php";

    // Require "End Footer"
    require __DIR__ . "/..//initial/view/finish_footer.php";

?>


