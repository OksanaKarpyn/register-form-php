<?php 
session_start();
  require './../config.php';
// dati da form login
$emailF = strtolower($_POST['email']);
 $passwordF = $_POST['password'];
 
 $sql = "SELECT * FROM users WHERE  LOWER(email) = :email ";
 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':email', $emailF, PDO::PARAM_STR);
 $stmt->execute();
 $user = $stmt->fetch(PDO::FETCH_ASSOC);


 if ($user) {
    $userId = $user['id'];
    $userAvatar = $user['img'];
    $userName = $user['name'];
    $userSurname = $user['surname']; // Aggiungi questa riga
    $userEmail = $user['email'];
    $userPassword = $user['password'];

    $_SESSION['id'] =  $userId;
    $_SESSION['img'] = $userAvatar;
    $_SESSION['name'] = $userName;
    $_SESSION['surname'] = $userSurname;
    $_SESSION['email'] = $userEmail;
    $_SESSION['password'] = $userPassword;
 

    if (password_verify($passwordF, $user['password'])) {
        // La password è corretta
        // echo "Password corretta. L'utente è autenticato.";
      
        //  session_start();
        $_SESSION['user_id']=$user['id'];
        header("Location: /register-form-php/php/profile.php");
        exit();
        
    } else {
        // La password non corrisponde
       echo "La password  non è corretta.";
       header("Location: /register-form-php/php/login.php");
       $message = array();
       $message[] = 'La password  o email 
       non è corretta.';
       
       $_SESSION['message'] = $message;
      
       exit();
    }
} else {
  
    $_SESSION['message'][] = 'Nessun utente trovato con questa email.';
    header("Location: /register-form-php/php/login.php");
    exit();
    
}

?>