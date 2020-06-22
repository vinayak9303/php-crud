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
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['NAME'].'</td>
            <td>'.$row['EMAIL'].'</td>
            <td>'.$row['USERNAME'].'</td>
            <td>
            <a href="update.php?id='.$row['id'].'" class= "btn btn-success">Edit</a> |
            <button class="delete_btn" user_id="'.$row['id'].'">Delete</button>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</style>
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
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>

<script>
    $(".delete_btn").on("click", function(e) {
        var uid = $(this).attr("user_id");
        $("#myModal").modal("show");
        $("#myForm2").on("submit", function(ev) {
        ev.preventDefault();
        $.ajax({
            url: 'delete.php?id=' + uid,
            type: 'POST',
            contentType:false,
            cache:false,
            processData:false,
            data:  new FormData(this),
            success: function(obj) {
                obj = JSON.parse(obj);
                if(obj.status=="success")
                {
              swal("Success", "Successfully deleted", "success").then(function(obj) {
   location.href = "show.php";
});
                }
                else if(obj.status=="failure")
                {
              swal("failure", "please insert correct password", "warning").then(function(obj) {
   location.href = "show.php";
});
                }
                else if(obj.status=="404 page error")
                {
              swal("failure", "something went wrong please try again later", "warning").then(function(obj) {
   location.href = "show.php"; 
});
                }
                               
            },
            error: function(obj){
                console.log(obj)
                alert('error')
            }
        });

        });
    });
</script>




</body>

</html>