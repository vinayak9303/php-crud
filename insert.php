<!DOCTYPE html>
<html lang="">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <form id="myForm">
                <strong>NAME</strong><br>
                <input type="text" name="NAME" placeholder="Enter your full name" required><br>
                <strong>Email</strong><br>
                <input type="email" name="EMAIL" placeholder="Enter your email" required><br>
                <strong>USERNAME</strong><br>
                <input type="text" name="USERNAME" placeholder="Enter your user name" required><br>
                <strong>PASSWORD</strong><br>
                <input type="password" name="PASSWORD" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <form action="index.php">
            <strong>click here for login </strong><br>
            <input type="submit" value="Login">




<script>
    $('#myForm').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: 'store.php',
            type: 'POST',
            contentType:false,
            cache:false,
            processData:false,
            data:  new FormData(this),
            success: function(obj) {
                console.log("Response: " + obj)
                
                obj = JSON.parse(obj);
                if(obj.status=="already exist")
                {
              swal("failure", "email is already exist", "warning").then(function(obj) {
   location.href = "insert.php";
});
                }
                else if(obj.status=="success")
                {
              swal("Success", "Successfully Inserted", "success").then(function(obj) {
   location.href = "index.php";
});
                }
                else if(obj.status=="failure")
                {
              swal("failure", "please insert correct data", "warning").then(function(obj) {
   location.href = "insert.php";
});
                }
                else if(obj.status=="invalid email")
                {
              swal("failure", "please insert valid email", "warning").then(function(obj) {
   location.href = "insert.php";
});
                }
                else if(obj.status=="fields required")
                {
              swal("failure", "please insert correct data", "warning").then(function(obj) {
   location.href = "insert.php";
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
   
