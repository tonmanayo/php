#!/usr/bin/php
<?php
$string = preg_replace('/[\t\s]+/',' ', $argv[1]);
    echo "$string";
?>