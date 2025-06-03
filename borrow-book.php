<?php session_start();

require 'connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "Anda belum login. Silakan login dulu.";
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];

    // Cek apakah buku sedang dipinjam oleh user lain
    $sql = "SELECT * FROM book_borrowing 
        WHERE book_id = ? AND loan_status = 'dipinjam'";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Maaf, buku sedang dipinjam. Silakan coba lagi nanti.');</script>";
    } else {
        // Lakukan peminjaman
        $loan_date = "2025-05-22";
        $loan_status = "Dipinjam";
        $return_date = new DateTime();
        $return_date->modify('+7 days');
        $return_date_str = $return_date->format('Y-m-d');
        $stmt = $connect->prepare("INSERT INTO book_borrowing (user_id, book_id, loan_date, return_date, loan_status) VALUES (?,?,?,?,?)");
        $stmt->bind_param("iisss", $user_id, $book_id, $loan_date, $return_date_str, $loan_status);

        if ($stmt->execute()) {
            echo "<script>alert('Peminjaman Buku Berhasil!');</script>";
        } else {
            echo "Gagal meminjam buku.";
        }
    }

    header('Location: view-detail-book.php?id=' . $book_id);
}
