<?php

namespace app\core;

class Session
{
    protected $sessionId;
    protected $userId;
    protected $userLogin;
    protected $buyerId;
    protected $adminId;
    protected $adminLogin;

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

        if (isset($_SESSION['admin']['id'])) {
            $this->adminId = $_SESSION['admin']['id'];
            $this->adminLogin = $_SESSION['admin']['login'];
        } else {
            $this->adminId = $this->adminLogin = null;
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
        } elseif ($prop == "adminId") {
            $this->adminId = $_SESSION['admin']['id'] = $val;
        } elseif ($prop == "adminLogin") {
            $this->adminLogin = $_SESSION['admin']['login'] = $val;
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
        } elseif ($propName == "adminId") {
            $this->adminId = null;
            unset($_SESSION['admin']['id']);
        } elseif ($propName == "adminLogin") {
            $this->adminLogin = null;
            unset($_SESSION['admin']['login']);
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
