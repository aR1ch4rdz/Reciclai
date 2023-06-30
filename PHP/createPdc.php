<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$status = $_POST['status'] ?? $_GET['status'];
$cep = $_POST['cep'] ?? $_GET['cep'];
$empID = $_POST['empID'] ?? $_GET['empID'] ;
$empLat = $_POST['empLat'] ?? $_GET['empLat'];
$empLon = $_POST['empLon'] ?? $_POST['empLon'];


try {
    // Preparando consulta.
    $stmt = $conn->prepare("INSERT INTO EMP_PONTO_DE_COLETA (PDC_STATUS, PDC_CEP, PDC_EMP_ID, EMP_LATITUDE, EMP_LONGITUDE) 
                           VALUES (:pdcStatus, :pdcCep, :empID, :empLat, :empLon)");

    $stmt->bindParam(':pdcStatus', $status);
    $stmt->bindParam(':pdcCep', $cep);
    $stmt->bindParam(':empID', $empID);
    $stmt->bindParam(':empLat', $empLat);
    $stmt->bindParam(':empLon', $empLon);

    // Execução da consulta
    $stmt->execute();
    

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Conta criada com sucesso
        $response = array('success' => true, 'message' => 'Ponto enviado para analise');
        echo json_encode($response);
    } else {
        // Falha ao criar a conta
        $response = array('success' => false, 'message' => 'Erro ao criar ponto.');
        http_response_code(400);
        echo json_encode($response);
    }
} catch(PDOException $e) {
    // Erro ao executar a consulta
    $response = array('success' => false, 'message' => 'Erro ao criar ponto: ' . $e->getMessage());
    http_response_code(400);
    echo json_encode($response);
}