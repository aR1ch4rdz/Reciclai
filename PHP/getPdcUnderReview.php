<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$sql = $conn->query("SELECT * FROM EMP_PONTO_DE_COLETA, USR_EMPRESA WHERE PDC_STATUS = 'EM ANALISE' AND PDC_EMP_ID = EMP_ID");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>