<?php
  // set the expiration date to one hour ago
  setcookie('user_cookie', '', time() - 3600);
?>
<html>
  <body>
    <?php
      //echo "Cookie called 'user_cookie' has been deleted.";
    ?>
  </body>
</html>