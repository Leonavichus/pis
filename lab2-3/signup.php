<?php
$title = "Форма регистрации";
require 'db.php';
require 'header.php';
//trim — удаляет пробелы (или другие символы) из начала и конца строки
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //Bспользуется для снятия тегов и удаления или кодирования нежелательных символов
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (isset($_POST['do_signup'])) {

    $statement = $connection->prepare('SELECT COUNT(*) as count FROM users WHERE login=?');
    $statement->execute(array($login));
    $loginCount = $statement->fetch(PDO::FETCH_ASSOC);

    // функция mb_strlen - получает длину строки
    if (mb_strlen($password) < 5) {
        echo '<script>alert("Error len password")</script>';
        exit();
    } else if (!preg_match('/^[a-z0-9]+$/i', $password)) {
        echo '<script>alert("Error name password")</script>';
        exit();
    } else if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script>alert("Null")</script>';
        exit();
    } else if ($loginCount['count'] > 0) {
        echo '<script>alert("Login no one")</script>';
        exit();
    }

    $sql = "INSERT INTO users (login, email, password) VALUES(:login, :email, :password)";
    $statement = $connection->prepare($sql);
    if ($statement->execute([':login' => $login, ':email' => $email, ':password' => $password])) {
        header('Location: /login.php');
    }
}
?>

<div class="container">
    <div class="card mt-5">
        <h2>Форма регистрации</h2>
        <form action="signup.php" method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" require><br>
            <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email" require><br>
            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
            <button class="btn btn-success" name="do_signup" type="submit">Зарегистрировать</button>
        </form>
        <br>
        <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
        <p>Вернуться на <a href="header.php">главную</a>.</p>

    </div>
</div>
<?php require 'footer.php'; ?>