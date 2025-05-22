<?php session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    echo "Anda belum login. Silakan login dulu.";
    exit;
}

$user_id = $_SESSION['user_id'];
$borrowing_id = $_GET['id'] ?? null;

if ($borrowing_id) {
    $today = date('Y-m-d');

    // Update status menjadi 'dikembalikan' dan isi tanggal pengembalian aktual
    $stmt = $connect->prepare("UPDATE book_borrowing SET status = 'dikembalikan', return_date = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sii", $today, $borrowing_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Buku berhasil dikembalikan!'); window.location='riwayat-peminjaman.php';</script>";
    } else {
        echo "Gagal mengembalikan buku.";
    }
} else {
    echo "ID peminjaman tidak valid.";
}
?>