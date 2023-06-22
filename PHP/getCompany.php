<?php
require('config.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: *");

$userid = $_GET['user'];

$sql = $conn->query("SELECT * FROM USR_EMPRESA WHERE EMP_USR_ID = '$userid'");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
