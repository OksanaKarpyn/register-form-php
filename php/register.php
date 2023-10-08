<?php 
include 'headFoot/header.php';
include 'config.php';




?>


<?php


?>
<div class="wrapper">
    <div class="container w-50">
        <div class="row">
            <div class="img-block">
                <img src="./assets/img/89e31fb982e6d87f239196db2b3e9ccc copy 1.png" alt="">
            </div>
            <div class="register-block">
                <div class="form">

                    <h1>Register Now</h1>

                    <form action="infoDatiForm/infoRegister.php" method="POST" id="registerForm"
                        enctype="multipart/form-data">
                        <div class=" div">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="Your name" id="name" name="name" required
                                class="form-control">
                        </div>
                        <div class="div">
                            <label for="surname" class="form-label">Last Name</label>
                            <input type="text" placeholder="Your last name" id="surname" name="surname"
                                class="form-control" required>
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
                            <button type="submit" class="btn-register btn btn-outline-info w-100">Register
                                Now</button>
                        </div>
                    </form>
                    <div class="div">
                        <p class="d-inline">already have acconut?</p>
                        <a href="login.php">login now</a>
                    </div>
                    <div class="div">

                        <?php if(isset($error)){
                                foreach($error as $error)
                                echo '<h3>'.$error.'</h3>';
                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'headFoot/footer.php'?>