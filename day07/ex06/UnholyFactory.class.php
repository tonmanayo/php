<?php
class UnholyFactory
{
    public $temp = array();
    public function absorb($class){
        if ($class instanceof Fighter) {
            if (in_array($class, $this->temp))
                echo"(Factory already absorbed a fighter of type " . $class->fightertype . ")\n" ;
            else {
                echo "(Factory absorbed a fighter )" . $class->fightertype . ")\n";
                $this->temp[] = $class;
            }
        }
        else
        {
            echo "(Factory can't absorb this, it's not a fighter)\n";
        }
    }

    public function fabricate($fighters){
        foreach ($this->temp as $fighter) {

            if ($fighters == $fighter->getFightertype()) {
                print( "(Factory fabricates a fighter of type " . $fighters . ")\n");
                return clone $fighter;
            }
        }
        print( "(Factory hasn't absorbed any fighter of type " . $fighters . ")\n" );
        return ;
    }
}
?>