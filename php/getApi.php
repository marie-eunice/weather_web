<?php

function getWeather($ville){
    $apiKey = "1f2ca7f16247ef82560b07b667b4fb19";
    
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$ville&units=metric&appid=$apiKey&lang=fr";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    return $resp = curl_exec($curl);

    curl_close($curl);
    var_dump($resp);
}

?>