<?php
$user = "root";
$password = "rootroot";

try{
    $conn = new PDO('mysql:host=localhost:3306;dbname=reciclaAI', $user, $password);
}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>