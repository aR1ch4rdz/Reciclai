<?php 
include 'config.php';
header("Access-Control-Allow-Origin: *");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM EMP_PONTO_DE_COLETA WHERE PDC_EMP_ID = :ID ");
$stmt->bindParam(':ID',$id);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>