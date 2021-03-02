<?php

namespace app\core;

use app\config\Config;

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace(
            ['app', '\\'], 
            [dirname(__DIR__), DIRECTORY_SEPARATOR], 
            $className . ".php"
        );

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
