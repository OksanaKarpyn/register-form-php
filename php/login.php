<?php


?>

<?php 
include 'headFoot/header.php';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : array();

unset($_SESSION['message']);


?>
<div class="wrapper">
    <!-- <a href="./indexlogin.html">login</a> -->
    <div class="container w-50">
        <div class="row">
            <!-- <div class="img-block">
                <img src="./assets/img/89e31fb982e6d87f239196db2b3e9ccc copy 1.png" alt="">
            </div> -->
            <div class="register-block">
                <div class="form">

                    <h1>Login Now</h1>
                    <div class="div">
                        <?php
                        if (!empty($message)) {
                            foreach ($message as $errorMessage) {
                                echo '<h4 class="login-error bg-danger rounded rounded-1 p-2">' . $errorMessage . '</h4>';
                            }
                        }
                        ?>
                    </div>
                    <form action="infoDatiForm/infoLogin.php" method="POST" id="loginForm">
                        <div class="div">
                        </div>
                        <div class="div">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" placeholder="Your email" id="email" name="email" class="form-control"
                                required>
                        </div>
                        <div class="div">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" placeholder="Your password" id="password" name="password"
                                class="form-control" required>
                        </div>
                        <div class="div">
                            <button type="submit" class="btn-register btn btn-outline-info w-100">Login
                                Now</button>
                        </div>
                    </form>
                    <div class="div">
                        <p class="d-inline">don't have acconut?</p>
                        <a href="register.php">register now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'headFoot/footer.php'?>