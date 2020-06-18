<!DOCTYPE html>
<html lang="">

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post">
                <strong>NAME</strong><br>
                <input type="text" name="NAME" placeholder="Enter your full name" required><br>
                <strong>Email</strong><br>
                <input type="email" name="EMAIL" placeholder="Enter your email" required><br>
                <strong>USERNAME</strong><br>
                <input type="text" name="USERNAME" placeholder="Enter your user name" required><br>
                <strong>PASSWORD</strong><br>
                <input type="text" name="PASSWORD" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
    </body>
</html>
   
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
                
                echo "<h3>This Email Address is already registered. Please Try another.</h3>";
                
            }else{
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `users`( NAME,EMAIL,USERNAME,PASSWORD) VALUES('$NAME','$EMAIL','$USERNAME','$PASSWORD')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
                
                
            }
            
            
        }else{
            echo "Invalid email address. Please enter a valid email address";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}else{
    // set header response code
    //http_response_code(404);
    //echo "<h1>404 Page Not Found!</h1>";
}
?>