# lpse-gg

a tool for scraping datatables data from lpse website indonesia gov.

## Requirements

* PHP 7.4 or greater

## Installation

```bash
composer require muhfarkhans/lpsegg
```

## Usage

Lpse-gg is available on Packagist (using semantic versioning), and installation via composer is the recommended way to install thic package. 
Just add this line to your composer.json file:

```json
"muhfarkhans/lpsegg": "^1.1"
```

or run 

```bash
composer require muhfarkhans/lpsegg
```

after installation you can import class LpseTable to your controller or php file

```php
use App\Lpsegg\LpseTable;
$lp = new LpseTable();
```

Step 1: you need create params for get data table. uou can use this [link] to see what do you need

[link]: https://lpse.lkpp.go.id/eproc4/lelang

```php
$params = [
    // 'kategoriId' => 2,
    // 'rekanan' => "", 
    // 'tahun' => "",
    // 'instansiId' => "",
    // 'search[value]' => "",
    // 'start'  => 0, 
    // 'length' => 20, // moderate if start filled
];

$data = $lp->getTable($params);
```


