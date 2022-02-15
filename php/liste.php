<?php

require_once 'getApi.php';
require_once 'control.php';

if(isset($_GET['ville']) && !empty($_GET['ville'])){
    $ville = control($_GET['ville']);

    $resp = json_decode(getWeather($ville));
    
    // echo "<pre>";
    // die(print_r($resp));
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste des villes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<div class="container" >    
        <div class="header">
            <section class="cities">
                <ul>
                    <li><a href="liste.php?ville=Abidjan">Abidjan</a></li>
                    <li><a href="liste.php?ville=Paris">Paris</a></li>
                </ul>
            </section>
            <section class="selected-city">
                <?php if(isset($ville) && !empty($ville)): ?>
                    <h1><?= $ville ?></h1>
                    <h3><?= $resp->sys->country ?></h3>
                <?php endif; ?>
            </section>
        </div>
        <div class="temperature">
            
            <?php if(isset($ville) && !empty($ville)): ?>
                <div class="item">
                     <div><img  src="http://openweathermap.org/img/w/<?php echo $resp->weather[0]->icon; ?>.png" class="medium-icon" alt=""></div> 
                    <div class="label"><h2><i><?= $resp->weather[0]->description ?></i></h2></div>
                </div>
                <div class="item ">
                    <div class="label-b left"><b class="temp"><?= $resp->main->temp ?>°C</b> - Température Actuelle</div>
                </div>
                <div class="item">
                    <div class="item-one">
                        <div><img src="../images/wind.png" class="small-icon" alt=""></div>
                        <div class="label">Vitesse du vent</div>
                    </div>
                    <div class="label-b temp"><b><?= $resp->wind->speed ?> Km/h</b></div>
                </div>
                <div class="item">
                    <div class="item-one">
                        <div><img src="../images/freezing.png" class="small-icon" alt=""></div>
                        <div class="label">Humidité</div>
                    </div>
                    <div class="label-b temp"><b><?= $resp->main->humidity ?> %</b></div>
                </div>
                <!-- <div class="item">
                    <div class="item-one">
                        <div><img src="../images/sun.png" class="small-icon" alt=""></div>
                        <div class="label">CO2</div>
                    </div>
                    <div class="label-b temp"><b><?= $resp->wind->speed ?> Km/h</b></div>
                </div> -->
                
            <?php else: ?>
                <h2>Choisissez une ville dans la liste ci-dessus</h2>
            <?php endif; ?>
        </div>
            
    </div>
    
</body>
</html>