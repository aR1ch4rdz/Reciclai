<?php

include 'auth.php';
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cnpj = $_POST['cnpj'];
$cep = $_POST['cep'];
$password = $_POST['password'];

### Falta validar o CEP

$originalFile = fopen(DATA_SRC, 'r');
$temp = tempnam('.', '');
$tempFile = fopen($temp, 'w');

while (($row = fgetcsv($originalFile)) !== false) {
    if ($row[0] != $email) {
        fputcsv($tempFile, $row);
    } else {
        fputcsv($tempFile, [$email, $name, $phone, $password, $cnpj, $cep]);
    }
}

fclose($originalFile);
fclose($tempFile);

rename($temp, DATA_SRC);
http_response_code(302);