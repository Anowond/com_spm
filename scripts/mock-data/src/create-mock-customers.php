<?php

declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

// Définition des en-têtes du CSV
$headers = [
    'firstname',
    'lastname',
    'email',
    'company_name',
    'company_id',
    'company_address',
    'phone',
];
// Nombres d'entrées du CSV
$totalLines = 30;
// Chemin du CSV
$filePath = './data/customers.csv';

//  Initilisation de Faker
$faker = Faker\Factory::create('fr_FR');

// Tableau de génération des données
for ($line = 0; $line < $totalLines; $line++) {
    $firstName = $faker->firstName();
    $lastName = $faker->lastName();
    $email = $firstName . '.' . str_replace(" ", "-", $lastName) . '@mail.com';
    $data = array();
    $data[] =  $firstName;
    $data[] = $lastName;
    $data[] =  $email;
    $data[] = $faker->company();
    $data[] = $faker->siren();
    $data[] = $faker->address();
    $data[] = $faker->phoneNumber();
    $csv[$line] = $data;
}

// Création du fichier et écriture dans celui-ci
if (! file_exists(dirname($filePath))) {
    mkdir(dirname($filePath), 0755);
}

$file = fopen($filePath, "w");

foreach ($csv as $row) {
    fputcsv($file, $row);
}

fclose($file);
