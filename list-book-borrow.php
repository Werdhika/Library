<?php session_start();

include 'connect.php'; // koneksi ke database

$query = "SELECT 
    bb.id AS borrow_id,
    u.name AS user_name,
    lb.title AS book_title,
    bb.loan_date,
    bb.return_date,
    bb.loan_status
FROM book_borrowing bb
INNER JOIN users u ON bb.user_id = u.id
INNER JOIN library_books lb ON bb.book_id = lb.id
ORDER BY bb.loan_date DESC;
";

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

        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <?php $i++ ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><img style="width: 40px;" src="gambar/<?= $row['cover']; ?>"></td>
                    <td><?= $row["title"]; ?></td>
                    <td><?= $row["author"]; ?></td>
                    <td><?= $row["publication_year"]; ?></td>
                    <td><?= $row["stock"]; ?></td>
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
        <?php endif; ?>

    </tbody>
</table>
</div>

<!-- Footer -->
<?php require_once './layouts/app-foot.php'; ?><?php session_start();

include 'connect.php'; // koneksi ke database

$query = "SELECT 
    bb.id AS borrow_id,
    u.name AS user_name,
    lb.title AS book_title,
    bb.loan_date,
    bb.return_date,
    bb.loan_status
FROM book_borrowing bb
INNER JOIN users u ON bb.user_id = u.id
INNER JOIN library_books lb ON bb.book_id = lb.id
ORDER BY bb.loan_date DESC;
";

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

        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <?php $i++ ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><img style="width: 40px;" src="gambar/<?= $row['cover']; ?>"></td>
                    <td><?= $row["title"]; ?></td>
                    <td><?= $row["author"]; ?></td>
                    <td><?= $row["publication_year"]; ?></td>
                    <td><?= $row["stock"]; ?></td>
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
        <?php endif; ?>

    </tbody>
</table>
</div>

<!-- Footer -->
<?php require_once './layouts/app-foot.php';?>