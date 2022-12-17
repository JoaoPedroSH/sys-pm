<?php
/* Criando e Verificando sessão */
session_start();

if (!isset($_SESSION['adm'])) {
  header("location:../login.php");
}
include_once "../../db/Conexao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

  <!-- Favicon -->
  <?php include('../layouts/title_e_favicon.html') ?>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

  <!-- CDN's -->
  <script src="../../js/script.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
  .col,
  .col-md-10,
  .col-md-12,
  .col-md-3,
  .col-md-6 {
    position: static;
  }
</style>

<body>

  <!-- Templete Navbar -->
  <?php include('../layouts/navbar_superior.html') ?>

  <div class="container-fluid" style="margin-top: 3vh;">

    <div class="row">

      <!-- Templete Sidebar -->
      <?php include('../layouts/navbar_lateral.html') ?>

      <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
        <div class="col-md-12 table-responsive pt-3" style="min-width: 480px;">
          <h2 style="text-align: center;"><u>Permissões</u></h2>
          <br>

          <div class="col-md-12" style="display: flex;margin: 0 0 5px;justify-content: space-around;">
            <div class="col-md-1"></div>
            <!-- FILTRO -->
            <div class="col-md-9 justify-content-center" style="display: flex;margin: 0 0 5px;">
              <input style="width: 55%; box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">
            </div>
            <br>

            <!-- Botão de ação de cadastro -->
            <div class="col-md-2">
              <button class="btn btn-success" onclick="openModal()" style="box-shadow: 2px 2px 2px black;margin-left: 10px;height: 37px;"> Adicionar Usuário </button>
            </div>
          </div>

          <!-- Tabela de Usuários -->
          <table class="table table-hover table-bordered table-striped">

            <thead>
              <style>
                th,
                td {
                  text-align: center;
                }
              </style>

              <th>#</th>
              <th>USUÁRIO</th>
              <th>SENHA</th>
              <th>PERMISSÃO</th>
              <th>AÇÃO</th>

            </thead>

            <?php
            $query = "SELECT * FROM `usuario`";
            $result = mysqli_query($conexao, $query);
            $x = 1;
            while ($linhas = $result->fetch_assoc()) {

            ?>

              <tbody id="myTable">
                <tr>
                  <td><?= $x ?></td>
                  <td><?= $linhas['user'] ?></td>
                  <td><?= $linhas['senha'] ?></td>
                  <td><?= $linhas['tipo_user'] ?></td>

                  <td>
                    <form action="../../services/ExcluindoUsuario.php" method="post">

                      <!-- Botão de ação de edição de usuário -->
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEdit" data-senha="<?= $linhas['senha'] ?>" data-user="<?= $linhas['user'] ?>" data-acesso="<?= $linhas['tipo_user'] ?>" data-id="<?= $linhas['id_usuario'] ?>">
                        Editar
                      </button>

                      <!-- Input e Botão de ação para excluir usuário -->
                      <input type="hidden" name="idexcluir" value="<?= $linhas['id_usuario'] ?>">
                      <button type="submit" id="<?= $linhas['id_usuario'] ?>" class="btn btn-outline-danger excluir">
                        Excluir
                      </button>

                    </form>
                  </td>

                </tr>
              </tbody>

            <?php
              $x++;
            }
            ?>

            <!-- Modal de Cadastro de usuário -->
            <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../../services/CadastrandoUsuario.php" method="post" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row">
                          <label>Usuário</label>
                          <input type="text" class="form-control" id="novouser" name="novouser" required>
                        </div>
                        <br>
                        <div class="row">
                          <label>Senha</label>
                          <input type="text" class="form-control" id="novouser" name="newsenha" required>
                        </div>
                        <br>
                        <div class="row">
                          <label> Permissão </label> <br>
                          <select class="form-control" name="novotipouser" id="" style="text-align: center;">
                            <option value="adm">Adm</option>
                            <option value="arm">Armeiro</option>
                          </select>
                        </div>
                        <br>
                        <div class="row">
                          <label> Assinatura </label> <br>
                          <label for="assinaturafile" class="form-control labelAssinatura"> Selecionar </label>
                          <input type="file" id="assinaturafile" name="assinaturafile" style="display: none;">
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary ">Salvar Usuário</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal de edição do usuário -->
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Editar Usuário </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../../services/EditandoUsuario.php" method="post" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row">
                          <label> Usuário </label>
                          <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <br>
                        <div class="row">
                          <label> Senha </label>
                          <input type="text" class="form-control" id="senha" name="senha" required>
                        </div>
                        <br>
                        <div class="row">
                          <label> Permissão </label>
                          <select class="form-control" id="acesso" name="acesso" required style="text-align: center;">
                            <option value="adm">Adm</option>
                            <option value="arm">Armeiro</option>
                          </select>
                        </div>
                        <br>
                        <div class="row">
                          <label> Assinatura </label> <br>
                          <label for="editassinaturafile" class="form-control labelAssinatura"> Selecionar </label>
                          <input type="file" id="editassinaturafile" name="editassinaturafile" style="display: none;">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="id" id="id">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary ">Salvar Alterações</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- MODAL DE CADASTRO -->
<script>
  function openModal() {
    $('#adduser').modal('show')
  }
</script>

<!-- ALERTA DE ATENÇÃO DE EXCLUSÃO -->
<script>
  $(document).ready(function() {
    $(document).on('click.prevent', '.excluir', function() {
      var resultado = confirm('Deseja realmente excluir este usuário?')
      if (resultado == true) {
        return true;
      } else {
        return false;
      }
    })
  });
</script>

<!-- ALERTA DE STATUS DE CADASTRO -->
<?php
if (isset($_SESSION['adicionado'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Cadastro Realizado com Sucesso!',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>
<?php
}
unset($_SESSION['adicionado']);
?>


<!-- ALERTA DE STATUS DE EXCLUSÃO -->
<?php
if (isset($_SESSION['excluido'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Usuário Excluido com Sucesso!',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>
<?php
}
unset($_SESSION['excluido']);
?>

<!-- ALERTA DE STATUS DE EDIÇÃO -->
<?php
if (isset($_SESSION['success_edit'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Edição Realizada com Sucesso!',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>

<?php
  unset($_SESSION['success_edit']);
}

if (isset($_SESSION['error_edit'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Erro ao Realizar Edição! Tente novamente...',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>
<?php
  unset($_SESSION['error_edit']);
}
?>

<!-- MANIPULANDO DADOS EDITADOS/EDIÇÃO -->
<script>
  $(document).ready(function() {
    $('#modalEdit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var user = button.data('user');
      var senha = button.data('senha');
      var acesso = button.data('acesso');

      $('#id').val(id);
      $('#user').val(user);
      $('#senha').val(senha);
      $('#acesso').val(acesso);

    })
  })
</script>

<!-- FILTRO DA TABELA -->
<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<style>
  .labelAssinatura {
    background: gray;
    color: #F2F2F2;
    text-transform: uppercase;
    display: block;
    text-align: center;
    cursor: pointer;
  }

  .labelAssinatura:hover {
    color: #333;
    background: #ced4da;
  }
</style>

</html>