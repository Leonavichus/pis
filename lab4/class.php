<?php

class loginExp extends Exception
{
    function __construct($msg)
    {
        $msg .= " login!";
        parent::__construct($msg);
    }
}

class emailExp extends Exception
{
    function __construct($msg)
    {
        $msg .= " email!";
        parent::__construct($msg);
    }
}

class passExp extends Exception
{
    function __construct($msg)
    {
        $msg .= " password!";
        parent::__construct($msg);
    }
}

abstract class AUser
{
    function showInfo()
    {
        echo "Login: $this->login <br>";
        echo "Email: $this->email <br>";
        echo "Password: $this->password <br>";
    }
    abstract function stopInfo();
}

class User extends AUser
{
    public $login;
    public $email;
    public $password;

    public function stopInfo()
    {
    }

    function __construct($login = "Ip", $email = "ip@mail.ri", $password = "ip1234")
    {
        try {
            if ($login == "")
                throw new loginExp("Вы не ввели");
            $this->login = $login;
            if ($email == "")
                throw new emailExp("Вы не ввели");
            $this->email = $email;
            if ($password == "")
                throw new passExp("Вы не ввели");
            $this->password = $password;
        } catch (loginExp $e) {
            echo "Error ", $e->getMessage();
        } catch (emailExp $e) {
            echo "Error ", $e->getMessage();
        } catch (passExp $e) {
            echo "Error ", $e->getMessage();
        }
        // echo "Вызван конструктор\n";
    }

    function __destruct()
    {
        // echo "Вызван деконструктор\n";
    }

    function __clone()
    {
        $this->login = "Guest";
        $this->email = "guest@gmail.com";
        $this->password = "987654321";
    }

    function objectClass()
    {
        $this->login;
        $this->email;
        $this->password;
    }

    function callObjectClass()
    {
        $this->objectClass();
    }
}

class SuperUser extends User
{
    public $role;
    function __construct($login, $email, $password, $role)
    {
        parent::__construct($login, $email, $password);
        $this->role = $role;
        // echo "Вызван конструктор\n";
    }
}
$user = new User();
$user->showInfo();
$user1 = clone $user;
$superuser = new SuperUser("SuperAdmin", "root@mail.ru", "admin1234", "admin");
$user1->showInfo();
$superuser->showInfo();
unset($user, $user1, $superuser);
