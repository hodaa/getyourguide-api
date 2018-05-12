<?php

namespace GetYourGuide;


class DriverFactory
{
    public static function create($driver)
    {
        $config = include('./config.php');
        $className = __NAMESPACE__ . '\\Drivers\\' . $driver;
        return new $className ($config);
    }

}