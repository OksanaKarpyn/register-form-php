<?php 
include 'headFoot/header.php';
// session_start();
var_dump($_SESSION);
$avatar_path = '../image/';


$avatar = isset($_SESSION['img']) ? $_SESSION['img'] :'https://picsum.photos/400/400' ;
$nomeUtente = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$cognomeUtente = isset($_SESSION['surname']) ? $_SESSION['surname'] : '';
if (!isset($_SESSION['user_id'])) {
 
    // L'utente non è autenticato, reindirizza alla pagina di login o gestisci l'accesso non autorizzato
    header("Location: /register-form-php/php/login.php");
    exit();
}else{
  $_SESSION['name'] = $nomeUtente;
  $_SESSION['surname'] = $cognomeUtente;
  $_SESSION['img'] = $avatar;
  session_regenerate_id(true);
}

?>
<?php


?>
<div class="wrapper">
    <!-- <a href="logout.php">logout</a> -->
    <div class="container w-50">
        <div class="row">
            <div class="img-block">
                <img src="./assets/img/89e31fb982e6d87f239196db2b3e9ccc copy 1.png" alt="">
            </div>
            <div class="info-user">


                <!-- <h5 class="card-title">Benvenuto, <?php echo $nomeUtente . ' ' . $cognomeUtente; ?>!</h5> -->

                <!-- <p>this is your account</p>
                <a href="#">update your information</a> -->
            </div>
            <div class="card  d-flex justify-content-center  align-items-center" style="width: 26rem;">
                <div class=" rounded-circle w-75 p-2 ">
                    <!-- <img src="./image/desktop.png" alt="foto"> -->
                    <img src="<?php echo $avatar; ?>" class="card-img-top rounded-circle" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Benvenuto, <?php echo $nomeUtente . ' ' . $cognomeUtente; ?>!</h5>

                    <p class="card-text">this is yuor account</p>
                    <a href="updateProfile.php" class="btn btn-primary">update your information</a>
                    <a href="logout.php" class="btn btn-secondary">logout</a>

                    <p class="d-inline-flex gap-1 mt-2">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                            aria-expanded="false" aria-controls="multiCollapseExample1">Elimina Account</a>
                    </p>
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">

                                <form action="infoDatiForm/infoDeleteAccount.php" method="post">
                                    <label for="">Sei sicuro di voler eliminare account?</label>
                                    <input type="submit" class="btn btn-danger" id="delete" name="confirm_delete"
                                        value="Delete Account">
                                    <a href="profile.php" class="btn btn-secondary">Annulla</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="#" class="btn btn-danger">Delete Account</a> -->



                </div>
            </div>

        </div>
    </div>
</div>
<script>

</script>
<?php include 'headFoot/footer.php'?>