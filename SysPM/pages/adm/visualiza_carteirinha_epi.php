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

      <div class="corpo-painel col-md-10" style="background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">

        <div class="table-responsive pt-3" style="min-width: 480px;">

          <h2 style="text-align: center;"><u>Documentos de Cautelas do EPI</u></h2>

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
              <th>DATA DE GERAÇÃO</th>
              <th>OFICIAL</th>
              <th>DOCUMENTO</th>

            </thead>

            <?php

            $query = "SELECT  * FROM cautela_do_epi";

            $result = mysqli_query($conexao, $query);

            $x = 1;

            while ($linhas = $result->fetch_assoc()) {

            ?>

              <tbody id="myTable">
                <tr>
                  <td><?= $x ?></td>
                  <td><?= $linhas['data_geracao'] ?></td>
                  <td><?= $linhas['oficial'] ?></td>
                  <td><a target="_blank" href="../../services/biblioteca_pdf/doc/cautelas_do_epi/<?= $linhas['documento'] ?>"><?= $linhas['documento'] ?><a></td>
                </tr>

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
</body>

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