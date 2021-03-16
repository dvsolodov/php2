<?php

namespace app\controllers;

use app\models\entities\Comment;
use app\models\repositories\CommentRepository;
use app\core\{Request, Session};

class CommentController
{
    public function addCommentAction(Request $request, Session $session, $params)
    {
        if (isset($request->post['comment'])) {
            $userName = clearString($request->post['name']);
            $text = clearString($request->post['text']);
            $data['id'] = (int) $request->post['productId'];

            if (!$this->checkFields($userName, $text))  {
                $_SESSION['commentMsg'] = 'Заполните поля в соответствии с подсказками к ним.';
                header("Location: /products/{$data['id']}");
                exit();
            }

            $comment = new Comment($data['id'], $userName, $text, time());
            (new CommentRepository())->save($comment);
            $_SESSION['commentMsg'] = 'Ваш комментарий добавлен.';

            header("Location: /products/{$data['id']}");
            exit();
        }

        header("Location: /products/{$data['id']}");
        exit();
    }

    protected function checkFields($userName, $text)
    {
        if (strlen($userName) < MIN_NAME || 
            strlen($userName) > MAX_NAME ||
            strlen($text) < MIN_COMMENT ||
            strlen($text) > MAX_COMMENT
        ) {
            return false;
        }

        return true;
    }
}
