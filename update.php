<?php
require 'db_connection.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $id = $_GET['id'];
    $get_user = mysqli_query($conn,"SELECT * FROM `users` WHERE id='$id'");
    
    if(mysqli_num_rows($get_user) === 1){
        
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class="form">
            <h2>Update Data</h2>
            <form id=myForm3>
                <strong>NAME</strong><br>
                <input type="text" autocomplete="off" name="NAME" placeholder="Enter your full name" value="<?php echo $row['NAME'];?>" required><br>
                <strong>EMAIL</strong><br>
                <input type="email" autocomplete="off" name="EMAIL" placeholder="Enter your email" value="<?php echo $row['EMAIL'];?>" required><br>
                <strong>USERNAME</strong><br>
                <input type="text" autocomplete="off" name="USERNAME" placeholder="Enter your username" value="<?php echo $row['USERNAME'];?>" required><br>
                <strong>PASSWORD</strong><br>
                <input type="text" autocomplete="off" name="PASSWORD" placeholder="Enter your PASSWORD" value="<?php echo $row['PASSWORD'];?>" required><br>
                <input type="submit" value="Update">
            </form>
        </div>
        <!-- END OF UPDATE DATA SECTION -->
    </div>
    <script>
    $('#myForm3').on('submit', function(evv) {
        var uid = $(this).attr($id);
        evv.preventDefault();
        $.ajax({
            url: 'update1.php?id='+uid,
            type: 'POST',
            contentType:false,
            cache:false,
            processData:false,
            data:  new FormData(this),
            success: function(obj) {
                console.log("Response: " + obj)
                
                obj = JSON.parse(obj);
                if(obj.status=="insert valid username or password ")
                {
              swal("failure", "please insert valid username or password", "warning").then(function(obj) {
   location.href = "index.php";
});
                }
                else if(obj.status=="success")
                {
              swal("Success", "Successfully LOGIN", "success").then(function(obj) {
   location.href = "show.php";
});
                }
                else if(obj.status=="failure")
                {
              swal("failure", "please insert correct data", "warning").then(function(obj) {
   location.href = "index.php";
});
                }    
            },
            error: function(obj){
                console.log(obj)
                alert('error')
            }
        });
    });
</script>
</body>
</html>

<?php

    }else{
        // set header response code
        //http_response_code(404);
        //echo "<h1>404 Page Not Found!</h1>";
        $response['status'] = "404 page not found";
    }
    
}else{
    // set header response code
    //http_response_code(404);
   // echo "<h1>404 Page Not Found!</h1>";
   $response['status'] = "404 page not found";
}
?>

    