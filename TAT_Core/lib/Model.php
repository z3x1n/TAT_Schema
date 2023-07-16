<?php

namespace TAT_Core\lib;

use Medoo\Medoo;
use \TAT_Core\lib\Conf;

class Model extends Medoo
{

    public function __construct()
    {
        $DBconf = Conf::all('database');
        parent::__construct($DBconf);

    }


}
