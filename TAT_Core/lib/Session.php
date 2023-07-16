<?php

namespace TAT_Core\lib;

class Session
{
    /**
     * 启动会话
     */
    public static function start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * 设置会话数据
     * @param string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    /**
     * 获取会话数据
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    /**
     * 删除会话数据
     * @param string $key
     */
    public static function delete($key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

    /**
     * 销毁会话
     */
    public static function destroy()
    {
        self::start();
        session_destroy();
    }
}
