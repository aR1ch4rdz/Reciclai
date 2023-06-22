<?php
require('config.php');
header("Access-Control-Allow-Origin: *");

$companyID = $_POST['companyID'];
$userID = $_POST['userID'];
$novoStatus = "ATIVA";

try {

  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // // Iniciar a transação
  // $conn->beginTransaction();

  $stmt = $conn->prepare("UPDATE USR_EMPRESA SET EMP_STATUS = :novoStatus WHERE EMP_ID = :empresaID");
  $stmt->bindParam(':novoStatus', $novoStatus);
  $stmt->bindParam(':empresaID', $companyID);
  $stmt->execute();

  $novoTipo = "EMPRESA";
  $stmt2 = $conn->prepare("UPDATE APP_USUARIO SET USR_TYPE = :novoTipo WHERE USR_ID = :userID");
  $stmt2->bindParam(':novoTipo', $novoTipo);
  $stmt2->bindParam(':userID', $userID);
  $stmt2->execute();

  $rowCount = $stmt->rowCount();

  if ($rowCount > 0) {
    $response = array('success' => true, 'message' => 'Empresa Aprovada');
    echo json_encode($response);
  } else {
    $response = array('success' => false, 'message' => 'Erro ao Aprovar Empresa.');
    echo json_encode($response);
  }
} catch (PDOException $e) {
  $response = array('success' => false, 'message' => 'Erro ao Aprovar Empresa: ' . $e->getMessage());
  echo json_encode($response);
}
