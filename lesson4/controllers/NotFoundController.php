<?php

namespace app\controllers;

class NotFoundController
{
    public function indexAction()
    {
        return $data['content'] = 'Ошибка 404: страница не найдена';
    }
}
