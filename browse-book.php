<?php session_start();

require 'connect.php';

$sql = "SELECT * FROM library_books INNER JOIN category ON library_books.category_id = category.id";
$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_assoc($query);

if (!isset($_GET['search'])) {
    $sql = "SELECT 
        library_books.id as book_id,
        library_books.title,
        library_books.author,
        library_books.description,
        library_books.publication_year,
        library_books.cover,
        library_books.stock,
        category.id as category_id,
        category.category_name as category_name
        FROM library_books
        INNER JOIN category 
        ON library_books.category_id = category.id
    ";
    $result = $connect->query($sql);
} else {
    $keyword = isset($_GET['search']) ? $connect->real_escape_string($_GET['search']) : '';
    $sql = "SELECT * FROM library_books 
        INNER JOIN category ON library_books.category_id = category.id
        WHERE title LIKE '%$keyword%' 
        OR category.id LIKE '%$keyword%'";
}

$result = $connect->query($sql);

?>

<?php require_once './layouts/app-head.php' ?>

<div class="d-flex my-3 justify-content-between">
    <form action="" method="get" class="d-flex gap-3 w-25">
        <input name="search" type="text" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary " type="submit" id="button-addon2">Search</button>
    </form>
</div>

<div class="d-flex flex-wrap gap-4 justify-content-start">
    <?php foreach ($result as $book) : ?>
        <div class="card text-center" style="width: 18rem;">
            <div style="padding: 1rem;">
                <a href="view-detail-book.php?id=<?= $book['book_id'] ?>">
                    <img src="gambar/<?= htmlspecialchars($book['cover']) ?>"
                        class="card-img-top"
                        alt="<?= htmlspecialchars($book['title']) ?>"
                        style="width: 150px; height: 220px; object-fit: cover; margin: auto; border: 1px solid #ccc; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 4px;">
                </a>
            </div>
            <div class="card-footer text-start h-100">
                <p class="text-muted mb-1"><small>Kategori: <?= htmlspecialchars($book['category_name']) ?></small></p>
                <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
                <p class="text-muted mb-2"><small>Penulis: <?= htmlspecialchars($book['author']) ?></small></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once './layouts/app-foot.php' ?>