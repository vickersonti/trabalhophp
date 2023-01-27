$(document).ready(function () {
    $(".cpf").mask("000.000.000-00");
    $(".telefone").mask("(00) 00000-0000");
    // --------------------------- CREATE ---------------------------------------
    $(".btnCreate").on("click", function () {
      $("#modalCadastrar").modal("show");
    });
  
    $("#form_create").on("submit", function (event) {
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#form_create").serialize();
      $.post("createCliente.php", dados, function (retorna) {
        if (retorna) {
          console.log(retorna);
          //Limpar os campo
          $("#form_create")[0].reset();
  
          //Fechar a janela modal cadastrar
          $("#modalCadastrar").modal("hide");
  
          //Alerta de cadastro realizado com sucesso
          //$("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
          $("#msgUpdateSuccess").modal("show");
  
          //Limpar mensagem de erro
          $("#msg-error").html("");
        } else {
        }
      });
    });
    // --------------------------- EDIT ---------------------------------------
    $(".btnEdit").on("click", function () {
      $("#modalEditar").modal("show");
  
      $tr = $(this).closest("tr");
  
      var data = $tr
        .children("td")
        .map(function () {
          return $(this).text();
        })
        .get();
  
      $("#update_id").val(data[0]);
      $("#nome").val(data[1]);
      $("#nascimento").val(data[2]);
      $("#email").val(data[3]);
      $("#telefone").val(data[4]);
      $("#cpf").val(data[5]);
    });
  
    $("#form_edit").on("submit", function (event) {
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#form_edit").serialize();
      $.post("updateCliente.php", dados, function (retorna) {
        if (retorna) {
          //Limpar os campo
          $("#form_edit")[0].reset();
  
          //Fechar a janela modal cadastrar
          $("#modalEditar").modal("hide");
  
          //Alerta de cadastro realizado com sucesso
          //$("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
          $("#msgUpdateSuccess").modal("show");
  
          //Limpar mensagem de erro
          $("#msg-error").html("");
        } else {
        }
      });
    });
  
    // --------------------------- DELETE ---------------------------------------
  
    $(".btnDelete").on("click", function () {
      $("#modalExcluir").modal("show");
  
      $tr = $(this).closest("tr");
  
      var data = $tr
        .children("td")
        .map(function () {
          return $(this).text();
        })
        .get();
  
      $("#delete_id").val(data[0]);
    });
  
    $("#form_delete").on("submit", function (event) {
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#form_delete").serialize();
      $.post("deleteCliente.php", dados, function (retorna) {
        if (retorna) {
          //Limpar os campo
          $("#form_delete")[0].reset();
  
          //Fechar a janela modal cadastrar
          $("#modalExcluir").modal("hide");
  
          //Alerta de cadastro realizado com sucesso
          //$("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
          $("#msgUpdateSuccess").modal("show");
  
          //Limpar mensagem de erro
          $("#msg-error").html("");
        } else {
        }
      });
    });
    // --------------------------- Refresh Page ---------------------------------------
    $("#closeUpdate").on("click", RefreshTable);
  
    function RefreshTable() {
      //$("#tabela").load("home.php #tabela");
      location.reload();
    }
  });
  