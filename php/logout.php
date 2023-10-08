<?php
session_start();
session_destroy(); // Distruggi la sessione

header("location: /register-form-php/php/login.php")
?>