<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `users`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PASSWORD</th> 
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['NAME'].'</td>
            <td>'.$row['EMAIL'].'</td>
            <td>'.$row['USERNAME'].'</td>
            <td>'.$row['PASSWORD'].'</td>
            <td>
            <a href="update.php?id='.$row['id'].'">Edit</a> |
            <a href="delete.php?id='.$row['id'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
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
    
        <hr>
        <!-- SHOW DATA -->
        <h2>Show Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTIONo -->
        <form action="insert.php" method="get">
    <button type="submit" >REGISTER</button>
    </form>
        <form action="login.php" method="get">
    <button type="submit" >LOGIN</button>
    </form>
</body>

</html>