<?php

namespace TAT_Core\lib;

class Cookie
{
    //$cookie->set('name', 'John Doe', time() + 3600, '/'); // 设置 Cookie，有效期为1小时
    public function set($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = true)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public function get($name)
    {
        return $_COOKIE[$name] ?? null;
    }

    public function delete($name, $path = '/', $domain = '', $secure = false, $httponly = true)
    {
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 3600, $path, $domain, $secure, $httponly);
            unset($_COOKIE[$name]);
        }
    }
}
