<?php session_start();

require 'connect.php';

// $sql = "SELECT * From library_books;";
// $result = $connect->query($sql);

$sql = "SELECT * FROM library_books INNER JOIN category ON library_books.category_id = category.id";
// $query = mysqli_query($connect, $sql);

// $result = mysqli_fetch_assoc($query);

$result = $connect->query($sql);

?>

<?php require_once './layouts/app-head.php' ?>

<div class="d-flex flex-wrap justify-content-center gap-4">
    <?php foreach ($result as $book) : ?>
        <div class="card text-center" style="width: 18rem; margin: auto;">
            <div style="padding: 1rem;">
                <img src="gambar/<?= $book['cover'] ?>"
                    class="card-img-top"
                    alt="<?= $book['title'] ?>"
                    style="width: 150px; height: 220px; object-fit: cover; margin: auto; border: 1px solid #ccc; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 4px;">
            </div>
            <div class="card-footer text-start">
                <p class="text-muted mb-1"><small>Kategori: <?= htmlspecialchars($book['category_name']) ?></small></p>
                <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
                <p class="card-text mb-1"><?= htmlspecialchars($book['description']) ?></p>
                <p class="text-muted mb-2"><small><span></span>Penulis: <?= htmlspecialchars($book['author']) ?></small></p>
                <div class="text-start">
                    <a href="#" class="btn btn-primary ">View</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>