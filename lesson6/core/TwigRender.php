<?php

namespace app\core;

class TwigRender
{
    protected $data;
    protected $loader;
    protected $twig;

    public function __construct($data = [])
    {
        $this->data = $data;
        $this->loader = new \Twig\Loader\FilesystemLoader(ROOT . '/views/twig/templates');
        $this->twig = new \Twig\Environment($this->loader, [
            'cache' => ROOT . '/views/twig/cache',
            'debug' => true,
        ]);
    }

    public function pageRender()
    {
        $tplName = $this->data['tplName'] . '.twig';
        return $this->twig->render($tplName, $this->data);
    }
}
