<?php

    // Connect to DB
    require __DIR__ . "/..//initial/conn/index.php";

    // Function Call
    require __DIR__ . "/functions/index/getdata.php";

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

        <form action="" method="get">
        <div class="row justify-content-end">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                            <input name="page" type="text" class="form-control" value="<?= $page ?>">
                        
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                    / <?= $total_pages ?> Go
                                </button>
                            </div>

                    </div>
                </div>
        </div>
        </form>


    <!-- All FOrum List -->
    <div class="card-columns">

        <?php 
            // [id] => 3
            // [image] => /assets/images/forums/admin_id1_01_32_52_5c47b63463864.jpg
            // [title] => Ohmar
            // [admin_id] => 1
            // [deleted_at] => 
            // [admin_name] => Lwin Moe Paing
            // [ph] => 09-420059241
            foreach($result as $k => $v){
        ?>

            <div class="card">
                <img class="card-img-top" src="<?= $v['image'] ?>" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title"><?= $v['title'] ?></h5>
                <p class="card-text">
                    <?php 
                        // Limited Word COunt
                        $limit = 20 ;

                        if(strlen($v['description']) > $limit) {
                            for($i = 0; $i < $limit ; $i++) {
                                echo str_split($v['description'], 1)[$i] ;
                            }
                    ?> .......
                    <?php
                        } else {

                    ?>
                        <?= $v['description'] ?>
                    <?php       
                        }
                    ?>

                </p>

                <p class="card-text">
                    <a class="btn btn-outline-primary" href="more.php?id=<?= $v['id'] ?>" role="button"> More </a>
                </p>
                </div>
            </div>

        <?php      
            }
        ?>

    </div>
    <!-- All Forum List End -->

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


