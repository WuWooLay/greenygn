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

        // Validate Title
        $req['title'] = isset($_POST['title']) ? validation($_POST['title']) : '' ;
        // Delete All White Space
        $req['title'] =  preg_replace('/\s+/', ' ', $req['title']);
        if (strlen($req['title']) < 3 ) {
            $req['errors'][] = 'Must Be Title Atleast 3words';
        }

        // Validate Description
        $req['description'] = isset($_POST['description']) ? validation($_POST['description']) : '' ;
        // Delete All White Space
        $req['description'] = preg_replace('/\s+/', ' ', $req['description']);
        if (strlen($req['description']) == 0 ) {
            $req['errors'][] = 'Fill The Description Field';
        }


        // If Check Errors 
        // If All Are Okay
        if( count($req['errors']) == 0 ) {

            $sql = "UPDATE `forum` SET `title` = '".$req['title']."',";
            $sql .= " `description` = '". $req['description'] ."', `modified_at` = NOW()";
            $sql .= " WHERE `forum`.`id` = " . $req['id'] ;

            // die($sql);
            if(mysqli_query($conn, $sql)) {
                $req['success'][] = "Successfully Updated";

                // echo $redirect;

                $_SESSION['success'] = "Successfully Updated";
                header('Location: ' . '/gyadmin/superadmin/forum/' . ((isset($_GET['page'])) ? '?page=' . $_GET['page'] : ''));
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

