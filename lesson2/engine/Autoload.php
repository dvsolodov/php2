<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        $fileName = ROOT . str_replace('\\', '/', substr($className, 3)) . ".php";

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
