<?php

    $title = "404";

    session_start();

    // Require "Start Header"
    require __DIR__ . "/..//initial/view/begin_header.php";
    // Require "End Header"
    require __DIR__ . "/..//initial/view/finish_header.php";

    // is Admin or Guest
    if(isset($_SESSION['admin'])) {

        if($_SESSION['admin']['admin_role_id'] == 1) {
            // Require "Navigation Bar"
            require __DIR__ . "/..//gyadmin/superadmin/view/nav/navbar.php";
        } else {

        }

    } else {
        // Require "Navigation Bar"
        require __DIR__ . "/..//initial/view/nav/navbar.php";
    }
?>

    <div class="container_404">
            <svg id="errors_404_svg" class="errors_404_svg" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
                <defs>
                    <style>
                    .errors_cls-1, .errors_cls-2, .errors_cls-3 {
                        fill: none;
                        stroke: #26a74a;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                    }

                    .errors_cls-1 {
                        stroke-width: 3px;
                    }

                    .errors_cls-3 {
                        stroke-width: 2px;
                    }
                    </style>
                </defs>
                <title>404</title>
                <g>
                    <g id="Tree_404_Group">
                    <polyline class="errors_cls-1" points="39.49 99.59 8 174.87 60.23 174.87 60.23 138 60.23 247.07"/>
                    <polyline class="errors_cls-2" points="44.1 94.51 63.11 52.16 113.8 174.87 66.57 174.87"/>
                    <polyline class="errors_cls-1" points="217.69 100.36 186.2 175.63 238.43 175.63 238.43 138.77 238.43 247.84"/>
                    <polyline class="errors_cls-2" points="222.3 95.27 241.31 52.93 292 175.63 244.76 175.63"/>
                    </g>
                    <g id="O_Group">
                    <circle class="errors_cls-3" cx="150" cy="218.26" r="29.19"/>
                    </g>
                </g>
            </svg>

            <div>
                    
                    <h4 class="mt-3"> You're looking for something Wrong </h4>

                    <h5 class="mt-2"> Let'g Get You Back </h5>
                    
                    <a href="/"> Back Home</a>

            </div>
    </div>

<?php
    // Require "Preloading"
    require __DIR__ . "/..//initial/view/preloading/preloading.php";
    
    // Require "Footer"
    require __DIR__ . "/..//initial/view/footer/footer.php";

    // Require "End Footer"
    require __DIR__ . "/..//initial/view/finish_footer.php";

?>