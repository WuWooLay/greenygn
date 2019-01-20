<?php

    require __DIR__ . "/../../../../../initial/conn/index.php";

    if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {
        // Check Get Id 
        $admin = $_SESSION['admin'];
        
        // Special Admin
        if($_GET['id'] == 1) {
            
            // Can't Ban First Admin
            $_SESSION['errors'] = " You cant Ban Special Admin ";
            header('Location: ' . '/gyadmin/superadmin/admins/');
            die();
        } else if ($_GET['id'] == $admin['id']) {
            
            // Can't Ban YourSelf
            $_SESSION['errors'] = " You cant Ban YourSelf Bro ";
            header('Location: ' . '/gyadmin/superadmin/admins/');
            die();

        }

        $sql = "SELECT `admin_role_id`, `deleted_at` FROM `admin` WHERE `id` = " . $_GET['id'];
        
        if( $result = mysqli_query($conn, $sql)) {
           
            if( $result->num_rows == 1 ) {

                $row = mysqli_fetch_assoc($result);
                
               if($admin['id'] == 1) {
                    //    die("Special Admin");
                    $nowOrNot = $row["deleted_at"] ? "NULL" : "NOW()";

                    $sql = "UPDATE `admin` SET `deleted_at` = $nowOrNot  WHERE `admin`.`id` = " . $_GET['id'];

                    if(mysqli_query($conn, $sql)) {

                        $_SESSION['success'] = " Successfully Updated ";
                        header("Location: " . "/gyadmin/superadmin/admins/");
                        die();
                    }


               } else if($admin['admin_role_id'] == 1 && $row['admin_role_id'] == 2) {
                    // Super Admin
                    //  die("Super Admin");
                      $nowOrNot = $row["deleted_at"] ? "NULL" : "NOW()";

                      $sql = "UPDATE `admin` SET `deleted_at` = $nowOrNot  WHERE `admin`.`id` = " . $_GET['id'];
  
                      if(mysqli_query($conn, $sql)) {
  
                          $_SESSION['success'] = " Successfully Updated ";
                          header("Location: " . "/gyadmin/superadmin/admins/");
                          die();
                      }

                    // die("Super Admin");
               } else {

                    $_SESSION['errors'] = " Can't Edit Super Admin EachOther ";
                    header("Location: " . "/gyadmin/superadmin/admins/");
                    die("Can't Edit Super Admin Each");
               }

                echo "<pre>";
                print_r($admin);
                die();

            } else {

                // Wrong Id
                $_SESSION['errors'] = " Can't Ban Bcoz Id Not Found ";
                header('Location: ' . '/gyadmin/superadmin/admins/');
                die();
            }
        } else {
            // Can't Connect Sql
            $_SESSION['errors'] = " Error : " . mysqli_error($conn);
            header('Location: ' . '/gyadmin/superadmin/admins/');
            die();
        }

        echo "<pre>";
        print_r($result);
        die();

    } else {
        header('Location: ' . '/gyadmin/superadmin/admins/');
        die();
    }
