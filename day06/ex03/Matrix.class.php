<?php
include_once 'Vector.class.php';

class Matrix
{
    const IDENTITY = "IDENTITY", scale = "SCALE", RX = "rotate x", RY = "rotate y", RZ = "rotate z", TRANSLATION = "translation", PROJECTION = "projection";

    public static $verbose = FALSE;

    public function __construct(array $kwargs)
    {


    }

    public static function doc(){
        print (file_get_contents("./Matrix.doc.txt"));
        echo ("\n");

    }
}