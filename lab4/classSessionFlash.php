<?php

class Session
{
    protected $name;
    protected $id;

    function __construct()
    {
        session_start();
    }

    function setSession($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        return $_SESSION[$this->id] = $this->name;
    }

    function getSessionName($id)
    {
        return $_SESSION[$id];
    }

    function checkSession($id)
    {
        return isset($_SESSION[$id]);
    }

    function delSession($id)
    {
        unset($_SESSION[$id]);
    }
}

class Flash
{
    protected $saveSession;

    function __construct()
    {
        $this->saveSession = new Session();
    }

    function setMessage($id, $mess)
    {
        $this->saveSession->setSession($id, $mess);
    }

    function getMessage($id)
    {
        if ($this->saveSession->checkSession($id)) {
            return $this->saveSession->getSessionName($id);
        }
    }
}

$ses = new Flash;
$ses->setMessage('s1', 'Привет');
$ses->setMessage('s2', 'Пока');
echo $ses->getMessage('s2');
