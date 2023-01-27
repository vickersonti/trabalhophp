<?php
// Incluir arquivo de configuração
require_once "conexao.php";


if (isset($_POST['delete_id'])) {

    $id = $_POST['delete_id'];

    $sql = 'DELETE FROM cliente WHERE id =  :id';
    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("location: home.php");
    } else {
        echo 'Erro ao Atualizar';
    }
}
