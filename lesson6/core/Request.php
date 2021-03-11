<?php

namespace app\core;

class Request
{
    protected $post;
    protected $get;
    protected $uri;
    protected $queryString;
    protected $json;

    public function __construct()
    {
        $this->post = $_POST ?? null;
        $this->get = $_GET ?? null;
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->queryString = $_SERVER['QUERY_STRING'] ?? null;

        if ($jsonReq= file_get_contents('php://input')) {
            $this->json = json_decode($jsonReq, true);
        } else {
            $this->json = null;
        }
    }
    
    public function __get($prop)
    {
        return $this->$prop;
    }
}
