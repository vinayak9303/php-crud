

/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// UPDATING DATA
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
            $user_id = $id;
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `EMAIL` FROM `users` WHERE EMAIL = '$EMAIL' AND id != '$user_id'");
            
            if(mysqli_num_rows($check_email) > 0){    
                
                //echo "<h3>This Email Address is already registered. Please Try another.</h3>";
                $response['status'] = "email already existed";           
            }else{
                
                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `users` SET NAME='$NAME',EMAIL='$EMAIL',USERNAME='$USERNAME',PASSWORD='$PASSWORD' WHERE id=$user_id");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    $response['status'] = "success";
                    exit;
                }else{
                    //echo "<h3>Opps something wrong!</h3>";
                    $response['status'] = "failure";
                }
            }
        }else{
            //echo "Invalid email address. Please enter a valid email address";
            $response['status'] = "invalid email";
        }
        
    }else{
       // echo "<h4>Please fill all fields</h4>";
       $response['status'] = "please fill all fields";
    }   
}

// END OF UPDATING DATA
    echo json_encode($response);
?>