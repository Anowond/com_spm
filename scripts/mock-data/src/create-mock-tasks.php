<?php

declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

$headers = [
    'title',
    'alias',
    'description',
    'state',
    'deadline',
];
$totalLines = 30;
$filePath = './data/tasks.csv';
$faker = Faker\Factory::create('fr_FR');

for ($line = 0; $line < $totalLines; $line++) {
    $title = $faker->unique()->sentence();
    $alias = strtolower(str_replace(" ", "-", $title));
    $data = array();
    $data[] = $title;
    $data[] = $alias;
    $data[] = $faker->text();
    $data[] = $faker->numberBetween(0, 1);
    $data[] = $faker->dateTimeBetween('-1 month')->format('Y/m/d');
    $csv[$line] = $data;
}

if (! file_exists(dirname($filePath))) {
    mkdir(dirname($filePath));
}
$file = fopen($filePath, "w");
foreach($csv as $row) {
    fputcsv($file, $row);
}
fclose($file);