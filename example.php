<?php
require __DIR__.'/vendor/autoload.php';

use App\Lpsegg\LpseTable;

$lp = new LpseTable();

$params = [
    // 'kategoriId' => 2
    // 'rekanan'
    // 'tahun'
    // 'instansiId'
    // 'search[value]'
    // 'start'  => 0, 
    // 'length' => 20, // moderate if start filled
];

$data = $lp->getTable($params);
$json = $lp->getArray($data);

print_r($json);


// echo $lp->getPengumuman();