<?php
namespace TAT_Core\lib;

class Conf
{
    static public  $confclass = array();

    static public function get($name, $file)
    {
        if (isset(self::$confclass[$file])) {
            return self::$confclass[$file][$name];
        } else {
            $path = TAT . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$confclass[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    static public function all($file)
    {
        if (isset(self::$confclass[$file])) {
            return self::$confclass[$file];
        } else {
            $path = TAT . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$confclass = $conf;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}