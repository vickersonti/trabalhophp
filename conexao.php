<?php

//Criar as constantes com as credencias de acesso ao banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'loja');
define('PORT', '3306');

//Criar a conexão com banco de dados usando o PDO
$pdo = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);

//Verifica se conectou ou não com o banco de dados
try {
    $pdo = new pdo('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USER, PASS);
    //echo "Conexão com banco de dados realizada com sucesso.";
} catch (PDOException $e) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
}