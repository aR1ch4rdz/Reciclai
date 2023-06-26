<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$email = $_POST['email'] ?? $_GET['email'];
$password = $_POST['password'] ?? $_GET['password'];

$sql = $conn->query("SELECT USR_ID, USR_NAME, USR_TYPE, USR_EMAIL, USR_PHONE FROM APP_USUARIO WHERE USR_EMAIL = '$email' AND USR_SENHA = '$password'");

$data = $sql->fetchAll(PDO::FETCH_ASSOC);

if (count($data) == 0) {
  $response = array('success' => false, 'message' => 'Usuario não encontrado');
  echo json_encode($response);
} else {
  $response = array('success' => true, 'message' => 'Usuario encontrado', 'data' => $data);
  echo json_encode($response);
}