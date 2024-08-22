<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $pdo = new PDO("mysql:host=localhost;dbname=**", "utilisateur bdd", "mdp bdd");
            
            $xml_url = "http://ip-routeur/status.xml?a=admin:Zx23-Zx81";
            $xml = simplexml_load_file($xml_url);
            
            // Récupération des données du fichier XML
            $hostname = (string) $xml->Hostname;
            $analogInput1 = (string) $xml->AnalogInput1;
            $temperature1 = (string) $xml->Temperature1;
            
            // Préparation et exécution de la requête SQL
            $stmt = $pdo->prepare('INSERT INTO valeurs (hostname, tension, temperature, datetime) VALUES (?, ?, ?, current_timestamp())');
            $stmt->execute([$hostname, $analogInput1, $temperature1]);

            // Fermeture de la connexion à la base de données
            $pdo = null;
        ?>
    </body>
</html>
