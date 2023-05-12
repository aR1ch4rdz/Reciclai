<?php
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = $conn->query('SELECT * FROM empresa');
    
    foreach($sql as $row){
        if ($email == $row[2] && $password == $row[4]){
            http_response_code(401);
            exit();
        }
    }

http_response_code(302);