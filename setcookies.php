
<?php
//setting cookies
 setcookie('our_cookie', 'current', time()-1, '/');
?>
<html>
  <body>
    <?php
      if(count($_COOKIE) > 0) {
        //echo "Enabled.";
        $_response['status']="true";
      } else { 
        //echo "Disabled.";
      } 
      echo json_encode($response); 	
    ?>
  </body>
</html> 
<?php
 