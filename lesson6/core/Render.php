<?php

namespace app\core;

class Render
{
    protected $pageData;

    public function __construct($pageData = [])
    {
        $this->pageData = $pageData;
    }

    public function pageRender()
    {
        $pageData = $this->pageData;

        return $this->templateRender('layouts/main',
            [
                'menu' => $this->templateRender('menu', $pageData),
                'content' => $this->templateRender($pageData['tplName'], $pageData),
                'pageTitle' => $pageData['pageTitle'],
            ]
        );
    }

    protected function templateRender($tplName, $data)
    {
        $fileName = TEMPLATE . $tplName . '.tpl.php';

        if (file_exists($fileName)) {
            ob_start();
            extract($data);
            
            include $fileName;

            return ob_get_clean(); 
        } else {
            exit('Шаблон ' . $fileName . ' не найдет.');
        }
    }
}
