<?php
for ($x = 10; $x<11; $x++)
{
    $apikey = file_get_contents('https://partners.api.skyscanner.net/apiservices/token/v2/gettoken?apiKey={apiKey}');
    $apikey = json_decode($apikey);

    echo $apikey;

    $quotes = file_get_contents(
        'https://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/US/USD/en-US/SFO-sky/JFK-sky/'
        . '2020-07-' . $x . '/?'
        . 'apiKey=' . $apikey);

    echo $quotes->Quotes->MinPrice;
    echo "<br>";
}

?>