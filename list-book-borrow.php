<?php session_start();

include 'connect.php'; // koneksi ke database

$sql = "SELECT 
    bb.id AS book,
    u.username AS username,
    lb.title AS book_title,
    bb.loan_date,
    bb.return_date,
    bb.loan_status
FROM book_borrowing bb
INNER JOIN user u ON bb.user_id = u.id
INNER JOIN library_books lb ON bb.book_id = lb.id
ORDER BY bb.loan_date DESC;
";

$query = mysqli_query($connect, $sql);
// while($row = mysqli_fetch_assoc($query)) {
//     var_dump($row);
// }
// die();
// $result = mysqli_fetch_assoc($query);
$i = 0;

?>

<?php require_once './layouts/app-head.php'; ?>

<div class="d-flex my-3 justify-content-between">
    <form action="" method="get" class="d-flex gap-3 w-25">
        <input name="search" type="text" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary " type="submit" id="button-addon2">Search</button>
    </form>
</div>

<table class="table table-striped">
    <thead id="table-subheading" class="table table-light">
        <tr>
            <th scope="col">User</th>
            <th scope="col">Buku</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <th scope="col" class="">Aksi</th>
        </tr>
    </thead>
    <tbody>
            
        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
            <?php $i++ ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    
                    <td><?= $row["book_title"]; ?></td>
                    <td><?= $row["username"]; ?></td>
                    <td><?= $row["loan_date"]; ?></td>
                    <td><?= $row["return_date"]; ?></td>
                    <td>
                        <div class="d-flex gap-2">
                            <a
                                type="button"
                                class="btn btn-success"
                                href="view-detail-book.php?id=<?= $row['id'] ?>">
                                Lihat
                            </a>
                            <div class="dropdown-center">
                                <button
                                    class="btn btn-secondary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item text-danger"
                                            href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>

    </tbody>
</table>
</div>

<!-- Footer -->
<?php require_once './layouts/app-foot.php';;
