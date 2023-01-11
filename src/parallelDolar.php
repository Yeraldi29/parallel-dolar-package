<?php
namespace Yeraldi29\parallelDolar;
require '../vendor/autoload.php';

use GuzzleHttp\Client;

class ParallelDolar{
    public function __construct($option){
        $this->client = new Client(['base_uri' => 'https://api.exchangedyn.com/markets/quotes/usdves/']);
        $this->option = $option;
    }
    
    public function getDataJSON(){
       return $this->queryApi('json');
    }

    public function getDataValues(){
        return $this->queryApi('getValues');
    }
    
    private function queryApi($option){
        if($this->option === 'bcv' || $this->option === 'dolartoday'){
            $response = $this->client->request('GET',$this->option);
            $json = $response->getBody()->getContents();

            if($option === 'json'){
                return $json;
            }
            if($option === 'getValues'){
                return json_decode($json);
            }
        }

        return;
    }
}