<?php
class NightsWatch implements Ifighter
{
    public function recruit( $rhs ) {
        if (method_exists($rhs, 'fight') && call_user_func(array($rhs, 'fight')))
            $rhs->fight();
    }
    public function fight() {
    }
}
?>