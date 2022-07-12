<?php

namespace App\Lpsegg;

class LpseTable extends Lpse
{
    public static function getTable($params = [])
    {
        $session = new ExtractSession();
        $getSession = $session->getSession();

        $param = new LpseTableParams();
        $param->setCustomParams(
            array_merge($params, ['authenticityToken' => $getSession->datatables_token])
        );
        $params = $param->getParamsTable();

        $paramGet = "";
        foreach ($params as $key => $value) {
            $paramGet .= "&".$key."=".$value;
        }

        $url = Config::getBaseUrlDatatable() . $paramGet;

        return ApiRequestor::get(
            $url,
            $params,
            ['SPSE_SESSION' => $getSession->datatables_session]
        );
    }
}