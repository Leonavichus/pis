<?php
require 'db.php';
require 'header.php';
$title = "Форма авторизации";

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (isset($_POST['do_login'])) {

    $statement = $connection->prepare('SELECT COUNT(*) as count FROM users WHERE login=? AND password=?');
    $statement->execute(array($login, $password));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user['count'] == 0) {
        echo '<script>alert("No user")</script>';
        exit();
    }

    $sql = "SELECT * FROM users WHERE login=:login AND password=:password";
    $stmt  = $connection->prepare($sql);
    $stmt->execute([':login' => $login, ':password' => $password]);

    if (isset($_POST["remember_me"])) {
        setcookie("login", $_POST["login"], time() + 3600, "/");
        setcookie("password", $_POST["password"], time() + 3600, "/");
    }
}
$stk = $connection->prepare('SELECT admin as ad FROM users WHERE login=?');
$stk->execute(array($login));
$administrator = $stk->fetch(PDO::FETCH_ASSOC);
if ($administrator['ad'] == 1) {
    $_SESSION['admin'] = 1;
} else {
    $_SESSION['admin'] = 0;
}
var_dump($administrator['ad']);

$stm = $connection->prepare('SELECT id_user as id FROM users WHERE login=?');
$stm->execute(array($login));
$userID = $stm->fetch(PDO::FETCH_ASSOC);
var_dump($userID['id']);
$_SESSION['id_user'] = $userID['id'];
?>
<?php if ($_COOKIE['login'] == '') : ?>
    <div class="container mt-4">
        <div class="card mt-5">
            <h2>Форма авторизации</h2>
            <form action="login.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
                <input type="checkbox" name="remember_me" checked="checked" /> Запомнить меня <br>
                <button class="btn btn-success" name="do_login" type="submit">Авторизоваться</button>
            </form>
            <br>
            <p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
            <p>Вернуться на <a href="header.php">главную</a>.</p>
        </div>
    </div>
<?php else :
    var_dump($_COOKIE);
?>
    <div class="container mt-4">
        <div class="card mt-5">
            <p>User: <b><?= $_COOKIE['login'] ?></b> <a href="exit.php"> Exit</p>
        </div>
    </div>
<?php endif; ?>
<?php require 'footer.php'; ?>