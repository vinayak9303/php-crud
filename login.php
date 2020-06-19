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
            <h2>LOGIN</h2>
            <form action="login.php" method="post">
                <strong>USERNAME</strong><br>
                <input type="text" name="USERNAME" placeholder="Enter your user name" required><br>
                <strong>PASSWORD</strong><br>
                <input type="password" name="PASSWORD" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
    </body>
</html>
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
        echo "<script>
                    alert('LOGIN SUCCESSFULL');
                    window.location.href = 'index.php';
                    </script>";
                    exit;   
    } 
    else
    {      
        //echo "<h2>login unsuccessfull, please try again</h2>";     
        echo "<script>
                    alert('invalid username or password,please try again!');
                    window.location.href = 'login.php';
                    </script>";
                    exit;   
    }
    }
    else{
        echo "<h3>insert valid username or password<h3>";
    }
}