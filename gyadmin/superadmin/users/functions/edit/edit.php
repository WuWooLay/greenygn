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

    // Validate Address
    $req['address'] = validation($_POST['address']);
    // Remove White Space
    $req['address'] = preg_replace('/\s+/', ' ', $req['address']);
    
    // Validate Bio
    $req['bio'] = validation($_POST['bio']);
    // Remove White Space
    $req['bio'] = preg_replace('/\s+/', ' ', $req['bio']);

    // Validation Ph
    $req['ph'] = validation($_POST['ph']);

    // Request errors declare array
    $req['errors'] =  array();

    // Name Validate
    if(strlen($req['name']) < 3 ) {
        $req['errors'][] = 'Name Can\'t Update , Must be at leaset 3 words';
    }

    // Count errors
    if(count($req['errors']) > 0 ) {
        // if There were Errors

    } else {
     

        // No Problem 
        $sql = "UPDATE `users` SET `name` = '" .$req['name']. "', ";
        $sql .= " `ph` = '".$req['ph']."', `address` = '".$req['address']."', ";
        $sql .= " `bio` = '".$req['bio']."', `modified_at` = NOW() ";
        $sql .= " WHERE `users`.`id` = " . $req['id'];
        
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