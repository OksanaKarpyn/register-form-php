<?php
 require './../config.php';
 
// Recupero i dati dal form
$nameF = $_POST['name'];
$surnameF = $_POST['surname'];
$emailF = $_POST['email'];
$passwordF = password_hash($_POST['password'], PASSWORD_DEFAULT);
// $imgF = $_POST['img'];

// Controlla se l'utente esiste già nel database
$sql_check = "SELECT COUNT(*) FROM users WHERE email = :email";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->bindParam(':email', $emailF, PDO::PARAM_STR);
$stmt_check->execute();
$count = $stmt_check->fetchColumn();
if ($count > 0) {
    // L'utente esiste già nel database, mostra un messaggio personalizzato
    echo "Questo indirizzo email è già registrato.";
    
    
} else {
    // L'utente non esiste nel database, procedi con l'inserimento
    $sql = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $nameF, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surnameF, PDO::PARAM_STR);
    $stmt->bindParam(':email', $emailF, PDO::PARAM_STR);
    $stmt->bindParam(':password', $passwordF, PDO::PARAM_STR);
    // $stmt->bindParam(':ing', $imgF, PDO::PARAM_STR);


    // Esegui l'inserimento nel database
    if ($stmt->execute()) {
        // L'inserimento è avvenuto con successo, ora esegui l'autenticazione
        // Verifica l'utente nel database utilizzando email e password
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $emailF, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            // L'utente è autenticato con successo, puoi reindirizzarlo alla pagina del profilo
            header("Location: /register-form-php/php/profile.php");
            exit(); // Assicurati di terminare l'esecuzione dello script dopo il reindirizzamento
        } else {
            // L'utente non è stato autenticato con successo, gestisci l'errore o reindirizza a una pagina di errore
            echo "Autenticazione fallita. Credenziali non valide.";
        }
    } else {
        // Gestisci l'errore dell'inserimento nel database
        echo "Errore durante la registrazione.";
    }
}




?>