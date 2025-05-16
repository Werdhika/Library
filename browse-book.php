<?php

require 'connect.php';

$sql = "SELECT * From library_books;";
$result = $connect->query($sql);


?>

<?php require_once './layouts/app-head.php' ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($result as $book): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/<?= $book['cover'] ?>" class="card-img-top" alt="<?= $book['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($book['description']) ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Penulis: <?= htmlspecialchars($book['author']) ?></small><br>
                        <small class="text-muted">Kategori: <?= htmlspecialchars($book['category_id']) ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
        <a href="#" class="btn btn-primary">View</a>
    </div>
</div>