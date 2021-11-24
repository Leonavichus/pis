<?php

class Db
{
    private $host = "localhost";
    private $username = "root";
    private $pwd = "usbw";
    private $dbName = "users";

    protected function connect()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8";
        $pdo = new PDO($dsn, $this->username, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

class usersTest extends Db
{
    public function getUsers()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['id'] . '&nbsp' . "|" . '&nbsp';
            echo $row['login'] . '&nbsp' . "|" . '&nbsp';
            echo $row['email'] . '&nbsp' . "|" . '&nbsp';
            echo $row['password'] . '<br>';
        }
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $user = $stmt->fetchAll();

        foreach ($user as $us) {
            echo $us['id'] . '&nbsp' . "|" . '&nbsp';
            echo $us['login'] . '&nbsp' . "|" . '&nbsp';
            echo $us['email'] . '&nbsp' . "|" . '&nbsp';
            echo $us['password'] . '<br>';
        }
    }

    public function setUser($name, $mail, $pass)
    {
        $sql = "INSERT INTO user(login, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $mail, $pass]);
    }

    public function delUser($id)
    {
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function editUser($id, $name, $mail, $pass)
    {
        $sql = 'UPDATE user SET login = ?, email = ?, password = ? WHERE id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $mail, $pass, $id]);
    }

    public function clearTable()
    {
        $sql = "TRUNCATE TABLE user";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
    }
}

$userObj = new usersTest();
echo "GetUsers: ", $userObj->getUsers();
echo "GetUser: ", $userObj->getUser("1");
// $userObj->setUser("molun", "molun@mail.ru", "4321");
// $userObj->delUser("7");
// $userObj->editUser("1", "yoshi", "yoshi@mail.ru", "4321");
// $userObj->clearTable();
