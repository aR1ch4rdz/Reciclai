<?php

include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == DATA_SRC[0] && $password == DATA_SRC[5]) :
    http_response_code(401);
    exit();
endif;

http_response_code(302);