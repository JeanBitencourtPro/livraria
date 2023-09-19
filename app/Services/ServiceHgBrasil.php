<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class ServiceHgBrasil
{
    public function consultaClima()
    {
        $url = "?woeid=455823"; // woeid de Porto Alegre.
        $metodo = 'GET';
        $response = $this->callHgBrasil($url, $metodo);
        
        return $response['results'] ?? [];
    }

    private function callHgBrasil($url, $metodo)
    {
        try {
            $params = [];
            $params['headers'] = [
                'accept' => 'application/json',
                'content-type' => 'application/json'
            ];

            $url = env('HGBRASIL_URL') . $url;

            $client = new Client();
            $response = $client->request($metodo, $url, $params);

            return json_decode($response->getBody()->getContents(), true);

        } catch (Exception $e) {
            return 'Não foi posssível consultar na HgBrasil. Erro: ' . $e->getMessage();
        }
    }
}