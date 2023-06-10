<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$name = $_POST['name'] ?? $_GET['name'];
$email = $_POST['email'] ?? $_GET['email'];
$phone = $_POST['phone'] ?? $_GET['phone'];
$password = $_POST['password'] ?? $_GET['password'];
$type = "EMPRESA";

try {
    // Preparando consulta.
    $stmt = $conn->prepare("INSERT INTO APP_USUARIO (USR_NAME, USR_TYPE, USR_EMAIL, USR_PHONE, USR_SENHA) 
                           VALUES (:usrName, :usrType, :usrEmail, :usrPhone, :usrSenha)");

    $stmt->bindParam(':usrName', $name);
    $stmt->bindParam(':usrType', $type);
    $stmt->bindParam(':usrEmail', $email);
    $stmt->bindParam(':usrPhone', $phone);
    $stmt->bindParam(':usrSenha', $password);

    // Execução da consulta
    $stmt->execute();

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Conta criada com sucesso
        $response = array('success' => true, 'message' => 'Conta criada com sucesso!');
        echo json_encode($response);
    } else {
        // Falha ao criar a conta
        $response = array('success' => false, 'message' => 'Erro ao criar a conta.');
        echo json_encode($response);
    }
} catch(PDOException $e) {
    // Erro ao executar a consulta
    $response = array('success' => false, 'message' => 'Erro ao criar a conta: ' . $e->getMessage());
    echo json_encode($response);
}