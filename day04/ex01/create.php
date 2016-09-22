<?php

if ($_POST["submit"] == "OK" && $_POST["login"] != "" && $_POST["passwd"] != ""){
    if (file_exists("../private") == false) {
        mkdir("../private", 0777);
        $content = array();
        $content[] = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']));
        file_put_contents("../private/passwd", serialize($content));
    }
    else {
        $file_stuff = file_get_contents("../private/passwd");
        $file_stuff = unserialize($file_stuff);
        $i = 0;
        while ($file_stuff[$i]) {
            if ($file_stuff[$i]['login'] == $_POST['login']) {
                echo "error \n";
                return ;
            }
            $i++;
        }
        $file_new_stuff =  array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']));
        $file_stuff[] = $file_new_stuff;
        file_put_contents("../private/passwd", serialize($file_stuff));
    }
    echo "OK\n";
}
else
    echo "error\n";
?>