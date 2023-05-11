<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$email = $_POST['email'];
$password = $_POST['password'];

$isFound = false;

$data = [];

try{
  $sql = $conn->query('SELECT * FROM empresa');
    
  foreach($sql as $row){
    if($email == $row[2] && $password == $row[4]){          
    // print_r($row);
      $data[] = [
         "cnpj" => $row[0],
         "name" => $row[1],
         "email" => $row[2],
         "telefone" => $row[3]
];
            }
        $isFound = true;
        break;
        }

    } catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }

if($isFound == true){
  echo json_encode($data);
  http_response_code(302);
}else{
  http_response_code(404);
}

