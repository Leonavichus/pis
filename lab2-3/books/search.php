<?php
require '../db.php';
?>
<table class="table table-bordered">
    <thead class="alert-info">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Year_writing</th>
            <th>Authors</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_POST['search']) && isset($_GET['sort']) && isset($_GET['sort_r'])) {
            $sort_opt = "";
            $book_opt = "";
            if ($_GET['sort'] == "ASC") {
                $sort_opt = "ASC";
            } elseif ($_GET['sort'] == "DESC") {
                $sort_opt = "DESC";
            }

            if ($_GET['sort_r'] == "id_book") {
                $book_opt = "id_book";
            } elseif ($_GET['sort_r'] == "name") {
                $book_opt = "name";
            } elseif ($_GET['sort_r'] == "year_writing") {
                $book_opt = "year_writing";
            }

            $kyeword = $_POST['kyeword'];
            $sql = "SELECT * FROM books WHERE id_book LIKE '$kyeword' or name LIKE '%$kyeword%' or year_writing LIKE '$kyeword' or id_a LIKE '$kyeword' or id_g LIKE '$kyeword' ORDER BY $book_opt $sort_opt";
            $statement = $connection->prepare($sql);
            $statement->execute();
            while ($books = $statement->fetch()) { ?>
                <tr>
                    <td> <?php echo $books['id_book']; ?> </td>
                    <td> <?php echo $books['name']; ?> </td>
                    <td> <?php echo $books['description']; ?> </td>
                    <td> <?php echo $books['year_writing']; ?> </td>
                    <td> <?php echo $books['id_a']; ?> </td>
                    <td> <?php echo $books['id_g']; ?> </td>
                </tr>
            <?php
            }
            ?>
    </tbody>
</table>
<?php
        }
?>