<?php

class Targaryen
{
    public function resistsFire(){
        return false;
    }

    public function getBurned(){
        if ($this->resistsFire() == false)
           return(sprintf("burns alive"));
        else
            return (sprintf("emerges naked but unharmed"));
    }
}

?>