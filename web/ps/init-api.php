<?php

require_once 'Reports.php';

$config = [
    'apiUrl' => 'https://plagiarismsearch.com/api/v3',
    'apiUser' => 'zhan.liu@hevs.ch',
    'apiKey' => '7u77w52n24vbi5jkr3vrk4v-65979918',
];

$api = new Reports($config);

header("Content-type: application/json; charset=UTF-8");
