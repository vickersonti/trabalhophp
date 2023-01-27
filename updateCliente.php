<?php
// Incluir arquivo de configuração
require_once "conexao.php";


if (isset($_POST['update_id'])) {
    $id = $_POST['update_id'];
    $nome = $_POST['nome'];
    $dtNascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    $sql = 'UPDATE cliente SET nome = :nome, telefone = :telefone, dtNascimento = :dtNascimento, email = :email, cpf = :cpf WHERE id =  :id';
    $stmt = $GLOBALS['pdo']->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':dtNascimento', $dtNascimento);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        //header("location: home.php");
        echo 'teste';
    } else {
        //echo 'Erro ao Atualizar';
    }
}