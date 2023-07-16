<?php

return [
    // 必须的
    'database_type' => 'mysql',
    'database_name' => 'test1',
    'server' => 'localhost',
    'username' => 'test1',
    'password' => 'test666',
    'charset' => 'utf8',

    // [可选]
    'port' => 3306,

    // [可选] 表名前缀
    'prefix' => '',

    // [可选] 连接的驱动选项，请阅读 http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]

];
