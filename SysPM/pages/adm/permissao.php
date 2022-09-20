<?php
/* Criando e Verificando sessão */
session_start();

if (!isset($_SESSION['adm'])) {
  header("location:../login.php");
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

 

  <!-- Favicon -->
  <?php include('../layouts/title_e_favicon.html') ?>

  <!-- Estilos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

  <!-- Cdn's -->
  <script src="../../js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<?php
if (isset($_SESSION['edit_permissao'])) {
?>
  <!-- Alerta de edição realizada -->
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
  unset($_SESSION['edit_permissao']);
}

if (isset($_SESSION['nao_editado'])) {
?>
  <!-- Alerta de edição mal sucedida -->
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
  unset($_SESSION['nao_editado']);
}
?>

<body>

  <!-- Templete Navbar -->
  <?php include('../layouts/navbar_superior.html') ?>

  <div class="container-fluid" style="margin-top: 3vh;">

    <div class="row">

      <!-- Templete Sidebar -->
      <?php include('../layouts/navbar_lateral.html') ?>

      <div class="corpo-painel col-md-10" style="background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
        <div class="col-md-12 table-responsive pt-3" style="min-width: 480px;">
          <h2 style="text-align: center;"><u>Permissões</u></h2>
          <br>

          <?php
          if (isset($_SESSION['adcionado'])) {
          ?>
            <!-- Alerta de cadastro realizado -->
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
          unset($_SESSION['adcionado']);
          ?>

          <?php
          if (isset($_SESSION['excluido'])) {
          ?>
            <!-- Alerta de exclusão realizada -->
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

          <div class="col-md-12" style="display: flex;margin: 0 0 5px;justify-content: space-around;">

            <!-- Filtro da tabela -->
            <input style="box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">

            <!-- Botão de ação de cadastro -->
            <button class="btn btn-success" onclick="openModal()" style="box-shadow: 2px 2px 2px black;margin-left: 10px;height: 37px;"><i class="bi bi-person-check-fill"></i> Adicionar Usuário</button>

          </div>

          <!-- Modal de Cadastro de usuário -->
          <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../services/CadastrandoUsuario.php" method="post">
                    <div class="container">
                      <div class="row">
                        <div class="col -5">
                          <label for="">Usuário</label>
                          <input type="text" class="form-control" id="novouser" name="novouser" required>
                        </div>
                        <div class="col -5">
                          <label for="">Senha:</label>
                          <input type="text" class="form-control" id="novouser" name="newsenha" required>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <label for="">Tipo usuário:</label>
                        <select name="novotipouser" id="" style="text-align: center;">
                          <option value="adm">Adm</option>
                          <option value="arm">Armeiro</option>
                        </select>
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary ">Salvar Usuário</button>
                </div>
                </form>
              </div>
            </div>
          </div>


          <!-- Abri modal de cadastro de usuário -->
          <script>
            function openModal() {
              $('#adduser').modal('show')
            }
          </script>

          <!-- Tabela de Usuários -->
          <table class="table table-bordered table-striped">

            <thead>
              <style>
                th,
                td {
                  text-align: center;
                }
              </style>

              <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>Senha</th>
                <th>Permissão</th>
                <th>Ação</th>
              </tr>
            </thead>

            <?php
            include('../../db/Conexao.php');
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
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" data-bs-whatever1="<?= $linhas['senha'] ?>" data-bs-whatever2="<?= $linhas['user'] ?>" data-bs-whatever3="adm" data-bs-whatever4="<?= $linhas['id_usuario'] ?>">
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

          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Alerta de Exclusão -->
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

  <!-- Modal de edição do usuário -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../services/EditandoUsuario.php" method="post">
            <div class="container">
              <div class="row">
                <div class="col -3">
                  <label for="message-text" class="col-form-label">Usuário:</label>
                  <input type="text" class="form-control" id="marca" name="user" required>
                </div>
                <div class="col -3">
                  <label for="recipient-name" class="col-form-label">Senha:</label>
                  <input type="text" class="form-control" id="modelo" name="senha" required>
                </div>
              </div>
              <br>
              <div class="row" style=" margin: auto;">
                <label for="recipient-name" class="col-form-label">Acesso: </label>
                <select name="acesso" required style="text-align: center;">
                  <option value="">Selecione o tipo de Acesso</option>
                  <option value="adm">Adm</option>
                  <option value="arm">Armeiro</option>
                </select>
              </div>
            </div>
            <input type="hidden" class="form-control" name="id" id="modelo1">
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary ">Salvar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--
Edição deve ser alterada

  <script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {

      var button = event.relatedTarget
      var recipient1 = button.getAttribute('data-bs-whatever1')
      var recipient2 = button.getAttribute('data-bs-whatever2')
      var id = button.getAttribute('data-bs-whatever4')
      var modalBodyInput = exampleModal.querySelector('#modelo')
      modalBodyInput.value = recipient1
      var modalBodyInput = exampleModal.querySelector('#marca')
      modalBodyInput.value = recipient2
      var modalBodyInput = exampleModal.querySelector('#modelo1')
      modalBodyInput.value = id

    })
  </script>
  -->

  <script>
    // Jquery para fazer buscar na tabela
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>
</html>