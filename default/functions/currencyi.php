<?php
    $api_url = "http://www.apilayer.net/api/live?access_key=0d7afa6aa1fe8624e795b2472fcf4bd8";
    $money = json_decode(file_get_contents($api_url));

    $inr = $money->quotes->USDINR;

    echo $inr;
?>