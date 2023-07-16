<?php
/*
 * TAT核心文件
 * Author: z3x1n
 * Mail: suanya@aliyun.com
 * Date: 2023-07-16
 */
namespace TAT_Core;
use TAT_Core\lib\Conf;


define('TAT', dirname(__DIR__));
define('APP', TAT.'/App');
define('CORE', TAT.'/TAT_Core');
define('MODULE', '\App\Ctrl\\');

include CORE.'/common.php';

class tat
{
    public static $classMap = array();
    public $assign;

    static public function run()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '<')) {
            throw new \Exception('TAT requires PHP version 7.2.0 or higher!');
        }

        define('TAT_VERSION', '1.0');
        date_default_timezone_set('Asia/Shanghai');
        spl_autoload_register('TAT_Core\tat::load');

        $debug = Conf::get('APP_DEBUG', 'app');
        error_reporting($debug ? E_ALL : 0);

        if ($debug) {
            $whoops = new \Whoops\Run();
            $errorTitle = "TAT框架出错了～";
            $option = new \Whoops\Handler\PrettyPageHandler();
            $option->setPageTitle($errorTitle);
            $whoops->pushHandler($option);
            $whoops->register();
        }
        //待添加自定义错误信息
        //...
        \TAT_Core\lib\Log::init();

        try {
            $route = new \TAT_Core\lib\Route();
            $ctrlClass = $route->ctrl;
            $action = $route->action;
            $ctrlFile = APP.'/Ctrl/'.$ctrlClass.'Ctrl.php';
            $ctrlClass = MODULE.$ctrlClass.'Ctrl';

            if (is_file($ctrlFile)) {
                include $ctrlFile;
                $ctrl = new $ctrlClass();
                $ctrl->$action();
                //\TAT_Core\lib\Log::log('CTRL:'.$ctrlClass.'--'.'ACTION:'.$action);
            } else {
                throw new \Exception('找不到控制器'.$ctrlClass);
            }
        } catch (\Exception $e) {
            // 处理框架异常
            \TAT_Core\lib\Log::log('Exception: ' . $e->getMessage());
            // 可根据需求进行异常处理和日志记录
            // ...
        }
    }


    static public function load($className)
    {
        $className = str_replace('\\', '/', $className);
        if(isset(self::$classMap[$className])){
            return true;
        } else {
            $file = TAT. '/'. $className. '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$className] = $className;
            } else {
                return false;
            }
        }
    }



}