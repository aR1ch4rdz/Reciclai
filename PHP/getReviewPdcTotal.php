<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$sql = $conn->query("SELECT COUNT(*) AS TOTAL FROM EMP_PONTO_DE_COLETA WHERE PDC_STATUS = 'EM ANALISE';");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>