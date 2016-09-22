<?php

require_once 'Vertex.class.php';
class Vector
{
    private $_w = 0.0, $_x = 0.0, $_y = 0.0, $_z = 0.0;

    public static $verbose = false;

    public static function doc()
    {
        $file = file_get_contents("Vertex.doc.txt");
        echo $file . "\n";
    }

    public function getW()
    {
        return $this->_w;
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    function __construct(array $kwargs)
    {
        if (!array_key_exists('dest', $kwargs))
            return;
        if (!array_key_exists('orig', $kwargs)) {
            $kwargs['orig'] = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
        }
        foreach ($kwargs as $key => $coord) {
            if ($key == "dest") {
                $this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
                $this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
                $this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
                $this->_w = $kwargs['dest']->getW() - $kwargs['orig']->getW();
            }
        }
        if (self::$verbose == TRUE) {
            printf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed', $this->getX(), $this->getY(), $this->getZ(), $this->getW());
            echo "\n";
        }

    }

    public function __destruct()
    {
        if (self::$verbose == TRUE) {
            printf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed', $this->getX(), $this->getY(), $this->getZ(), $this->getW());
            echo "\n";
        }
    }

    public function __toString()
    {
        return (sprintf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )', $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
    }

    public function magnitude()
    {
        return (sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2)));
    }

    public function normalize()
    {
        $magnitude = $this->magnitude();
        $new = new Vertex(array('x' => ($this->getX() / $magnitude), 'y' => ($this->getY() / $magnitude), 'z' => ($this->getZ() / $magnitude)));
        return (new Vector(array('dest' => $new)));
    }

    public function add(Vector $rhs)
    {
        $new = new Vertex(array('x' => ($this->getX() + $rhs->getX()), 'y' => ($this->getY() + $rhs->getY()), 'z' => ($this->getZ() + $rhs->getZ())));
        return (new Vector(array('dest' => $new)));
    }

    public function sub(Vector $rhs)
    {
        $new = new Vertex(array('x' => ($this->getX() - $rhs->getX()), 'y' => ($this->getY() - $rhs->getY()), 'z' => ($this->getZ() - $rhs->getZ())));
        return (new Vector(array('dest' => $new)));
    }

    public function opposite()
    {
        $new = new Vertex(array('x' => (-$this->getX()), 'y' => -($this->getY()), 'z' => -($this->getZ())));
        return (new Vector(array('dest' => $new)));
    }

    public function scalarProduct($k)
    {
        $new = new Vertex(array('x' => ($this->getX() * $k), 'y' => ($this->getY() * $k), 'z' => ($this->getZ() * $k)));
        return (new Vector(array('dest' => $new)));
    }

    public function dotProduct(Vector $rhs){
        $new = (($this->getX() * $rhs->getX()) + ($this->getY() * $rhs->getY()) + ($this->getZ() * $rhs->getZ()));
        return (float)($new);
    }

    public function cos(Vector $rhs){
        return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
    }

    public function crossProduct(Vector $rhs){
        $z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
        $x = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
        $y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
       // $w = $rhs->getW() * $this->_w;
        $result = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
        return (new Vector(array('dest' => $result)));
    }


}

?>