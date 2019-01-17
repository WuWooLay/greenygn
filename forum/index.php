<?php

    $title = "Forum";

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // Require "Navigation Bar"
    require __DIR__ . "/..//initial/view/nav/navbar.php";

?>

<!-- Forum Container Start -->
<div class="container mt-3">

    <div class="row justify-content-end">
        <div class="col-md-2">
            <div class="input-group mb-3">
                
                <input type="text" class="form-control" value="1">
               
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                        / 2
                    </button>
                </div>

            </div>
        </div>
       
    </div>


    <div class="card-columns">

        <?php 
            for($i = 0 ; $i < 10; $i++) {
        ?>

            <div class="card">
                <img class="card-img-top" src="https://readmal.com/images/team/lwinmoepaing.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                <p class="card-text">
                   
                    This is a longer card with supporting text 
                    below as a natural lead-in to additional content. 
                    This content is a little bit longer.

                    <a class="btn btn-outline-primary" href="more.php?id=1" role="button"> More </a>
                </p>
                </div>
            </div>

        <?php      
            }
        ?>

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


