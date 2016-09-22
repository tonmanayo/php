<?php
function auth($login, $passwd)
{
    $file_stuff = file_get_contents("../private/passwd");
    $file_new_stuff = unserialize($file_stuff);
    foreach($file_new_stuff as $key => $usr) {
        if ($usr['login'] == $login && $file_new_stuff[$key]['passwd'] == hash("whirlpool", $passwd)) {
            return ("TRUE");
        }
    }
    return ("FALSE");
}
?>