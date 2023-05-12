<?php
include 'auth.php';
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cnpj = 12345678901234 ; //$_POST['cnpj'];
//$cep = $_POST['cep'];
$password = $_POST['password'];

### Falta validar o CEP
try{
$sql = $conn->prepare('UPDATE empresa SET 
nome_emp=:nome, email_emp=:email, tel_emp=:phone, senha_emp=:pass
WHERE cnpj_emp = :cnpj
');

$sql->execute([
    ':cnpj' => $cnpj,
    ':nome' => $name,
    ':email' => $email,
    ':phone' => $phone,
    ':pass' => $password
]);
}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}
http_response_code(302);