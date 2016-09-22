<?php
$usr = $_SERVER['PHP_AUTH_USER'];
$usr_passwd = $_SERVER['PHP_AUTH_PW'];

if ($usr == "zaz" && $usr_passwd == "Ilovemylittleponey")
{
    $b64image = base64_encode(file_get_contents('../img/42.png'));
    echo "<html><body>
    Hello Zaz<br />\n<img src='data:image/png;base64, $b64image'>
    </body></html>\n";
}
else
    echo "<html><body>That area is accessible for members only</body></html>
* Closing connection #0";
?>