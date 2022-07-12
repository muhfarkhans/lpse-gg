<?php

namespace App\Lpsegg;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class ApiRequestor
{
    
    public static function get($url, $params = [], $session = false) 
    {
        return self::remoteCall($url, 'GET', $params, $session);
    }

    public static function remoteCall($url, $method = 'GET', $params = [], $session = false)
    {
        $cookie = array_merge($session, []);
        $cookieJar = CookieJar::fromArray($cookie, Config::getBaseHostname());

        $client = new Client([
            'verify' => false,
            'cookies' => $cookieJar,
        ]);
    
        $res = $client->request($method, $url);
        $contents = (string) $res->getBody();

        return json_decode($contents); 
    }
}