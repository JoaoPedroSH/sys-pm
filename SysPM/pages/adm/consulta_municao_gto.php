<?php
session_start();

if (!isset($_SESSION['adm'])) {

  header("location:../login.php");
}

include_once "../../db/Conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>



  <?php include('../layouts/title_e_favicon.html') ?>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


  <!-- CDN's -->
  <script src="../../js/script.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <?php include('../layouts/navbar_superior.html') ?>

  <div class="container-fluid" style="margin-top: 3vh;">

    <div class="row">

      <?php include('../layouts/navbar_lateral.html') ?>

      <div class="corpo-painel col-md-10" style="background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">

        <div class="table-responsive pt-3" style="min-width: 480px;">

          <h2 style="text-align: center;"><u>Consutar Munições - GTO</u></h2>

          <br>
          <!-- FILTRO -->
          <div class="col-md-12" style="display: flex;width: 100%;margin: 0 0 5px;padding-left: 9%;">

            <input style="width: 80%; box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">
          </div>

          <!-- TABELA -->
          <table class="table table-bordered table-striped">

            <thead>
              <style>
                th,
                td {
                  text-align: center;
                }
              </style>
              <th> # </th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th>VALIDADE</th>
              <th>TIPO</th>
              <th>QUANTIDADE</th>
              <th>OBS</th>
              <th>AÇÕES</th>

            </thead>

            <?php

            $query = "SELECT  * FROM municao_gto";

            $result = mysqli_query($conexao, $query);

            $x = 1;

            while ($linhas = $result->fetch_assoc()) {

            ?>

              <tbody id="myTable">
                <tr>
                  <td><?= $x ?></td>
                  <td><?= $linhas['marca'] ?></td>
                  <td><?= $linhas['modelo'] ?></td>
                  <td><?php
                      $date = date("d/m/Y", strtotime($linhas['validade']));
                      echo  $date;
                      ?></td>
                  <td>
                    <?= $linhas['tipo']    ?>
                  </td>
                  <td><?= $linhas['quantidade'] ?></td>
                  <td><Button class="btn btn-outline-danger obs" id="<?= $linhas['obs'] ?>">OBS</Button></td>
                  <td>
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEdit" data-modelo="<?= $linhas['modelo'] ?>" data-marca="<?= $linhas['marca'] ?>" data-validade="<?= $linhas['validade'] ?>" data-quantidade="<?= $linhas['quantidade'] ?>" data-obs="<?= $linhas['obs'] ?>   " data-id="<?= $linhas['id'] ?>">Editar</button>
                  </td>
                </tr>

              <?php

              $x++;
            }
              ?>

              <!--MODAL EDITAR -->
              <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../../services/EditandoMunicao.php" method="POST" onsubmit="return  verificar()">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca">
                          </div>
                          <label for="recipient-name" class="col-form-label">Modelo:</label>
                          <input type="text" class="form-control" id="modelo" name="modelo">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Validade:</label>
                          <input type="date" class="form-control" id="validade" name="validade">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Quantidade:</label>
                          <input type="number" min="0" class="form-control" id="quantidade" name="quantidade">
                        </div>
                        <div>
                          <label for="message-text" class="col-form-label">Observações:</label><br>
                          <textarea id="obs" name="obs" cols="57" rows="2"> </textarea>
                        </div>

                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="tipo" id="tipo" value="gto">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary ">Salvar Alterações</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- ALERTA DE OBSERVAÇÃO-->
<script>
  $(document).ready(function() {
    $(document).on('click', '.obs', function() {
      var user_id = $(this).attr("id");
      if (user_id != "") {
        Swal.fire({
          position: 'top-end',
          icon: 'warning',
          title: user_id,
          showConfirmButton: true,
          confirmButtonColor: '#F8CA2F',
        })
      } else {
        Swal.fire({
          position: 'top-end',
          icon: 'info',
          title: 'Sem Observações!',
          showConfirmButton: true,
          confirmButtonColor: '#55B3F8',
        })
      }
    });
  });
</script>

<!-- ALERTA DO STATUS FINAL DA EDIÇÃO -->
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
      title: 'Erro ao realizar Edição! Tente novamente...',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>

<?php
  unset($_SESSION['error_edit']);
}

?>

<!-- MANIPULAÇÃO DE DADOS DO MODAL DE EDIÇÃO -->
<script>
  $(document).ready(function() {
    $('#modalEdit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);

      var id = button.data('id');
      var marca = button.data('marca');
      var modelo = button.data('modelo');
      var validade = button.data('validade');
      var quantidade = button.data('quantidade');
      var observacao = button.data('obs');

      $('#id').val(id);
      $('#marca').val(marca);
      $('#modelo').val(modelo);
      $('#validade').val(validade);
      $('#quantidade').val(quantidade);
      $('#obs').val(observacao);

    })
  })
</script>

<!-- VALIDAÇÃO DO MODAL DE EDIÇÃO -->
<script>
  function verificar() {

    var id = document.getElementById("id")
    var modelo = document.getElementById("modelo")
    var marca = document.getElementById("marca")
    var validade = document.getElementById("validade")
    var quantidade = document.getElementById("quantidade")
    var obs = document.getElementById('obs')

    if (modelo.value == "" && marca.value == "" && validade.value == "" && quantidade.value == "") {

      alert("Campo/os em Branco, preencha todos os campos para realiza edição dos dados")

      return false

    } else {

      return true

    }
  }
</script>

<!-- JQUERY DO FILTRO DA TABELA -->
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

</html>