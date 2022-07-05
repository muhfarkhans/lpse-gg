<?php

namespace App\Lpsegg;

use Exception;

class Config
{
    const BASE_URL = 'https://lpse.lkpp.go.id/eproc4/lelang';
    const BASE_URL_DATATABLE = 'https://lpse.lkpp.go.id/eproc4/dt/lelang?draw=0&';
    const BASE_HOSTNAME = 'lpse.lkpp.go.id';

    public static function getBaseUrl()
    {
        return Config::BASE_URL;
    }

    public static function getBaseUrlDatatable()
    {
        return Config::BASE_URL_DATATABLE;
    }

    public static function getBaseHostname()
    {
        return Config::BASE_HOSTNAME;
    }
}