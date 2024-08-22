<!DOCTYPE html>
<html>
<head>
	<?php include "xml.php" ?>
	<meta charset="UTF-8">
	<title><?php echo $xml->Hostname ?> - Monitoring</title>
	<link rel="shortcut icon" type="image/x-icon" href="/icon/favicon.ico">
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 50px;
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		h1 {
			font-size: 36px;
			text-align: center;
			margin-bottom: 30px;
			color: #003366;
			text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
		}
		
		ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
			text-align: center;
		}
		
		li {
			margin-bottom: 20px;
		}
		
		a {
			display: block;
			padding: 15px;
			font-size: 20px;
			color: #ffffff;
			background-color: #003366;
			border-radius: 5px;
			text-decoration: none;
			transition: all 0.3s ease;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		}
		
		a:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Urbanbox Monitor: <?php echo $xml->Hostname ?></h1>
		<ul>
			<li><a href="batterie_sonde.php">Batterie | Sonde de température</a></li>
			<li><a href="relais.php">Information relais</a></li>			
			<li><a href="graphique.php">Suivi graphique</a></li>
		</ul>
	</div>
</body>
</html>
