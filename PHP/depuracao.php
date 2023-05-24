<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$sql = $conn->query('SELECT * FROM EMP_PONTO_DE_COLETA');
$data = $sql->fetchAll(PDO::FETCH_ASSOC);
if(count($data) == 0){
    echo json_encode(["erro" => "User Not Found"]);
}else{
    echo json_encode($data);
    
}
?>
