<?php

declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

$headers = [
    'name',
    'alias',
    'description',
    'deadline',
];
$totalLines = 30;
$filePath = './data/projects.csv';
$faker = Faker\Factory::create('fr_FR');

for ($line = 0; $line <= $totalLines; $line++) {
    $name = $faker->unique()->sentence();
    $alias = strtolower(str_replace(" ", "-", $name));
    $data = array();
    $data[] = $name;
    $data[] = $alias;
    $data[] = $faker->text();
    $data[] = $faker->dateTimeBetween('-1 month')->format('Y-m-d');
    $csv[$line] = $data;
}

if (! file_exists(dirname($filePath))) {
    mkdir(dirname($filePath));
}
$file = fopen($filePath, "w");
foreach ($csv as $row) {
    fputcsv($file, $row);
}
