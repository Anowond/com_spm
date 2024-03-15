<?php declare(strict_types=1);

require_once (__DIR__.'/../vendor/autoload.php');

$headers = [
    'items',
    'number',
    'amount',
];
$totalLines = 30;
$filePath = './data/invoices.csv';
$faker = Faker\Factory::create('fr_FR');

for ($line = 0; $line < $totalLines; $line++) {
    $data = array();
    $data[] = $faker->sentence();
    $data[] = $faker->unique()->randomNumber();
    $data[] = $faker->randomFloat(2,10,9999);
    $csv[$line] = $data;
}

if (!file_exists(dirname($filePath))) {
    mkdir(dirname($filePath), 0755);
}
$file = fopen($filePath, "w");
foreach ($csv as $row) {
    fputcsv($file,$row);
}