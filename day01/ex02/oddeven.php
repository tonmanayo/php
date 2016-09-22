#!/usr/bin/php
<?php

while (1)
{
    echo "Enter a number:";
    if ($strings = fgets(STDIN))
    {
        $strings = rtrim($strings, "\n");
        if (!is_numeric($strings))
            echo "'$strings' is no a number \n";
        else if ($strings % 2 == 0)
            echo "The number $strings  is even \n";
        else
            echo "The number $strings is odd \n";
    }
    else
        break ;
}
?>