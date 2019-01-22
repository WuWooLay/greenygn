<?php 

    // HTML Special Character Remove
    function validation ($str) {
        return  trim(htmlspecialchars($str));
    }

    function edit() {
        global $conn, $req;

        // Declare Request Array
        $req = ['errors' => array(), 'success' => array() ];

        // Get Forum Id
        $req['id'] = $_POST['id'];

        // Validate Name
        $req['name'] = isset($_POST['name']) ? validation($_POST['name']) : '' ;
        // Delete All White Space
        $req['name'] =  preg_replace('/\s+/', ' ', $req['name']);
        if (strlen($req['name']) < 3 ) {
            $req['errors'][] = 'Must Be name Atleast 3words';
        }

        // Get Price
        $req['price'] = isset($_POST['price']) ? validation($_POST['price']) : '' ;
       
        if(!is_numeric($req['price'])) {
            $req['errors'][] = "Price Is Not Valid";
        }
          
        // Get Category Id
        $req['category_id'] = isset($_POST['category_id']) ? validation($_POST['category_id']) : '' ;


        // If Check Errors 
        // If All Are Okay
        if( count($req['errors']) == 0 ) {

            $sql = "UPDATE `plants` SET `name` = '" . $req['name'] ."',";
            $sql .= " `price` = '".$req['price']."', `category_id` = '".$req['category_id']."', ";
            $sql .= " `modified_at` = NOW() WHERE `plants`.`id` = " . $req['id'];
            

            // echo $sql;
            // die();

            if(mysqli_query($conn, $sql)) {
                $req['success'][] = "Successfully Updated";

                // echo $redirect;

                $_SESSION['success'] = "Successfully Updated";
                header('Location: ' . '/gyadmin/superadmin/plants/' . ((isset($_GET['page'])) ? '?page=' . $_GET['page'] : ''));
                die();

            }else {
                $req['errors'][] = "Can't Update Something Wrong : " . mysqli_error($conn);
            }

            
        }

        // echo"<pre>";
        // print_r($_POST);
        // print_r($req);
        // die();
    }

    if( isset($_POST['submit']) ) {
        edit();
    }

