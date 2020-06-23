
<?php
//setting cookies
  setcookie('our_cookie', 'current', time() + 3600, '/');
?>
<html>
  <body>
    <?php
      if(count($_COOKIE) > 0) {
          location.href="show.php";
        //echo "Enabled.";
      } else { 
        //echo "Disabled.";
      }  	
    ?>
  </body>
</html> 
<?php
 