<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$sql = $conn->query("SELECT COUNT(*) AS TOTAL FROM EMP_PONTO_DE_COLETA ;");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>