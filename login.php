<?php
include 'loginController.php';
include 'layout/header.php'; 
?>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">LOGIN </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Have an account?</h3>
                        <p><?php if (isset($_SESSION['error'] )) {
                            echo $_SESSION['error'] ;
                        } ?></p>

                        <form action="loginController.php" class="login-form" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" placeholder="email"
                                    name="email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" name="password"
                                    placeholder="Password" required>

                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="register.php" class="btn btn-primary rounded p-1">New-One</a>

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" id="login"
                                    class="btn btn-primary rounded submit p-3 px-5 ">Get
                                    Started</button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include 'layout/footer.php'; ?>
