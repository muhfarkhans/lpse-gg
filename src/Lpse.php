<?php

namespace App\Lpsegg;

class Lpse implements Response
{
    public function getJson($source)
    {
        header('Content-type: application/json');
        return json_encode($source);
    }

    public function getArray($source)
    {
        $array = (array) $source;
        return $array;
    }
}