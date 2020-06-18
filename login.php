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
            <form action="login2.php" method="post">
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
        if(mysqli_query($conn, "SELECT `USERNAME` FROM `users` WHERE USERNAME = '$USERNAME'")&& mysqli_query($conn, "SELECT 'PASSWORD' FROM `users` WHERE PASSWORD = '$PASSWORD'"))
        {
            echo "<h1>hi</h1>";
        }
    
    }
    else{
        echo "<h3>insert valid username or password<h3>";
    }
}