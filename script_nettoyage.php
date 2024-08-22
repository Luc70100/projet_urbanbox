<?php
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=localhost;dbname=**", "utilisateur bdd", "mdp bdd");

    // Suppression des données
    $stmt = $pdo->prepare('DELETE FROM `valeurs` WHERE `datetime` < DATE_SUB(NOW(), INTERVAL 14 DAY)');
    $stmt->execute();
?>
