#!/usr/bin/php
<?php

$j = 0;
while ($j < 1000) {
    if ($j % 99 != 0) {
        echo "x";
        $j++;
        continue ;
    }
    else
        echo "\n";
    echo "x";
    $j++;
}
?>