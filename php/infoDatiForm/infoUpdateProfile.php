<?php 




?>


<?php
session_start();
require './../config.php';

if (!isset($_SESSION['id'])) {
    // L'utente non è autenticato, reindirizza alla pagina di login o gestisci l'accesso non autorizzato
    header("Location: /register-form-php/php/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dati inviati tramite il form di aggiornamento
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $update_pass = $_POST['update_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Verifica se la vecchia password è corretta
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (empty($new_pass) || password_verify($update_pass, $user['password'])) {
            // La vecchia password è corretta o non è necessaria, puoi procedere con l'aggiornamento

            // Verifica se è stata caricata una nuova immagine
            if ($_FILES['avatar']['error'] === 0) {
                $avatar_path = '../image/' . $_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path);
            } else {
                // Nessuna nuova immagine caricata, mantieni quella esistente
                $avatar_path = $user['img'];
            }

            // Aggiorna i dati dell'utente nel database
            $sql = "UPDATE users SET name = :name, surname = :surname, email = :email, img= :img WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':img', $avatar_path, PDO::PARAM_STR);
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                $_SESSION['img'] = $avatar_path;
                // Aggiornamento riuscito, puoi reindirizzare l'utente alla pagina del profilo
                header("Location: /register-form-php/php/profile.php");
                exit();
            } else {
                // Errore durante l'aggiornamento nel database, gestisci di conseguenza
                echo "Si è verificato un errore durante l'aggiornamento dei dati.";
            }
        } else {
            // Vecchia password non corretta, gestisci di conseguenza
            echo "La vecchia password non è corretta.";
        }
    } else {
        // Utente non trovato, gestisci di conseguenza
        echo "Utente non trovato.";
    }
}
?>