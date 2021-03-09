<?php

namespace app\core;

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace(
            ['app', '\\'], 
            [dirname(__DIR__), DIR_SEP], 
            $className . ".php"
        );

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
