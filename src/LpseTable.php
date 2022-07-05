<?php

namespace App\Lpsegg;

class LpseTable
{
    public static function getTable($params = [])
    {
        $paramsTable = TableParams::getParamsTable($params);
        return ApiRequestor::get(Config::getBaseUrlDatatable(), 'table', $paramsTable);
    }
}