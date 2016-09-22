<?php
class Tyrion
{
    public function sleepWith($class)
    {
        if ($class instanceof Jaime)
            echo "Not even if I'm drunk\n";
        else if ($class instanceof Sansa)
            echo "Let's do this\n";
        else if ($class instanceof Cersei)
            echo "Not even if I'm drunk\n";
    }
}
?>