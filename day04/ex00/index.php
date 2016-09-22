<?php

session_start();
if ($_GET['submit'] === 'OK') {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}

echo"
<html><body>
<form action='index.php' method='get' name='index.php'>
  Username: <input type='text' name='login' value='" . $_SESSION['login'] . "' />
  <br />
  Password: <input type='text' name='passwd' value='" . $_SESSION['passwd'] . "' />
 <input type='submit' value='OK' />
</form>
</body></html>";
?>