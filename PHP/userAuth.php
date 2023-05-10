<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$fp = fopen(DATA_SRC, 'r');
$data = null;

$isFound = false;

$email = $_POST['email'];
$password = $_POST['password'];

while (($row = fgetcsv($fp)) !== false) {
    if ($email == $row[1] && $password == $row[4]) {
        $data = [
            'nome' => $row[0],
            'email' => $row[1],
            'cnpj' => $row[2],
            'telefone' => $row[3],
        ];
        $isFound = true;
        break;
    }
}

if($isFound == true){
    echo json_encode($data);
    http_response_code(302);
}else{
    http_response_code(404);
}

