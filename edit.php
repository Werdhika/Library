<?php session_start();

//  Koneksi ke Database
//? ------------------ +
require 'connect.php';

//  Mengambil id buku di database
//? ------------------------------ +
$id = $_GET['id'];

//  Mengambil data buku berdasarkan id
//? ---------------------------------- +
$sql = "SELECT * FROM library_books WHERE id=$id";
$result = mysqli_query($connect, $sql)->fetch_assoc();

if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_book'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $publication_year = $_POST['publication_year'] ?? 2024;
    $cover = $_POST['cover'] ?? $result['cover'];
    $stock = $_POST['stock'] ?? 1;

    $query = "UPDATE library_books SET 
            category_id = '$category_id',
            title = '$title', 
            author = '$author', 
            description = '$description',
            publication_year = '$publication_year',
            cover = '$cover',
            stock = '$stock'   
            WHERE id = $id";

    if ($data = mysqli_query($connect, $query)) {
        echo "<script>alert('Update Buku')</script>";
        header('location: manage-book.php');
    } else {
        return;
    }

    //  Proses update file yang akan di unggah
    //? -------------------------------------- +
    $nama_file = $_FILES['cover']['name'];
    $tmp_file = $_FILES['cover']['tmp_name'];

    if ($nama_file != "") {
        $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $ekstensi_diizinkan = ['jpg', 'png'];
        $nama_baru = rand(1, 999) . '.' . $ekstensi;

        if (in_array($ekstensi, $ekstensi_diizinkan)) {
            $query = mysqli_query($connect, "SELECT cover FROM library_books WHERE id='$id_buku'");
            $data = mysqli_fetch_assoc($query);
            $cover_lama = $data['cover'];

            if ($cover_lama != '' && file_exists('gambar/' . $cover_lama)) {
                unlink('gambar/' . $cover_lama);
            }

            move_uploaded_file($tmp_file, 'gambar/' . $nama_baru);
            $update = mysqli_query($connect, "UPDATE library_books SET cover='$nama_baru' WHERE id='$id_buku'");

            if (!$update) {
                echo "<h1>Gagal update cover.</h1>";
                return;
            }
        } else {
            echo "<h1>Ekstensi file tidak diperbolehkan. Hanya jpg dan png.</h1>";
            return;
        }
    }

}

?>

<!-- Header -->
<?php require_once './layouts/app-head.php' ?>

<!-- Content -->
<div class="d-flex my-3 justify-content-between">
    <h3 class="text-start my-0">Edit Buku</h3>
    <a href="manage-book.php" class="btn btn-secondary p-2">
        Kelola Buku
    </a>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_book" value="<?= $result['id']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="title-book" class="form-label">Judul</label>
                    <input
                        value="<?= $result['title'] ?>"
                        class="form-control"
                        type="text"
                        id="title-book"
                        name="title"
                        placeholder="Judul dan Buku"
                        aria-label="default input example" />
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input
                        value="<?= $result['author'] ?>"
                        class="form-control"
                        type="text"
                        id="author"
                        name="author"
                        placeholder="Penulis Buku"
                        aria-label="default input example" />
                </div>
                <div class="mb-3">
                    <label
                        for="exampleFormControlTextarea1"
                        class="form-label">Deskripsi</label>
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        name="description"><?= $result['description']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-6 d-flex flex-column">
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori Buku</label>
                    <select
                        class="form-select"
                        aria-label="Default select example"
                        name="category_id"
                        placeholder="Pilih Category...">
                        <option value="1">Anak-anak</option>
                        <option value="2">Biografi</option>
                        <option value="3">Desain</option>
                        <option value="4">Edukasi</option>
                        <option value="5">Fantasi</option>
                        <option value="6">Geografi</option>
                        <option value="7">Horor</option>
                        <option value="8">Inspiratif</option>
                        <option value="9">Jurnal</option>
                        <option value="10">Komik</option>
                        <option value="11">Lifestyle</option>
                        <option value="12">Motivasi</option>
                        <option value="13">Novel</option>
                        <option value="14">Olahraga</option>
                        <option value="15">Puisi</option>
                        <option value="16">Romansa</option>
                        <option value="17">Spiritual</option>
                        <option value="18">Sains</option>
                        <option value="19">Fiksi</option>
                        <option value="20">Teknologi</option>
                        <option value="21">Usaha</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cover">Cover</label><br>
                    <input type="file" name="cover" id="cover">
                </div>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
                name="submit">
                Ubah Buku
            </button>
        </div>
    </div>
</form>

<!-- Footer -->
<?php require './layouts/app-foot.php' ?>