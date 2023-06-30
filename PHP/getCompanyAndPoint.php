<?php 
require 'config.php';
header("Access-Control-Allow-Origin: *");

$pointID = $_GET['pointID'];
$companyID = $_GET['companyID'];

$sql = $conn->query("SELECT PDC_ID, EMP_NOME, EMP_CNPJ, EMP_STATUS, EMP_LATITUDE, EMP_LONGITUDE, PDC_STATUS  FROM EMP_PONTO_DE_COLETA, USR_EMPRESA WHERE PDC_ID = '$pointID' AND PDC_EMP_ID = '$companyID' AND EMP_ID = '$companyID'");

$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>