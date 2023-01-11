<?php
namespace Yeraldi29\parallelDolar;
require '../vendor/autoload.php';

use GuzzleHttp\Client;
// https://api.exchangedyn.com/markets/quotes/usdves/dolartoday
// https://api.exchangedyn.com/markets/quotes/usdves/bcv
$client = new Client(['base_uri' => 'https://api.exchangedyn.com/markets/quotes/usdves/']);

$response = $client->request('GET','bcv');
$json = $response->getBody()->getContents();

echo $json;