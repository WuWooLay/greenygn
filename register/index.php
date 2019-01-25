<?php

    // Middle ware
    require __DIR__ . "/../initial/middlewares/auth_sessions.php";

    // Function => Login Functions
    require __DIR__ . "/functions/register.php";

    $title = "Register";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Forum Container Start -->
<div class="container-fluid mt-3">

    <h3 class="text-center"> Register </h3>

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

                
                <!-- Name -->
                <div class="form-group">
                    
                    <label for="name">User Name</label>
                    <input
                        type="text" 
                        class="form-control <?= (isset($errors['name']))? 'is-invalid' :'' ?>" 
                        id="name"
                        name="name" 
                        placeholder="Enter name"
                        value="<?= (isset($name)) ? $name : '' ?>" 
                        required="required"
                    >
                   
                    <?php 
                        if (isset($errors['name'])) {
                    ?>
                            <div class="invalid-feedback">
                                <?= $errors['name'] ?>
                            </div>
                    <?php
                        }
                    ?>
              
                </div>
                <!-- Name End-->
                
                <!-- Email -->
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
                <!-- Email End-->

                <!-- Phone -->
                <div class="form-group">
                    
                    <label for="ph">Phone Number</label>

                    <input 
                        value="<?= isset($ph) ? "$ph":"" ?>" 
                        class="form-control <?= (isset($errors['ph']))? 'is-invalid' :'' ?>" 
                        type="tel" 
                        id="ph" 
                        name="ph" 
                        pattern="[0-9]{2}-[0-9]{6,9}" 
                        placeholder="Example 09-420012345" 
                        max="11" 
                        required="required"
                    >
                   
                    <?php 
                        if (isset($errors['ph'])) {
                    ?>
                            <div class="invalid-feedback">
                                <?= $errors['ph'] ?>
                            </div>
                    <?php
                        }
                    ?>
              
                </div>
                <!-- Phone End-->
                
                <!-- Password -->
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
                <!-- Password End-->

                <!-- RePassword -->
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    
                    <input
                        required="required"
                        type="password"
                        name="confirmpassword"
                        class="form-control <?= (isset($errors['confirmpassword']))? 'is-invalid' :'' ?>"
                        id="confirmpassword"
                        placeholder="Enter ConfirmPassword"
                        value="" 
                    >
                    <?php 
                        if (isset($errors['confirmpassword'])) {
                    ?>
                            <div class="invalid-feedback">
                                <?= $errors['confirmpassword'] ?>
                            </div>
                    <?php
                        }
                    ?>
                 
                </div>
                <!-- RePassword End-->

                

                <button type="submit" name="submit" class="btn btn-outline-primary"> Register </button>
                <a href="/login"> Already have ? </a>
            
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


