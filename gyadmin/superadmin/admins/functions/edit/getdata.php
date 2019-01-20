<?php


if( isset ($_GET['id'] ) && is_numeric($_GET['id'])) {

    // Check Get Id 
    $admin = $_SESSION['admin'];
    
    // Special Admin
    if($_GET['id'] == 1) {
        
        // Can't Ban First Admin
        $_SESSION['errors'] = " You cant Edit Special Admin ";
        header('Location: ' . '/gyadmin/superadmin/admins/');
        die();

    } else if ($_GET['id'] == $admin['id']) {
        
        // Can't Ban YourSelf
        $_SESSION['errors'] = " You cant Edit YourSelf Bro ";
        header('Location: ' . '/gyadmin/superadmin/admins/');
        die();

    }

    $sql = "SELECT `admin_role_id` FROM `admin` WHERE `id` = " . $_GET['id'];
    
    if( $result = mysqli_query($conn, $sql)) {
       
        if( $result->num_rows == 1 ) {

            $row = mysqli_fetch_assoc($result);

            // die(print_r($row));
            
           if($admin['id'] == 1) {
                //    die("Special Admin");

                // Get Data
                $sql = "SELECT * FROM `admin` WHERE id = " . $_GET['id'];

                if($result = mysqli_query($conn, $sql)) {
                    // Mysql Work?
                    // getResult
                    $result = (mysqli_fetch_assoc($result));
                    // echo "<pre>";
                    // print_r($result);
                    // die();
                }


           } else if($admin['admin_role_id'] == 1 && $row['admin_role_id'] == 2) {
                // Super Admin
                //  die("Super Admin");
                      // Get Data
                      $sql = "SELECT * FROM `admin` WHERE id = " . $_GET['id'];

                      if($result = mysqli_query($conn, $sql)) {
                                // Mysql Work?
                                // getResult
                                $result = (mysqli_fetch_assoc($result));
                                // echo "<pre>";
                                // print_r($result);
                                // die();
                      } else {
                          die("Something__Wrong");
                      }

           } else {
            $_SESSION['errors'] = " You Can't Edit SuperAdmin ";
            header('Location: ' . '/gyadmin/superadmin/admins/');
            die();
           }

            // echo "<pre>";
            // print_r($admin);
            // die();

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
    // echo "<pre>";
    // print_r($result);
    // die("Something Wrong");
} else {
    header('Location: ' . '/gyadmin/superadmin/admins/');
    die();
}

