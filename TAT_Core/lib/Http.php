<?php

namespace TAT_Core\lib;

class Http
{
    /**
     * 发送HTTP GET请求。
     *
     * @param string $url
     * @param array $params
     * @return mixed
     */
    public static function get($url, $params = [])
    {
        $queryString = http_build_query($params);
        $url = $url . '?' . $queryString;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    /**
     * 发送HTTP POST请求。
     *
     * @param string $url
     * @param array $params
     * @return mixed
     */
    public static function post($url, $params = [])
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
