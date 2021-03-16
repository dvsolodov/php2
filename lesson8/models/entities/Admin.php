<?php

namespace app\models\entities;

use app\models\entities\User;
use app\core\Session;

class Admin extends User 
{
    public static function isAdmin(Session $session)
    {
        if (isset($session->adminId)) {
            return true;
        }

        return false;
    }
}

