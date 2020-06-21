<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <form id=myForm2>
                <strong>PASSWORD</strong><br>
                <input type="password" name="PASSWORD" placeholder="Enter your password" required><br>
                <button type="submit" class="btn btn-default" data-dismiss="modal">Login</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ok</button> 
            </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>
  
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
   location.href = "index.php";
});
                }
                else if(obj.status=="failure")
                {
              swal("failure", "please insert correct password", "warning").then(function(obj) {
   location.href = "index.php";
});
                }
                else if(obj.status=="404 page error")
                {
              swal("failure", "something went wrong please try again later", "warning").then(function(obj) {
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
   