<?php

namespace App\Lpsegg;

interface Response {
    public function getJson($source);
    public function getArray($source);
}