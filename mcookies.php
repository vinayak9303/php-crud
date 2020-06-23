<?php
//modifing cookies!
  $name = 'user_cookie';
  $value = 'vinayak';  	
  setcookie($name, $value, time() + (86400 * 80), '/');
?>
<html>
  <body>
    <?php
      if(!isset($_COOKIE[$name])) {    
        //echo "Cookie called '" . $name . "' has not been set!";
      } else { 
        //echo "Cookie '" . $name  . "' has been set!<br>";    
       // echo "Value in cookie is: " . $_COOKIE[$name];
      }
    ?>
  </body>
</html>