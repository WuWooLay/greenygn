<?php 

function editSubmit() {
    global $conn, $req, $errors;

    $req = array();
    $errors = array();

    $req['id'] = $_POST['id'];
    
    // Get Name
    $req['name'] = validation($_POST['name']);
    // Remove White Space
    $req['name'] = preg_replace('/\s+/', ' ', $req['name']);

    // Get Position
    $req['position'] = validation($_POST['position']);
    // Remove White Space
    $req['position'] = preg_replace('/\s+/', ' ', $req['position']);
   

    $req['other_position'] = validation($_POST['other_position']);
    $req['address'] = validation($_POST['address']);
    $req['bio'] = validation($_POST['bio']);
    $req['ph'] = validation($_POST['ph']);

    // Request errors declare array
    $req['errors'] =  array();

    // Name Validate
    if(strlen($req['name']) < 3 ) {
        $req['errors'][] = 'Name Can\'t Update , Must be at leaset 3 words';
    }

    // Position Validate
    if(strlen($req['position']) == 0 ) {
        $req['errors'][] = 'Position Field Empty';
    }

    // Count errors
    if(count($req['errors']) > 0 ) {
        // if There were Errors

    } else {
        $role = "";
        if($_SESSION['admin']['id'] == 1) {
            $role = "`admin_role_id` = " . $_POST['admin_role_id'] . ",";
        }

        // No Problem 
        $sql = "UPDATE `admin` SET ";
        $sql .= "`name` = '" . $req['name'] . "', $role `position` = '" . $req['position'] . "', ";
        $sql .= "`other_position` = '" . $req['other_position'] . "', `ph` = '". $req['ph'] ."', ";
        $sql .= "`address` = '" . $req['address'] . "', `bio` = '" . $req['bio'] ."' WHERE `admin`.`id` = " . $req['id'];
        
        // die($sql);
        if ( $result = mysqli_query($conn, $sql) ) {
            // If Workd
            $req['success'][] = "Successfully Updated";

        } else {
            // If Mysqli Doesn't Work
            $req['errors'][] = "Error: " . mysqli_error($conn)  ;
        }

    }

    
    // Check Right Or Not
    // echo '<pre>';
    // print_r($req);
    // die();

}

function validation($str) {
    return  trim(htmlspecialchars($str));
 }


if(isset($_POST['edit_submit'])) 
{
    editSubmit();
}