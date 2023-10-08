<?php 
session_start();

require './../config.php';

if (!isset($_SESSION['user_id'])) {
    // L'utente non è autenticato, reindirizza alla pagina di login o gestisci l'accesso non autorizzato
    header("Location: /register-form-php/php/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Elimina l'account e reindirizza all'utente alla pagina di conferma o di registrazione
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        // Eliminazione riuscita, termina la sessione dell'utente e reindirizza
        session_destroy();
        header("Location: /register-form-php/php/register.php");
        exit();
    } else {
        // Errore durante l'eliminazione nel database, gestisci di conseguenza
        echo "Si è verificato un errore durante l'eliminazione dell'account.";
    }
}

?>