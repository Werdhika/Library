<?php session_start();

require 'connect.php';

$sql = "SELECT * From library_books;";
$result = $connect->query($sql);
$i = 0;

?>

<!-- header -->
<?php require_once './layouts/app-head.php'; ?>

<div class="d-flex my-3 justify-content-between">
    <div class="d-flex gap-3 w-25 ">
        <input type="text" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary " type="button" id="button-addon2">Search</button>
    </div>
    <a href="add-book.php" id="button-submit" class="btn btn-secondary">
        Tambah Buku
    </a>
</div>

<table class="table table-striped">
    <thead id="table-subheading" class="table table-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tanggal Terbit</th>
            <th scope="col">Stok</th>
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
                            <button
                                type="button"
                                class="btn btn-success">
                                view
                            </button>
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
<?php require_once './layouts/app-foot.php'; ?>