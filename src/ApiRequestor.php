<?php

namespace App\Lpsegg;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class ApiRequestor
{
    
    public static function get($url, $needs = false, $params = []) 
    {
        return self::remoteCall($url, $needs, $params, 'GET');
    }

    public static function remoteCall($url, $needs = false, $params = [], $method = 'GET')
    {
        $extractCookie = self::extractToken();
        $defaultCookie = [
            'SPSE_SESSION' => $extractCookie->session,
        ];

        if ($needs == 'table') {
            $condition = "";
            foreach ($params as $key => $value) {
                $condition .= "&".$key."=".$value;
            }

            $url = $url.'authenticityToken='.$extractCookie->datatables_token.$condition;
        }

        $cookie = array_merge($defaultCookie, []);
        $cookieJar = CookieJar::fromArray($cookie, Config::getBaseHostname());

        $client = new Client([
            'verify' => false,
            'cookies' => $cookieJar,
        ]);
    
        $res = $client->request($method, $url);
        $contents = (string) $res->getBody();

        header('Content-type: application/json');
        echo $contents;
    }

    public static function extractToken()
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
            'cookies' => true,
        ]);

        $client->request('GET', Config::getBaseUrl());

        $cookieJar = $client->getConfig('cookies');
        $arr = $cookieJar->toArray();
        $extractCookie = $arr[1]['Value'];
        $cookie = (object) [
            'session'   => $extractCookie,
            'datatables_token'  => substr($extractCookie, 47, 40),
        ];

        return $cookie;
    }
}