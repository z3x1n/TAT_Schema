<?php
/* $cache = new Cache();

   $cache->set('key', 'value', 3600); // 设置缓存，过期时间为1小时

   $data = $cache->get('key'); // 获取缓存值

   $cache->delete('key'); // 删除缓存
 */
namespace TAT_Core\lib;

class Cache
{
    protected $cacheDir;

    public function __construct()
    {
        $this->cacheDir = TAT . '/storage/caches/';
    }

    public function set($key, $value, $expire = 0)
    {
        $cacheFile = $this->getCacheFile($key);
        $data = [
            'expire' => $expire > 0 ? time() + $expire : 0,
            'value' => $value
        ];
        $data = serialize($data);
        file_put_contents($cacheFile, $data);
    }

    public function get($key)
    {
        $cacheFile = $this->getCacheFile($key);
        if (file_exists($cacheFile)) {
            $data = file_get_contents($cacheFile);
            $data = unserialize($data);
            if ($data['expire'] === 0 || $data['expire'] > time()) {
                return $data['value'];
            }
            $this->delete($key); // 缓存过期，删除缓存文件
        }
        return null;
    }

    public function delete($key)
    {
        $cacheFile = $this->getCacheFile($key);
        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }
    }

    protected function getCacheFile($key)
    {
        return $this->cacheDir . md5($key) . '.cache';
    }
}
