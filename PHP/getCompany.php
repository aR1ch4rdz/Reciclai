<?php
require('config.php');
header("Access-Control-Allow-Origin: *");
$usrID = $_POST['usrID'];

$sql = $conn->query("SELECT * FROM USR_EMPRESA WHERE USR_EMP_ID = '$usrID'");
$data = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>