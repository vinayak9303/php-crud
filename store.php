<?php
require 'db_connection.php';

if(isset($_POST['NAME']) && isset($_POST['EMAIL']) && isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])){
    
    // check username and email empty or not
    if(!empty($_POST['NAME']) && !empty($_POST['EMAIL']) && !empty($_POST['USERNAME']) && !empty($_POST['PASSWORD'])){
        
        // Escape special characters.
        $NAME = mysqli_real_escape_string($conn, htmlspecialchars($_POST['NAME']));
        $EMAIL = mysqli_real_escape_string($conn, htmlspecialchars($_POST['EMAIL']));
        $USERNAME = mysqli_real_escape_string($conn, htmlspecialchars($_POST['USERNAME']));
        $PASSWORD = mysqli_real_escape_string($conn, htmlspecialchars($_POST['PASSWORD']));
        
        //CHECK EMAIL IS VALID OR NOT
        if (filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `EMAIL` FROM `users` WHERE EMAIL = '$EMAIL'");
            
            if(mysqli_num_rows($check_email) > 0){    
                $response['status'] = "already exist";
                
            }else{
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `users`( NAME,EMAIL,USERNAME,PASSWORD) VALUES('$NAME','$EMAIL','$USERNAME','$PASSWORD')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    $response['status'] = "success";
                }else{
                    $response['status'] = "failure";
                }
                
                
            }
            
            
        }else{
            $response['status'] = "invalid email";
        }
        
    }else{
        $response['status'] = "fields required";
    }
    
}else{
    // set header response code
    //http_response_code(404);
    //echo "<h1>404 Page Not Found!</h1>";
}
    echo json_encode($response);
?>