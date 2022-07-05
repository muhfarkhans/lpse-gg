<?php
require __DIR__.'/vendor/autoload.php';

use Muhfarkhans\Lpsegg\LpseTable;

$lp = new LpseTable();

$params = [
    // 'kategoriId' => 2
    // 'rekanan'
    // 'tahun'
    // 'instansiId'
    // 'search[value]'
    'start'  => 0,
    'length' => 20
];

echo $lp->getTable($params);

// echo $lp->getPengumuman();