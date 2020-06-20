<?php
require 'db_connection.php';

if( isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])){
    
    // check username and email empty or not
    if( !empty($_POST['USERNAME']) && !empty($_POST['PASSWORD'])){
        
        // Escape special characters.
        $USERNAME = mysqli_real_escape_string($conn, htmlspecialchars($_POST['USERNAME']));
        $PASSWORD = mysqli_real_escape_string($conn, htmlspecialchars($_POST['PASSWORD']));
        $result = $conn->query("SELECT * FROM users WHERE USERNAME ='$USERNAME' AND PASSWORD='$PASSWORD'");



        if (mysqli_num_rows($result)) {
        //echo ""SELECT * FROM users WHERE USERNAME ="$USERNAME" AND 'PASSWORD'="$PASSWORD";
        //echo "<h2>login successfull</h2>";  
        $response['status'] = "success";
                    
                }
    else{
                    $response['status'] = "failure";
                   
    }
    }
    else{
        $response['status'] = "insert valid username or password ";
                
                }
    }
    echo json_encode($response);
?>