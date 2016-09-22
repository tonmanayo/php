<?php
session_start();
if ($_SESSION['loggued_on_user'] != NULL) {
    if ($_POST['msg'] != '' && $_POST['submit'] == 'OK') {
        if (file_exists("../private") == false) {
            mkdir("../private", 0777);
        }
        if (file_exists("../private/chat") == false) {
            $content = array();
            $content[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
            file_put_contents("../private/chat", serialize($content));
        }
        else {
            $file_stuff_old = file_get_contents("../private/chat");
            $file_stuff = unserialize($file_stuff_old);
            $content = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
            $file_stuff[] = $content;
            file_put_contents("../private/chat", serialize($file_stuff));
        }
    }
    echo "
<html>
<head>
    <script language='JavaScript'>top.frames['chat'].location = 'chat.php';</script>
</head>
    <body>
    <form action='speak.php' method='post' name='speak.php'>
    chat: <input type='text' name='msg' value='' /> <button name='submit' value='OK' >send</button>
    </form>
    </body>
</html>";
}
else
    echo "ERROR\n";
?>