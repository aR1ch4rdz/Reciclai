<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$nome = $_POST['nome'] ?? $_GET['nome'];
$cnpj = $_POST['cnpj'] ?? $_GET['cnpj'];
$cep = $_POST['cep'] ?? $_GET['cep'];
$status = $_POST['status'] ?? $_GET['status'];
$usrID = $_POST['usrID'] ?? $_GET['usrID'];



try {
    // Preparando consulta.
    $stmt = $conn->prepare("INSERT INTO USR_EMPRESA (EMP_NOME, EMP_CNPJ, EMP_CEP, EMP_STATUS, EMP_USR_ID) 
                           VALUES (:empName, :empCnpj, :empCep, :empStatus, :usrID)");

    $stmt->bindParam(':empName', $nome);
    $stmt->bindParam(':empCnpj', $cnpj);
    $stmt->bindParam(':empCep', $cep);
    $stmt->bindParam(':empStatus', $status);
    $stmt->bindParam(':usrID', $usrID);

    // Execução da consulta
    $stmt->execute();
    

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Conta criada com sucesso
        $response = array('success' => true, 'message' => 'Empresa cadastrada');
        echo json_encode($response);
    } else {
        // Falha ao criar a conta
        $response = array('success' => false, 'message' => 'Erro ao cadastrar empresa.');
        echo json_encode($response);
    }
} catch(PDOException $e) {
    // Erro ao executar a consulta
    $response = array('success' => false, 'message' => 'Erro ao criar empresa: ' . $e->getMessage());
    echo json_encode($response);
}