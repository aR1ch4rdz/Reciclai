<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

$email = $_POST['email'] ?? $_GET['email'];
$password = $_POST['password'] ?? $_GET['password'];

$sql = $conn->query("SELECT USR_ID, USR_NAME, USR_TYPE, USR_EMAIL, USR_PHONE FROM APP_USUARIO WHERE USR_EMAIL = '$email' AND USR_SENHA = '$password'");

$data = $sql->fetchAll(PDO::FETCH_ASSOC);

if(count($data) == 0){
    echo json_encode(["erro" => "User Not Found"]);
}else{
    echo json_encode($data);
}