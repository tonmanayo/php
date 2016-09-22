
<?php
    if (file_exists("../private/chat") == true) {
        $file_stuff_old = file_get_contents("../private/chat");
        $file_stuff = unserialize($file_stuff_old);
        datefmt_set_timezone("Africa/johannisburg");
        foreach($file_stuff as $key => $usr) {
           $login = $usr['login'];
           $msg = $usr['msg'];
           $time = date('H:i', $usr['time']);
           echo $string = "[".$time."] ". "<b>" . $login ."</b> ". $msg . "<br \>";
        }
        }
?>