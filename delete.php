<?php
require 'db_connection.php';
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    
    $userid = $_GET['id'];
    if( isset($_POST['PASSWORD']))
    {
        // check username and email empty or not
        if( !empty($_POST['PASSWORD']))
        {
            $PASSWORD = mysqli_real_escape_string($conn, htmlspecialchars($_POST['PASSWORD']));
            $result = $conn->query("SELECT * FROM 'users' WHERE id ='$userid' AND PASSWORD='$PASSWORD'");
            if (mysqli_num_rows($result)) 
            {
    $delete_user = mysqli_query($conn,"DELETE FROM `users` WHERE id='$userid'");
    
                if($delete_user)
                {
                    $response['status'] = "success";
                }
                else
                {
                     $response['status'] = "failure";
                }
            }
        

        }
    }
}
else
{
    // set header response code
    $response['status'] = "404 page error";
}
echo json_encode($response);
?>