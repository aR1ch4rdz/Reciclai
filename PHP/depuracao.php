<?php 
    include 'config.php';
    header("Access-Control-Allow-Origin: *");

    $data = [];
    try{
        $sql = $conn->query('SELECT * FROM empresa');
    
        foreach($sql as $row){
           // print_r($row);
          $data[] = [
             "cnpj" => $row[0],
             "name" => $row[1],
             "email" => $row[2],
             "telefone" => $row[3]
            ];
        }

    } catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }

    echo json_encode($data);
?>