<?php
/* Abrindo e Verificando Sessão */
session_start();

if (!isset($_SESSION)) {
  header("location:../login.php");
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

  <meta charset="utf-8">

  <!-- Favicon -->
  <?php include('../layouts/title_favicon.html') ?>

  <!-- Estilos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

  <!-- Cdn's -->
  <script src="../../js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
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
      <?php
      if (isset($_SESSION['arm'])) {
        include '../layouts/navbar_lateral_armeiro.html';
      }

      if (isset($_SESSION['adm'])) {
        include '../layouts/navbar_lateral.html';
      }
      ?>

      <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
        <div class="col-md-12 table-responsive pt-3" style="min-width: 480px;">
          <main role="main" class="col-md-12 col-lg-12 pt-3 px-4" style="position: static; box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);">
            <h2 class="page-header" id="titulo" style="text-align: center;">Cadastro de Armas</h2>
            <hr>
            <div id="main" class="container-fluid">

              <!-- Formulário de Cadastro -->
              <form action="../../services/CadastrandoArma.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>MARCA</label>
                    <input type="text" class="form-control" name="marca" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>MODELO</label>
                    <input type="text" class="form-control" name="modelo" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nº SÉRIE</label>
                    <input type="text" class="form-control" name="n_serie" id="n_serie" placeholder="" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>PATRIMÔNIO</label>
                    <input type="text" class="form-control" name="patrimonio" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>LOCALIZAÇÃO</label>
                    <input type="text" class="form-control" name="localizacao" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>SITUAÇÃO</label>
                    <input type="text" class="form-control" name="situacao" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>CAUTELA</label>
                    <input type="text" class="form-control" id="cautela" name="cautela" placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>DATA ULT. INSPEÇÃO</label>
                    <input type="date" class="form-control" name="data_inspecao">
                  </div>
                  <div class="form-group col-md-6">
                    <label>OBSERVAÇÃO </label>
                    <textarea class="form-control" name="observacao" id="" rows="1" placeholder=""></textarea>
                  </div>
                  <div class="form-group col-md-3" style="text-align: center;">
                    <label>TIPO DE INVENTÁRIO</label>
                    <div class="form-check">
                      <label><input value="gto" type="radio" name="cadastro" required> GTO</label>
                      <label><input value="ordinario" type="radio" style=" margin-left: 10px;" name="cadastro" required> ORDINÁRIO</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>ADICIONAR FOTO </label>
                    <label for="foto" class="form-control" id="labelFoto"> Selecionar </label>
                    <input type="file" id="foto" name="foto" accept="image/*" style="display: none;">
                    <img src="" id="foto-preview" style="width:200px;">
                  </div>
                </div>
                <hr />

                <!-- Botões de Ação do Formulário -->
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" id="salvar" class="btn btn-primary" style="position: static; box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);" name="btnSubmit"> Salvar </button>
                    <a href="home.php">
                      <button style="box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589); margin-left: 10px;" class="btn btn-danger"> Cancelar </button>
                    </a>
                  </div>
                  <br><br><br>
                </div>

              </form>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
    const inputImagem = document.getElementById("foto");
    const imagemPreview = document.getElementById("foto-preview");

    inputImagem.addEventListener("change", function() {
        const arquivo = inputImagem.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            imagemPreview.src = reader.result;
        }, false);

        if (arquivo) {
            reader.readAsDataURL(arquivo);
        }
    });
</script>

<!-- Alerta de Sucesso ao Cadastrar a Arma -->
<?php
if (isset($_SESSION['success_created'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Arma Cadastrada com Sucesso!',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>
<?php
}
unset($_SESSION['success_created'])
?>
<?php
if (isset($_SESSION['error_created'])) {
?>
  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Erro ao Cadastrar Arma!',
      showConfirmButton: false,
      confirmButtonColor: '#2ECC71',
      timer: 3000
    })
  </script>
<?php
}
unset($_SESSION['error_created'])
?>

<style>
  #labelFoto {
    background: gray;
    color: #F2F2F2;
    text-transform: uppercase;
    display: block;
    text-align: center;
    cursor: pointer;
  }

  #labelFoto:hover {
    color: #333;
    background: #ced4da;
  }
</style>

</html>