<?php
$user = "root";
$password = "batatamysql";

try{
    $conn = new PDO('mysql:host=localhost:3306;dbname=recicla_teste', $user, $password);
}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>