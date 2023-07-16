<?php
require 'vendor/autoload.php';

use TAT_Core\tat;

class Run
{
    public function tatrun()
    {
        include 'TAT_Core/tat.php';
        tat::run();
    }
}
