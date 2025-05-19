<?php session_start();

require 'connect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data user berdasarkan email
    $query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    // Cek apakah user ditemukan dan password cocok
    if ($user && $password === $user['password']) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];

        // Redirect sesuai is_admin
        if ($user['is_admin'] === 'true') {
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "<script>alert('email atau Password salah!'); window.location='login.php';</script>";
    }
}

?>

<?php require_once 'partials/header.php' ?>

</body>

</html>

<body>
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div
                id="carouselExampleAutoplaying"
                class="carousel slide carousel-fade"
                data-bs-ride="carousel">
                <div class="carousel-inner">
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

        <div class="login-right w-50 h-100 align-content-center">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="" method="post">
                        <div class="header">
                            <h1 class="text-center">Login</h1>
                            <p class="text-center">
                                Welcome, please input your data
                            </p>
                            <div class="login-form">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email" />
                            </div>
                            <div class="login-form">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password" />
                                <a
                                    href="password.php"
                                    class="fp d-block text-end text-decoration-none text-black my-4">Forgot Password</a>
                                <button class="signin" name="login">Sign in</button>
                                <p class="w-100 text-center">
                                    Don’t have an account?
                                    <a
                                        href="register.php"
                                        class="d-inline text-decoration-none">
                                        Sign Up for free</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php require_once 'partials/footer.php' ?>