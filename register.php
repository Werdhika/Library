<?php session_start();

require 'connect.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('email sudah digunakan!'); window.location='register.php';</script>";
        exit;
    }

    // Simpan user ke database
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Gagal mendaftar!');</script>";
    }
}
?>

<?php require_once './partials/header.php' ?>

<body>
    <form action="" method="post">
        <section class="register d-flex">
            <div class="register-left-2 w-50 h-100 align-content-center">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="header">
                            <h1 class="text-center">Register</h1>
                            <p class="text-center">
                                Welcome, please input your data
                            </p>
                            <div class="register-form">
                                <label for="username" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Enter your username" />
                            </div>
                            <div class="register-form">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email" />
                            </div>
                            <div class="register-form">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password" />
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="confirm-password"
                                    name="confirm-password"
                                    autocomplete="off"
                                    placeholder="Enter your password" />
                                <button class="signup" name="register">Sign Up</button>
                                <p class="w-100 text-center">
                                    have an account?
                                    <a
                                        href="login.php"
                                        class="d-inline text-decoration-none">
                                        Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-right-2 w-50 h-100">
                <div
                    id="carouselExampleAutoplaying"
                    class="carousel slide carousel-fade"
                    data-bs-ride="carousel">
                    <div class="carousel-inner register-carousel">
                        <div class="carousel-item active">
                            <img
                                src="assets/img/img-1.png"
                                class="d-block w-100"
                                alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="assets/img/im-2.png"
                                class="d-block w-100"
                                alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="assets/img/img-3.png"
                                class="d-block w-100"
                                alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>