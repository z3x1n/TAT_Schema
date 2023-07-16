<?php
namespace TAT_Core\lib;
class Route
{
    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));

            if (isset($patharr[0])) {
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }

            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = Conf::get('ACTION', 'route');
            }

            // GET参数转换
            $count = count($patharr);
            for ($i = 0; $i < $count; $i += 2) {
                $key = isset($patharr[$i]) ? $patharr[$i] : null;
                $value = isset($patharr[$i + 1]) ? $patharr[$i + 1] : null;
                $_GET[$key] = $value;
            }
        } else {
            $this->ctrl = Conf::get('CTRL', 'route');
            $this->action = Conf::get('ACTION', 'route');
        }
    }

}