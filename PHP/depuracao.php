<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $data = file_get_contents('http://localhost:8080/showInformation.php');
    var_dump($data);
    // $finalData = json_decode($data, true);
    // foreach ($finalData as $users) {
    //     echo $users['name'] . '<br>';
    // }

    ?>
</body>

</html>