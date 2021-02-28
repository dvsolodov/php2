<?php

namespace app\controllers;

use app\models\Comment;

class CommentController
{
    public function addCommentAction($params)
    {
        if (isset($_POST['comment'])) {
            $userName = clearString($_POST['name']);
            $text = clearString($_POST['text']);
            $data['id'] = (int) $_POST['productId'];

            if (!$this->checkFields($userName, $text))  {
                $_SESSION['commentMsg'] = 'Заполните поля в соответствии с подсказками к ним.';
                header("Location: /products/{$data['id']}");
                exit();
            }

            $comment = new Comment($data['id'], $userName, $text, time());
            $comment->insert();
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
