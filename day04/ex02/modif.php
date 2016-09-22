<?php

$found = 0;

if ($_POST["submit"] == "OK" && $_POST["login"] != "" && $_POST["oldpw"] != "" && $_POST["newpw"] != ""){
    if (file_exists("../private") == true) {
        $file_stuff = file_get_contents("../private/passwd");
        $file_new_stuff = unserialize($file_stuff);
        foreach($file_new_stuff as $key => $usr) {
            if ($usr['login'] == $_POST['login']) {
                $new_key = $key;
                break;
            }
        }

        if ($file_new_stuff[$new_key]['passwd'] != hash("whirlpool", $_POST['oldpw'])){
               echo "ERROR\n";
               return ;
            }
        $file_new_stuff[$new_key]['passwd'] = hash("whirlpool", $_POST['newpw']);
        file_put_contents("../private/passwd", serialize($file_new_stuff));
        echo "OK\n";
        return ;
        }
        }
        else
           echo "error\n";
?>