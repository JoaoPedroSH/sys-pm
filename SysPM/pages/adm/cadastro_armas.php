<?php
/* Abrindo e Verificando Sessão */
session_start();

if (!isset($_SESSION['adm'])) {
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <!-- Templete Navbar -->
  <?php include('../layouts/navbar_superior.html') ?>

  <div class="container-fluid" style="margin-top: 3vh;">
    <div class="row">

      <!-- Templete Sidebar -->
      <?php include('../layouts/navbar_lateral.html') ?>

      <div class="corpo-painel col-md-10" style="background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
        <div class="col-md-12 table-responsive pt-3" style="min-width: 480px;">
          <main role="main" class="col-md-12 col-lg-12 pt-3 px-4" style="box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);">
            <h2 class="page-header" id="titulo" style="text-align: center;">Cadastro de Armas</h2>
            <hr>
            <div id="main" class="container-fluid">

              <!-- Formulário de Cadastro -->
              <form action="../../services/CadastrandoArma.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>TIPO DE ARMA</label>
                    <input type="text" class="form-control" name="" placeholder="">
                  </div>
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
                    <input type="text" class="form-control" name="n_serie" placeholder="" required>
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
                    <label>DATA ÙLT. INSPEÇÃO</label>
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
                      <label><input value="ordi" type="radio" style=" margin-left: 10px;" name="cadastro" required> ORDINÁRIO</label>
                    </div>
                  </div>
                </div>
                <div>
                  <label for="imagem">ADICIONAR FOTO: </label>
                  <input type="file" id="foto" name="foto" accept="image/*">
                </div>
                <hr />

                <!-- Botões de Ação do Formulário -->
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" id="salvar" class="btn btn-primary" style="box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);" name="btnSubmit"> Salvar </button>
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

<!-- Alerta de Sucesso ao Cadastrar a Arma -->
<?php
if (isset($_SESSION['sucesso'])) {
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
unset($_SESSION['sucesso'])
?>

</html>