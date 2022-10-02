<?php

session_start();

if (!isset($_SESSION)) {

  header("location:../login.php");
}

include_once "../../db/Conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <?php include('../layouts/title_e_favicon.html') ?>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="../../css/buttom.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

  <!-- CDN's -->
  <script src="../../js/script.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <?php include('../layouts/navbar_superior.html') ?>

  <div class="container-fluid" style="margin-top: 3vh;">

    <div class="row">

      <?php
            if(isset($_SESSION['arm'])) {
            include '../layouts/navbar_lateral_armeiro.html';
            }
            
            if (isset($_SESSION['adm'])){
            include '../layouts/navbar_lateral.html';
            }
            ?>

      <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">

        <div class="table table-hover-responsive pt-3" style="min-width: 480px;">

          <h2 style="text-align: center;"><u> Armas - Tático </u></h2>
          <br>

          <!-- FILTRO -->
          <div class="col-md-12 justify-content-center" style="display: flex;margin: 0 0 5px;">
            <input style="width: 40%; box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">
          </div>
          <br>

          <!-- TABELA -->
          <table class="table table-hover table-bordered table-striped">

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

              <th>Nº SÉRIE</th>

              <th>PRATIMÔNIO</th>

              <th>LOCALIZAÇÃO</th>

              <th>SITUAÇÃO</th>

              <th>CAUTELA</th>

              <th>OBS</th>

              <th>AÇÃO</th>

            </thead>

            <?php

            $query = "SELECT  * FROM armas_gto";

            $result = mysqli_query($conexao, $query);

            $x = 1;

            while ($linhas = $result->fetch_assoc()) {

            ?>

              <tbody id="myTable">

                <tr>

                  <td><?= $x ?></td>

                  <td><?= $linhas['marca'] ?></td>

                  <td><?= $linhas['modelo'] ?></td>

                  <td><?= $linhas['n_serie'] ?></td>

                  <td><?= $linhas['patrimonio'] ?></td>

                  <td><?= $linhas['localizacao'] ?></td>

                  <td><?= $linhas['situacao'] ?></td>

                  <td><?= $linhas['cautela'] ?></td>

                  <td>
                    <Button class="btn btn-outline-danger obs" id="<?= $linhas['obs'] ?>">
                      OBS
                    </Button>
                  </td>

                  <td style="display: flex;justify-content: space-around;flex-wrap: nowrap;">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEdit" data-id="<?= $linhas['id'] ?>" data-foto-arma="<?= $linhas['foto'] ?>" data-tipo-arma="<?= $linhas['tipo_arma'] ?>" data-marca="<?= $linhas['marca'] ?>" data-modelo="<?= $linhas['modelo'] ?>" data-numero-serie="<?= $linhas['n_serie'] ?>" data-patrimonio="<?= $linhas['patrimonio'] ?>" data-localizacao="<?= $linhas['localizacao'] ?>" data-situacao="<?= $linhas['situacao'] ?>" data-cautela="<?= $linhas['cautela'] ?>" data-observacao="<?= $linhas['obs'] ?>" data-ult-inspecao="<?= $linhas['data_inspecao'] ?>">
                      Editar
                    </button>

                    <button type="button" class="btn btn-od btn-outline-dark" data-toggle="modal" data-target="#modalHistory<?= $linhas['id'] ?>" style="margin-left: 5px;"> Ver Histórico </button>
                  </td>

                </tr>

                <!-- MODAL DO HISTÓRICO -->
                <div class="modal fade bd-example-modal-lg" id="modalHistory<?= $linhas['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h5 class="modal-title" id="history">
                          Histórico da arma ' <?= $linhas['marca'] ?> / <?= $linhas['modelo'] ?> '
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body" id="historico">
                        <div style="width: 100%;">

                          <img src="../../services/store/img/armas/<?= $linhas['foto'] ?>" alt="Sem Foto!" style="width: 170px;height: 150px;left: 50%;transform: translate(-50%);position: relative;">

                        </div>
                        <div class="container">

                          <h6 style="margin: 10px;">
                            Nº SÉRIE : <?= $linhas['n_serie'] ?>
                          </h6>

                          <hr>

                          <div id="row_hist" style="display: flex;">

                            <h6 style="width: 30%;text-align: center;margin: 0;">
                              LOCALIZAÇÃO
                            </h6>

                            <h6 style="width: 40%;text-align: center;margin: 0;">
                              CAUTELA
                            </h6>

                            <h6 style="width: 30%;text-align: center;margin: 0;">
                              DATA ATUAL
                            </h6>

                          </div>

                          <hr>

                          <form action="../../services/biblioteca_pdf/PdfHistoricoDaArma.php" method="POST" target="_blank" enctype="multipart/form-data">

                            <?php

                            $query2 = "SELECT  * FROM historico_armas";

                            $result1 = mysqli_query($conexao, $query2);

                            $y = 1;

                            while ($linhas1 = $result1->fetch_assoc()) {

                              if ($linhas['n_serie'] == $linhas1['n_serie']) {

                            ?>
                                <input type="hidden" name="n_serie" value="<?= $linhas1['n_serie'] ?>">

                                <div id="historico_pdf">
                                  <div id="row_hist" style="display: flex;">

                                    <h6 style="width: 30%;text-align: center;margin: 0;">
                                      <?= $linhas1['localizacao'] ?>
                                    </h6>

                                    <h6 style="width: 40%;text-align: center;margin: 0;">
                                      <?= $linhas1['cautela'] ?>
                                    </h6>

                                    <h6 style="width: 30%;text-align: center;margin: 0;">
                                      <?= $linhas1['data_atual'] ?>
                                    </h6>

                                  </div>
                                </div>

                                <hr>

                            <?php
                                $y++;
                              }
                            }
                            ?>

                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="submit" class="btn btn-outline-danger">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 20 20">
                            <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                            <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                          </svg>
                          Imprimir
                        </button>

                        <input type="hidden" name="imprimir" value="inprimir">

                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- MODAL DE EDIÇÃO -->
                <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h5 class="modal-title" id="edit">Editar Dados</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body">

                        <form action="../../services/UpandoFotoArma.php" method="POST" enctype="multipart/form-data">

                          <div class="form-group">

                            <label for="recipient-name" class="col-form-label">
                              FOTO
                            </label>

                            <br>

                            <input type="hidden" id="tipo" name="tipoArmaFoto" value="gto">

                            <input type="hidden" id="idArmaFoto" name="idArmaFoto">

                            <input type="file" id="foto_arma" name="foto_arma" accept="image/png, image/jpeg, image/jpg">

                            <button type="submit" class="btn btn-outline-primary">
                              Atualizar
                            </button>

                          </div>
                        </form>

                        <hr>

                        <form action="../../services/EditandoArma.php" method="POST" onsubmit="return  verificar()">

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              MARCA
                            </label>

                            <input type="text" class="form-control" id="marca" name="marca">

                          </div>

                          <div class="form-group">

                            <label for="recipient-name" class="col-form-label">
                              MODELO
                            </label>

                            <input type="text" class="form-control" id="modelo" name="modelo">

                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              Nº SÉRIE
                            </label>

                            <input type="text" class="form-control" id="n_serie" name="n_serie">
                            <input type="hidden" id="n_serie2" name="n_serie2">
                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              PRATIMÔNIO
                            </label>

                            <input type="text" class="form-control" id="patrimonio" name="patrimonio">

                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              LOCALIZAÇÃO
                            </label>

                            <input type="text" class="form-control" id="localizacao" name="localizacao">

                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              SITUAÇÃO
                            </label>

                            <input type="text" class="form-control" id="situacao" name="situacao">

                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              DATA ULT. INSPEÇÃO
                            </label>

                            <input type="date" class="form-control" id="data_inspecao" name="data_inspecao">

                          </div>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              OBERVAÇÕES
                            </label>

                            <br>

                            <textarea id="obs" class="form-control" name="obs" cols="60" rows="1"></textarea>

                          </div>

                          <hr>

                          <div class="form-group">

                            <label for="message-text" class="col-form-label">
                              CAUTELA

                              <select class="form-select " aria-label="Default select example" style="text-align: center;" required name="tipoedicao">

                                <option value="correcao">
                                  Corrigir
                                </option>

                                <option value="mudanca">
                                  Mudar
                                </option>

                              </select>

                            </label>

                            <input type="text" class="form-control" id="cautela" name="cautela">

                          </div>

                          <input type="hidden" name="id" id="id">

                          <input type="hidden" name="tipo" id="tipo" value="gto">

                      </div>

                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                          Fecha
                        </button>

                        <button type="submit" class="btn btn-primary ">
                          Salvar Alterações
                        </button>

                      </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php

              $x++;
            }
              ?>

              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

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
      var tipo_arma = button.data('tipo-arma');
      var marca = button.data('marca');
      var modelo = button.data('modelo');
      var n_serie = button.data('numero-serie');
      var patrimonio = button.data('patrimonio');
      var localizacao = button.data('localizacao');
      var situacao = button.data('situacao');
      var cautela = button.data('cautela');
      var data_inspecao = button.data('ult-inspecao');
      var observacao = button.data('observacao');

      $('#id').val(id);
      $('#idArmaFoto').val(id);
      $('#tipo_arma').val(tipo_arma);
      $('#marca').val(marca);
      $('#modelo').val(modelo);
      $('#n_serie').val(n_serie);
      $('#n_serie2').val(n_serie);
      $('#patrimonio').val(patrimonio);
      $('#localizacao').val(localizacao);
      $('#situacao').val(situacao);
      $('#cautela').val(cautela);
      $('#data_inspecao').val(data_inspecao);
      $('#obs').val(observacao);
    })
  })
</script>

<!-- VALIDAÇÃO DO MODAL DE EDIÇÃO -->
<script>
  function verificar() {

    var modelo = document.getElementById("modelo")

    var marca = document.getElementById("marca")

    var n_serie = document.getElementById("serie")

    var patrimonio = document.getElementById("patrimonio")

    var localiza = document.getElementById("localiza")

    var situacao = document.getElementById("situacao")

    var cautela = document.getElementById("cautelar")

    var id = document.getElementById("id")

    var obs = document.getElementById('obs')

    if (modelo.value == "" && marca.value == "" && n_serie.value == "" && patrimonio.value == "" &&
      localiza.value == "" && situacao.value == "" && cautela.value == "") {

      alert("TODOS OS CAMPOS EM BRANCO!")

      return false

    } else {

      return true

    }

  }
</script>

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

<!-- JQUERY DO FILTRO DE TABELA -->
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