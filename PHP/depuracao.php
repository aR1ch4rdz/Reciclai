<?php 
    header("Access-Control-Allow-Origin: *");

    $fp = fopen('empresa.csv','r');

    $data = [];
    
    while(($row = fgetcsv($fp)) !== false){
        $data[] = [
            "name" => $row[0],
            "email" => $row[1],
            "cnpj" => $row[2],
            "telefone" => $row[3],
        ];
    }

    echo json_encode($data);
?>