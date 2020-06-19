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
            <h2>LOGIN</h2>
            <form id=myForm1>
                <strong>USERNAME</strong><br>
                <input type="text" name="USERNAME" placeholder="Enter your user name" required><br>
                <strong>PASSWORD</strong><br>
                <input type="password" name="PASSWORD" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <script>
    $('#myForm1').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: 'store1.php',
            type: 'POST',
            contentType:false,
            cache:false,
            processData:false,
            data:  new FormData(this),
            success: function(obj) {
                console.log(obj)
                swal("Success", "Successfully login", "success").then(function(){location.href="index.php";

                });
                
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
