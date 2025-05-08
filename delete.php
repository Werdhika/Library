<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM library_books WHERE id = $id";
    if ($connect->query($sql) === TRUE) {
        header("Location: manage-book.php");
        echo "<script>alert('Data berhasil di hapus!')</script>";
        exit;
    } else {
        echo "Error saat menghapus data: " . $connect->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
