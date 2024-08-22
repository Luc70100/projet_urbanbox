<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "**";
$password = "**";
$dbname = "**";

// Création de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
echo "Connexion réussie";
?>
