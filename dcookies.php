<?php
  // set the expiration date to one hour ago
  setcookie('user_cookie', '', time() -1);
  header("Location:insert.php");
?>
<html>
  <body>
    <?php
      //echo "Cookie called 'user_cookie' has been deleted.";
     // header("Location:index.php");
    ?>
  </body>
</html>