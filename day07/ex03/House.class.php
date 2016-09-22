<?php
abstract class House
{
    abstract function getHouseName();
    abstract function getHouseMotto();
    abstract function getHouseSeat();

    public function introduce(){
        echo "Hosue " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : " . $this->getHouseMotto() .  "\n";
    }
}
?>