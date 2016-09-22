<?php
class Color {
    public $green = 0;
    public $red = 0;
    public $blue = 0;
    public static $verbose = false;

    function __construct(array $kwargs)
    {
        foreach ($kwargs as $key => $color)
        {
            if ($key == "red") {
                $this->red = $kwargs['red'];
            }
            if ($key == "blue"){
                $this->blue = $kwargs['blue'];
            }
            if ($key == "green"){
                $this->green = $kwargs['green'];
            }
            elseif ($key == "rgb"){
                $this->red = ($kwargs['rgb'] >> 16) % 256;
                $this->green = ($kwargs['rgb'] >> 8) % 256;
                $this->blue = $kwargs['rgb'] % 256;
            }

        }
        if ($this::$verbose == true){
            printf( 'Color( red: %3d, green: %3d, blue: %3d ) constructed.', $this->red, $this->green, $this->blue);
            echo "\n";
        }
    }

    public static function doc()
    {
        $file = file_get_contents("Color.doc.txt");
        echo $file . "\n";
    }

    function __destruct()
    {
        if ($this::$verbose == true){
            printf( 'Color( red: %3d, green: %3d, blue: %3d ) destructed.',$this->red, $this->green, $this->blue);
            echo "\n";
        }
    }

    function __toString()
    {
        return (sprintf('Colour( red: %3d, green; %3d, blue: %3d)', $this->red, $this->green, $this->blue));
    }

    function add(Color $rhs)
    {
        return (new Color(array("red" => $rhs->red + $this->red, "green" => $this->green + $rhs->green, "blue" => $this->blue + $rhs->blue)));
    }

    function sub(Color $rhs)
    {
        return (new Color(array("red" => $rhs->red - $this->red, "green" => $this->green - $rhs->green, "blue" => $this->blue - $rhs->blue)));
    }

    function mult($f)
    {
        return (new Color(array("red" => $f->red * $this->red, "green" => $this->green * $f->green, "blue" => $this->blue * $f->blue)));
    }
}
?>