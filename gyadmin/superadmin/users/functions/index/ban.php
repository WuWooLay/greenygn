<?php

    // Connect Database
    require __DIR__ . "/../../../../../initial/conn/index.php";


    if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {
        // Check Get Id 
        
        $sql = "SELECT * FROM `users` WHERE `id` = " . $_GET['id'];
        
        if( $result = mysqli_query($conn, $sql)) {
            
            // Check Id is Right or Wrong
            if( $result->num_rows == 1 ) {
                // If There is Id
                $row = mysqli_fetch_assoc($result);
                
                $nowOrNot = $row["deleted_at"] ? "NULL" : "NOW()";

                $sql = "UPDATE `users` SET `deleted_at` = $nowOrNot WHERE `users`.`id` = ". $_GET['id'];

                if(mysqli_query($conn, $sql)) {

                    $_SESSION['success'] = " Successfully Updated ";
                    header("Location: " . "/gyadmin/superadmin/users/" . ((isset($_GET['page'])) ? '?page=' . $_GET['page'] : '') );
                    die();
                }

                // echo "<pre>";
                // print_r($admin);
                // die();

            } else {

                // Wrong Id
                $_SESSION['errors'] = " Can't Ban Bcoz Id Not Found ";
                header('Location: ' . '/gyadmin/superadmin/users/');
                die();
            }

        } else {
            // Can't Connect Sql
            $_SESSION['errors'] = " Error : " . mysqli_error($conn);
            header('Location: ' . '/gyadmin/superadmin/users/' . ((isset($_GET['page'])) ? '?page=' . $_GET['page'] : ''));
            die();
        }

        echo "<pre>";
        print_r($result);
        die();

    } else {
        header('Location: ' . '/gyadmin/superadmin/users/' . ((isset($_GET['page'])) ? '?page=' . $_GET['page'] : ''));
        die();
    }
