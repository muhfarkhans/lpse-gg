<?php

namespace App\Lpsegg;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class ExtractSession
{
    function getSession()
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
            'datatables_session'   => $extractCookie,
            'datatables_token'  => substr($extractCookie, 47, 40),
        ];

        return $cookie;
    }
}