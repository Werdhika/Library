<?php session_start();

require 'connect.php';

// Ambil ID buku dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data buku dari database
$sql = "SELECT 
    library_books.id AS book_id,
    library_books.title,
    library_books.author,
    library_books.description,
    library_books.publication_year,
    library_books.cover,
    library_books.stock,
    category.id AS category_id,
    category.category_name AS category_name
    FROM library_books
    INNER JOIN category 
    ON library_books.category_id = category.id
    WHERE library_books.id = ?;
    ";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    echo "<p>Buku tidak ditemukan.</p>";
    exit;
}

?>

<?php require_once './layouts/app-head.php' ?>

<div class="container mt-5">
    <div class="row">
        <!-- Gambar Buku -->
        <div class="col-md-4 text-center">
            <img src="gambar/<?= htmlspecialchars($book['cover']) ?>"
                alt="<?= htmlspecialchars($book['title']) ?>"
                class="img-fluid rounded shadow"
                style="max-height: 400px; object-fit: cover;">
        </div>

        <!-- Detail Buku -->
        <div class="col-md-8">
            <h2><?= htmlspecialchars($book['title']) ?></h2>
            <p><strong>Penulis:</strong> <?= htmlspecialchars($book['author']) ?></p>
            <p><strong>Kategori:</strong> <?= htmlspecialchars($book['category_name']) ?></p>
            <p><strong>Stok Tersedia:</strong> <?= htmlspecialchars($book['stock']) ?> buku</p>
            <p><?= nl2br(htmlspecialchars($book['description'])) ?></p>

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2 mt-3">
                <?php if ($book['stock'] > 0): ?>
                    <!-- Tombol Pinjam -->
                    <form action="borrow-book.php" method="post">
                        <input type="hidden" name="book_id" value="<?= $book['book_id'] ?>">
                        <button type="submit" class="btn btn-success">Pinjam Buku</button>
                    </form>
                <?php else: ?>
                    <button class="btn btn-secondary" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once './layouts/app-foot.php' ?>