<!DOCTYPE html>
<html>
  <head>
    <?php include "xml.php" ?>
    <meta charset="UTF-8">
    <title><?php echo $xml->Hostname ?> - Batterie | Sonde</title>
    <link rel="shortcut icon" type="image/x-icon" href="/icon/favicon.ico"/>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }
      header {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #003366;
        color: #ffffff;
        height: 80px;
      }
      h1 {
        margin: 0;
        font-size: 36px;
      }
      img {
        height: 50px;
        margin-right: 10px;
      }
      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 50px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
      }
      .grid-item {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      }
      .grid-item i {
        font-size: 36px;
        margin-right: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Batterie | Sonde - Urbanbox</h1>
    </header>
      <?php             
      //Rafraîchissement tout les X secondes
      header("Refresh:10");
      ?>	
    <div class="container">
      <div class="grid">
        <div class="grid-item">
          <i class="fas fa-home"></i>
          <h2>Nom du site</h2>
          <p><?php echo $xml->Hostname ?></p>
        </div>
         <div class="grid-item">
          <i class="fas fa-sync"></i>
          <h2>Dernière actualisation</h2>
          <p><?php echo date('d/m/y à H:i:s'); ?></p>
        </div>       
        <div class="grid-item">
          <i class="fas fa-battery-full"></i>
          <h2>Tension de la batterie</h2>
          <p><?php echo $xml->AnalogInput1 ?></p>
        </div>
        <div class="grid-item">
          <i class="fas fa-thermometer-half"></i>
          <h2>Température de la batterie</h2>
          <p><?php echo $xml->Temperature1 ?></p>
        </div>
      </div>
    </div>
  </body>
</html>
