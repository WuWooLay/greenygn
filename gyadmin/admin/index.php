<?php

    // Connect Mysql
    require __DIR__ . "/../../initial/conn/index.php";

    // Middlewares
    require __DIR__ . "/middlewares/is_admin.php";

    echo "ADMIN";

    echo "<a href='/logout'> Logout </a>";