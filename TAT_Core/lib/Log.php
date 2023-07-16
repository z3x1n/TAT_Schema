<?php
namespace TAT_Core\lib;
use TAT_Core\lib\Conf;

class Log
{
    static $class;

    static public function init()
    {
        $dirve = Conf::get('DRIVE', 'log');
        $classflie = '\TAT_Core\lib\drive\log\\'.$dirve;
        self::$class = new $classflie;
    }

    static public function log($message,$file = '')
    {
        self::$class->log($message,$file);
    }
}