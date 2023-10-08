<?php 
include 'headFoot/header.php';
include 'config.php';
var_dump($_SESSION);

$user_Id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$avatar = isset($_SESSION['img']) ? $_SESSION['img'] :'https://picsum.photos/400/400' ;
$nomeUtente = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$cognomeUtente = isset($_SESSION['surname']) ? $_SESSION['surname'] : '';
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$userPassword = isset($_SESSION['password']) ? $_SESSION['password'] : '';



?>


<?php


?>
<div class="wrapper">
    <a href="./indexlogin.html">login</a>
    <div class="container w-50">
        <div class="row">
            <div class="img-block w-50">
                <img src="./assets/img/89e31fb982e6d87f239196db2b3e9ccc copy 1.png" alt="" class="w-100">
            </div>
            <div class="register-block">
                <div class="form">

                    <h1>Update Now</h1>
                    <div class=" rounded-circle w-25 p-2 ">
                        <img src="<?php echo $avatar; ?>" class="card-img-top rounded-circle w-100" alt="...">
                    </div>
                    <form action="infoDatiForm/infoUpdateProfile.php" method="POST" id="updateForm"
                        enctype="multipart/form-data">
                        <div class=" div d-flex ">

                            <div class="me-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" placeholder="Your name" id="name" name="name" required
                                    class="form-control" value="<?php echo $nomeUtente ?>">
                            </div>
                            <div class="ms-3">
                                <label for="surname" class="form-label">Last Name</label>
                                <input type="text" placeholder="Your last name" id="surname" name="surname"
                                    class="form-control" required value="<?php echo $cognomeUtente ?>">
                            </div>
                        </div>

                        <div class="div">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" placeholder="Your email" id="email" name="email" class="form-control"
                                required value="<?php echo $userEmail ?>">
                        </div>

                        <div class="div d-flex">

                            <div class="me-2 inputPswBox">

                                <input type="hidden" placeholder="Your password" id="old_password" name="password"
                                    class="form-control" class="form-control" required
                                    value="<?php echo $userPassword ?>">

                                <label for="password" class="form-label"> Old Password</label>
                                <input type="password" name="update_pass" placeholder="enter previos password"
                                    class="form-control">
                            </div>
                            <div class="mx-1">
                                <label for="password" class="form-label"> New Password</label>
                                <input type="password" name="new_pass" placeholder="enter new password"
                                    class="form-control">
                            </div>
                            <div class="ms-2">
                                <label for="password" class="form-label"> Confirm Password</label>
                                <input type="password" name="confirm_pass" placeholder="confirm new password"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="div">
                            <label for="avatar" class="form-label">Add Avatar</label>
                            <input type="file" placeholder="choise file" id="avatar" name="avatar"
                                accept="image/jpg, image/ipeg, image/png" class="form-control"
                                value="<?php echo $avatar ?>">
                        </div>
                        <div class=" div d-flex justify-content-between">
                            <input type="submit" value="update profile" name="update_profile"
                                class="btn-register btn btn-outline-light ">

                            <div class="div">
                                <a class="btn-register btn btn-outline-light" href="profile.php">Back</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'headFoot/footer.php'?>