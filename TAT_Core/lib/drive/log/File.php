<?php
namespace TAT_Core\lib\drive\log;
use TAT_Core\lib\Conf;

class File
{
    public $path; #日志存储位置
    public function __construct()
    {
        $conf = Conf::get('OPTION','log');
        $this->path = $conf['PATH'];
    }

    public function log($message, $file = '')
    {
        if (!is_dir($this->path.date('YmdH'))) {
            mkdir($this->path.date('YmdH'), 0777, true);
        }
        $fileName = ($file !== '') ? $file : date('YmdHis');
        return file_put_contents($this->path.date('YmdH') . '/'.$fileName . '.php', date('Y-m-d H:i:s') . json_encode($message) . PHP_EOL, FILE_APPEND);
    }

}