<!DOCTYPE html>
<html>
    <head>
        <?php include "xml.php" ?>
        <title><?php echo $xml->Hostname ?> - Graphique</title>
        <link rel="shortcut icon" type="image/x-icon" href="/icon/favicon.ico"/>
        <script src= "js/Chart.js"></script>
        <script src="js/chartjs-plugin-datalabels.min.js"></script>
    </head>
    <body>
        <?php
    
            // Établir une connexion à la base de données
            $host = "localhost";
            $user = "**";
            $password = "**";
            $dbname = "**";
            $conn = mysqli_connect($host, $user, $password, $dbname);

            // Vérifier si la connexion a réussi
            if (!$conn) {
                die("Connexion échouée: " . mysqli_connect_error());
            }   

            // Récupérer les données de la table "valeurs"
            $sql = "SELECT datetime, tension, temperature FROM valeurs";
            $result = mysqli_query($conn, $sql);

            // Stocker les valeurs de chaque colonne dans des tableaux distincts
            $datetimes = array();
            $tensions = array();
            $temperatures = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $datetimes[] = $row['datetime'];
                $tensions[] = floatval($row['tension']);
                $temperatures[] = floatval($row['temperature']);
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn);

	    //Fermer la connexion à la base de données
            header("refresh:1800");

            // Afficher le graphique si des données ont été récupérées
            if (!empty($datetimes) && !empty($tensions) && !empty($temperatures)) {
                echo '<canvas id="myChart" width="300" height="140"></canvas>
                <script>
                    var ctx = document.getElementById("myChart").getContext("2d");
                    var chart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: '.json_encode($datetimes).',
                            datasets: [{
                                label: "Tension (V)",
                                data: '.json_encode($tensions).',
                                borderColor: "rgb(234, 94, 14)",
                                tension: 0.1,
                                fill: false,
                                datalabels: {
                                    backgroundColor: "rgba(255, 99, 132, 0.7)",
                                    borderRadius: 4,
                                    color: "white",
                                    font: {
                                        weight: "bold"
                                    },
                                    formatter: function(value, context) {
                                        return context.chart.data.labels[context.dataIndex] + ": " + value;
                                    }
                                },
                                yAxisID: "y-axis-0"
                            }, {
                                label: "Température (°C)",
                                data: '.json_encode($temperatures).',
                                borderColor: "rgb(79, 79, 79)",
                                tension: 0.1,
                                fill: false,
                                datalabels: {
                                    backgroundColor: "rgba(54, 162, 235, 0.7)",
                                    borderRadius: 4,
                                    color: "white",
                                    font: {
                                        weight: "bold"
                                    },
                                    formatter: function(value, context) {
                                        return context.chart.data.labels[context.dataIndex] + ": " + value;
                                    }
                                },
                                yAxisID: "y-axis-1"
                            }]
                        },
                        options: {
                            plugins: {
                                datalabels: {
                                    display: true
                                }
                            },
                            scales: {
                                yAxes: [{
                                    id: "y-axis-0",
                                    position: "left",
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Tension"
                                    }
                                }, {
                                    id: "y-axis-1",
                                    position: "right",
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Température"
                                    }
                                }]
                            }
                        }
                    });
                </script>';
            }
        ?>
    </body>
</html>
