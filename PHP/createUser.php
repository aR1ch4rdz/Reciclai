<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$name = $_POST['name'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$fp = fopen(DATA_SRC, 'r');

while (($line = fgetcsv($fp)) !== false) {
    if ($email == $line[1]) {
        http_response_code(302);
        exit();
    }
}

$fp = fopen(DATA_SRC, 'a');

fputcsv($fp, [$name, $email, $cnpj,$phone, $password]);
fclose($fp);

http_response_code(200);