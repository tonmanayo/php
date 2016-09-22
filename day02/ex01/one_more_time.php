#!/usr/bin/php
<?php
    $string = $argv[1];
    date_default_timezone_set('Europe/Paris');
    $monthse = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $monthf = array('/janvier/i', '/février/i', '/mars/i', '/avril/i', '/mai/i', '/juin/i', '/juillet/i', '/août/i', '/septembre/i', '/octobre/i', '/novembre/i', '/décembre/i');
    $dayse = array('Monday', 'Tuesday', 'Wednesday' ,'Thursday' ,'Friday' ,'Saturday' ,'Sunday');
    $daysf = array('/lundi/i', '/mardi/i', '/mercredi/i' ,'/jeudi/i' ,'/vendredi/i' ,'/samedi/i' ,'/dimanche/i');
    $new_str = preg_replace($monthf , $monthse, $string);
    $new_str = preg_replace($daysf , $dayse, $new_str);

if ($argc == 2)
{
    if (preg_match('/[a-zA-Z]+\s([0][1-9]|[1-9]{1}|[1-2][0-9]|[3][0-1])\s[A-Za-z]+\s[0-9]{4}\s([2][0-3]|[0-1][0-9]):([0-5][0-9]):([0-5][0-9])/', $new_str) == true)
        $string = strtotime($new_str);
    else
        $string = NULL;
    if ($string == NULL)
        echo "Wrong format";
    else
        echo "$string \n";
}
?>