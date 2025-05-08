<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/vanilla.css" />
        <script
            src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
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
                                <label for="username" class="form-label"
                                    >Username</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    placeholder="Enter your username"
                                />
                            </div>
                            <div class="register-form">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Enter your email"
                                />
                            </div>
                            <div class="register-form">
                                <label for="password" class="form-label"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Enter your password"
                                />
                                <label for="confirm-password" class="form-label"
                                    >Confirm Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="confirm-password"
                                    autocomplete="off"
                                    placeholder="Enter your password"
                                />
                                <button class="signup">Sign Up</button>
                                <p class="w-100 text-center">
                                    have an account?
                                    <a
                                        href="login.php"
                                        class="d-inline text-decoration-none"
                                    >
                                        Sign in</a
                                    >
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
                    data-bs-ride="carousel"
                >
                    <div class="carousel-inner register-carousel">
                        <div class="carousel-item active">
                            <img
                                src="assets/img/img-1.png"
                                class="d-block w-100"
                                alt="..."
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="assets/img/im-2.png"
                                class="d-block w-100"
                                alt="..."
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="assets/img/img-3.png"
                                class="d-block w-100"
                                alt="..."
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
