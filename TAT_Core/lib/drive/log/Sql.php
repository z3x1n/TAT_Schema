<?php
namespace TAT_Core\lib\drive\log;
use TAT_Core\lib\Conf;
use TAT_Core\lib\Model;

class Sql
{
    protected $connection;

    public function __construct()
    {
        $conf = Conf::get('OPTION', 'log');
    }

    //日志写入数据策略
}
