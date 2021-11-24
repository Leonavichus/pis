<?php
require '../db.php';
require '../header.php';

$id_book = $_GET['id_book'];

$sql = "SELECT 
u.id_user,
c.id_comm as id_comm,
b.name as name,
u.login as login,
c.comm_text as comm_text,
c.date_time as date_time
FROM commit as c
inner join users as u on c.id_u = u.id_user 
join books as b on c.id_b = b.id_book 
WHERE c.id_b = $id_book";

$statement = $connection->prepare($sql);
$statement->execute();
$commit = $statement->fetchAll(PDO::FETCH_OBJ);

$login = $_COOKIE['login'];
$user_select = $connection->prepare('SELECT id_user FROM users WHERE login=' . $_COOKIE['login'] . '');
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All commit</h2>
        </div>
        <div class="card-body">
            <?php
            if ($login = $_COOKIE['login']) : ?>
                <form action="create_c.php" method="post">
                    <div class="form-group">
                        <label for="comm_text">Commit</label>
                        <input type="text" name="comm_text" id="comm_text" class="form-control">
                        <?php
                        echo "<input type='hidden' name='id_b' id='id_b' value='" . $id_book . "'>";
                        echo "<input type='hidden' name='id_u' id='id_u' value='" . $_SESSION['id_user'] . "'>";
                        ?>
                    </div>
                    <div class=" form-group">
                        <button type="submit" class="btn btn-info">Create a commit</button>
                    </div>
                </form>
            <?php endif; ?>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Comm_Text</th>
                    <th>Date_Time</th>
                </tr>
                <?php foreach ($commit as $person) : ?>
                    <tr>
                        <td><?= $person->id_comm; ?></td>
                        <td><?= $person->login; ?></td>
                        <td><?= $person->comm_text; ?></td>
                        <td><?= $person->date_time; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php require '../footer.php'; ?>