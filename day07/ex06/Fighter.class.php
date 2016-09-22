<?php
 abstract class Fighter
{
   public $fightertype;

   public function  __construct($soldier)
    {
        $this->fightertype = $soldier;
    }

    public function getFightertype()
    {
        return $this->fightertype;
    }

}
?>