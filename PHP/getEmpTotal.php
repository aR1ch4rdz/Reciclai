<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$sql = $conn->query("SELECT COUNT(*) AS QTDE_EMPRESA FROM USR_EMPRESA;");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>