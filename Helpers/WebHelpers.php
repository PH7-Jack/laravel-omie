<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WebHelpers
{
    public static function getUrlResponse($url)
    {
        try {
            $client = new Client();
            $response = $client->get($url, ['http_errors' => false]);
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } catch (RequestException $ex) {
            return $ex->getMessage();
        }
    }
}
