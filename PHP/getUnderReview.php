<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$sql = $conn->query("SELECT * FROM USR_EMPRESA WHERE EMP_STATUS = 'EM ANALISE'");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>