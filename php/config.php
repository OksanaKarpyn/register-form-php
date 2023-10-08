<?php
// // // Informazioni di connessione al database
// $hostname = "localhost"; // Il nome del server del database
// $username = "root"; // Il nome utente del database
// $password = "root"; // La password del database
// $database = "db_user"; // Il nome del database
// $port = 8889;

// try {
//     // Crea una connessione PDO
//     $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database",$username,$password);

//     // Imposta l'attributo per il report degli errori
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Esegui le query o le operazioni sul database qui...

// } catch (PDOException $e) {
//     // Gestisci gli errori di connessione al database
//     echo "Errore di connessione al database: " . $e->getMessage();
// }

// // $conn = mysqul_connect( '$hostname ','$username','$password','$port');

?>
<?php
// Informazioni di connessione al database
$hostname = "localhost"; // Il nome del server del database
$username = "root"; // Il nome utente del database
$password = "root"; // La password del database
$database = "db_user"; // Il nome del database
$port = 8889;

try {
    // Crea una connessione PDO
    $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database",$username,$password);

    // Imposta l'attributo per il report degli errori
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Esegui le query o le operazioni sul database qui...

} catch (PDOException $e) {
    // Gestisci gli errori di connessione al database
    echo "Errore di connessione al database: " . $e->getMessage();
}
?>