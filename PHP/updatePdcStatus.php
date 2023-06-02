<?php

require('config.php');
$sql = $conn->query("UPDATE EMP_PONTO_DE_COLETA SET PDC_STATUS = 'ATIVO' WHERE PDC_ID = 1");

?>