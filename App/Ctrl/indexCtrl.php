<?php
namespace App\Ctrl;
use TAT_Core\lib\Conf;

class indexCtrl extends \TAT_Core\lib\View
{
    public function index()
    {
        $time = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 4);
        $this->assign('time', $time);
        $this->assign('logourl', Conf::get('TAT_LOGO', 'app'));
        $this->assign('TAT', Conf::get('APP_NAME', 'app'));
        $this->assign('TAT_V', TAT_VERSION);
        $this->display('default','index.html');
    }
}