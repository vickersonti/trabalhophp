<?php
// Incluir arquivo de configuração
require_once "conexao.php";

$sql = "INSERT INTO cliente (id, dtNascimento, nome, email, telefone, cpf) VALUES (null, :dtNascimento, :nome, :email, :telefone,  :cpf)";

$stmt = $GLOBALS['pdo']->prepare($sql);

$stmt->bindParam(':dtNascimento', $_POST['nascimento']);
$stmt->bindParam(':nome', $_POST['nome']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':telefone', $_POST['telefone']);
$stmt->bindParam(':cpf', $_POST['cpf']);

$stmt->execute();

header("location: home.php");