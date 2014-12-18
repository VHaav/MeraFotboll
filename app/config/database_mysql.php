<?php

return [
    'dsn'             => "mysql:host=blu-ray.student.bth.se;dbname=vihb14;",
    'username'        => "vihb14",
    'password'        => "nX5YB-y3",
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    'table_prefix'    => "kmom07_",
    'verbose'         => false,
    //'debug_connect' => 'true',
];

/*
return [
    'dsn'             => "mysql:host=localhost;dbname=test;",
    'username'        => "root",
    'password'        => "test",
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    'table_prefix'    => "kmom07_",
    'verbose'         => false,
    //'debug_connect' => 'true',
];
*/
