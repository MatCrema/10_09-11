<?php
    $host = 'localhost';
    $dbname = 'bdlogin0911';
    $username = 'root';
    $password = '';

    //faz uma atribuição a variável que indica qual é o servidor e qual o banco pelas variáveis. Username e password estão fora do "" por serem parametros
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
?>