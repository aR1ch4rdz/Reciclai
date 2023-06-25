<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$pontoID = $_POST['pontoID'];
$newStat = 'ATIVO';

try {
  $stmt = $conn->prepare("UPDATE EMP_PONTO_DE_COLETA SET PDC_STATUS = :novoStatus WHERE PDC_ID = :pontoID");

  $stmt->bindParam(':novoStatus', $newStat);
  $stmt->bindParam(':pontoID', $pontoID);
  $stmt->execute();

  $rowCount = $stmt->rowCount();

  if ($rowCount > 0) {
    $response = array('success' => true, 'message' => 'Ponto de coleta aprovado');
    echo json_encode($response);
  } else {
    $response = array('success' => false, 'message' => 'Erro ao aprovar ponto de coleta.');
    echo json_encode($response);
  }
} catch (PDOException $e) {
  $response = array('success' => false, 'message' => 'Erro ao aprovar ponto de coleta.' . $e);
  echo json_encode($response);
}
