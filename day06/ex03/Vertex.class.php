<?php
include_once 'Color.class.php';
class Vertex
{
    private $_x = 0, $_y = 0, $_z = 0, $_w = 1;
    private $_color;

    public static $verbose = true;

    public static function doc(){
        $file = file_get_contents("Vertex.doc.txt");
        echo $file . "\n";
    }

    public function getX(){
        return $this->_x;
    }

    public function setX($x){
        $this->_x = $x;
    }

    public function getY(){
        return $this->_y;
    }

    public function setY($y){
        $this->_y = $y;
    }

    public function getZ(){
        return $this->_z;
    }

    public function setZ($z){
        $this->_z = $z;
    }

    public function getW(){
        return $this->_w;
    }

    public function setW($w){
        $this->_w = $w;
    }

    public function getColor(){
        return $this->_color;
    }

    public function setColor(Color $color){
        $this->_color = $color;
    }

    function __construct(array $kwargs){
        if (!array_key_exists('x', $kwargs) || !array_key_exists('y', $kwargs) || !array_key_exists('z', $kwargs))
            return ;
        foreach ($kwargs as $key => $coord) {
            if ($key == "x") {
                $this->setX($kwargs['x']);
            }
            if ($key == "y") {
                $this->setY($kwargs['y']);
            }
            if ($key == "z") {
                $this->setZ($kwargs['z']);
            }
            if ($key == "w") {
                $this->setW($kwargs['w']);
            }
            if ($key == "color")
                $this->setColor($kwargs['color']);
        }
        if (!array_key_exists('color', $kwargs)) {
            $this->setColor(new Color(array('red' => 255, 'green' => 255, 'blue' => 255)));
        }
        if ($this::$verbose == true) {
            printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed', $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
            echo "\n";
        }
    }
    function __destruct()
    {
        if ($this::$verbose == true) {
            printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed', $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
            echo "\n";
        }
    }

    public function __toString()
    {
        if ($this::$verbose == true)
            return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()));
        else
            return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
    }

}

?>