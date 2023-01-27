<?php

require_once 'conexao.php';
session_start();

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (($_SESSION["loggedin"]) == '') {
    header("location: index.php");
    exit;
}

$sql = "select * from cliente ORDER BY id ASC";
$resultado = $pdo->prepare($sql);
$resultado->execute();
?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
</head>
<div class="container">
    <div class="d-flex justify-content-end">
        <a href="logout.php" class="btn"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>

    <header class="d-flex justify-content-center py-3">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Tabela de CRUD</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure
                to
                look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's
                content for equal-height.</p>
        </div>
    </header>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btnCreate">
            <i class="h3 mr-2 mb-2 fa-solid fa-square-plus"></i>
        </button>
    </div>



    <table class="table table-striped table-hover" id="tabela">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cpf</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($resultado as $item) {
                $id = $item['id'];
                $nome = $item['nome'];
                $nascimento = $item['dtNascimento'];
                $email = $item['email'];
                $telefone = $item['telefone'];
                $cpf = $item['cpf'];

            ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $nome ?></td>
                <td><?= $nascimento ?></td>
                <td><?= $email ?></td>
                <td><?= $telefone ?></td>
                <td><?= $cpf ?></td>
                <td>
                    <button type="button" class="btn btnEdit">
                        <i class="fa-solid fa-pen"></i>
                    </button>

                    <button type="button" class="btn btnDelete">
                        <i class="fa-solid fa-trash-can "></i></a>
                    </button>
                </td>
            </tr>
            <?php

            } ?>

        </tbody>
    </table>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_create">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" placeholder="Insira seu Nome" name="nome">
                        </div>
                        <div class="form-group">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="nascimento">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" placeholder="exemple@example.com" name="email">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control telefone" placeholder="(21)9999-99999"
                                name="telefone">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" inputmode="numeric" class="form-control cpf" placeholder="111.111.111-11"
                                name="cpf">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Salvar</button>
                            <button type="reset" class="btn btn-secondary w-50 ml-1"
                                data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atualizar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_edit">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="form-group">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" id="nascimento">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control telefone" name="telefone" id="telefone">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control cpf" name="cpf" id="cpf">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Atualizar</button>
                            <button type="button" class="btn btn-secondary w-50 ml-1"
                                data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Atualizado com Sucesso -->
    <div class="modal" id="msgUpdateSuccess" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-center">
                    <h5 class="modal-title">Usuário</h5>
                </div>
                <div class="modal-body">
                    <p>Usuário atualizado com Sucesso </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info" id="closeUpdate"
                        data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Excluir -->
    <div class="modal" id="modalExcluir" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_delete">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <p>Tem certeza que desej excluir? </p>

                        <button type="submit" class="btn btn-primary">Excluir</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="p-2 mb-2 bg-secondary text-white text-center">
        <p>© <?= date('Y') ?> - Todos os direitos reservados</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="./custom.js"></script>
    <script src="./jquery.mask.js"></script>

</div>