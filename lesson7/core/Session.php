<?php

namespace app\core;

class Session
{
    protected $sessionId;
    protected $userId;
    protected $userLogin;
    protected $buyerId;

    public function __construct()
    {
        $this->getSessionParams();
    }

    protected function getSessionParams()
    {
        if (isset($_SESSION['user']['id'])) {
            $this->userId = $_SESSION['user']['id'];
            $this->userLogin = $_SESSION['user']['login'];
        } else {
            $this->userId = $this->userLogin = null;
        }
            
        $this->sessionId = session_id() ?? null;
        
        if (!isset($_SESSION['buyerId'])) {
            $_SESSION['buyerId'] = session_id();
        }

        $this->buyerId = $_SESSION['buyerId'];
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $val)
    {
        if ($prop == "userId") {
            $this->userId = $_SESSION['user']['id'] = $val;
        } elseif ($prop == "userLogin") {
            $this->userLogin = $_SESSION['user']['login'] = $val;
        } elseif ($prop == "buyerId") {
            $this->buyerId = $_SESSION['buyerId'] = $val;
        }
    }

    public function deleteParam(string $propName)
    {
        if ($propName == "userId") {
            $this->userId = null;
            unset($_SESSION['user']['id']);
        } elseif ($propName == "userLogin") {
            $this->userLogin = null;
            unset($_SESSION['user']['login']);
        } elseif ($propName == "buyerId") {
            $this->buyerId = null;
            unset($_SESSION['buyerId']);
        }
    }

    public function __isset($propName)
    {
        return $this->$propName;
    }

    public function regenerate()
    {
        session_regenerate_id();
        $this->buyerId = $_SESSION['buyerId'] = session_id();
    }
}
