#!/usr/bin/php
<?php
$file = fopen("page.html", "r") or die("Unable to open file!");
$sline = fread($file,filesize("page.html"));
preg_match_all('/<a.*\/a>/',$sline, $match);
$i = 0;
while ($match[0][$i])
{
    preg_match('/".*"/',$match[0][$i], $quote[$i]);
    preg_match('/>.*?</',$match[0][$i], $angular[$i]);
    $i++;
}
$i = -1;
while ($angular[++$i][0])
    $angular[$i][0] = strtoupper($angular[$i][0]);
$i = -1;
while ($quote[++$i][0])
    $quote[$i][0] = strtoupper($quote[$i][0]);
$i = -1;
while ($quote[++$i])
    $nquote[$i] = $quote[$i][0];

$i = -1;
    while ($angular[++$i])
        $nangular[$i] = $angular[$i][0];
$i = -1;
while ($nquote[++$i])
    $sline = preg_replace("/$nquote[$i]/i", "$nquote[$i]", $sline);
$i = -1;
while ($nangular[++$i])
    $sline = preg_replace("/$nangular[$i]/i", "$nangular[$i]", $sline);

    echo "$sline";

fclose($file);
?>