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
            <form id="myForm2">
                <strong>PASSWORD</strong><br>
                <input type="password" name="PASSWORD" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
                </form>
        </div>
<script>
    $('#myForm2').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: 'delete.php?id=' + <?php echo $_GET['id']; ?>,
            type: 'POST',
            contentType:false,
            cache:false,
            processData:false,
            data:  new FormData(this),
            success: function(obj) {
                console.log("Response: " + obj)
                
                obj = JSON.parse(obj);
                if(obj.status=="success")
                {
              swal("Success", "Successfully deleted", "success").then(function(obj) {
   location.href = "register.php";
});
                }
                else if(obj.status=="failure")
                {
              swal("failure", "please insert correct password", "warning").then(function(obj) {
   location.href = "deletefront.php";
});
                }
                else if(obj.status=="404 page error")
                {
              swal("failure", "something went wrong please try again later", "warning").then(function(obj) {
   location.href = "deletefront.php"; 
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
   