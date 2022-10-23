<?php
/* Criando e Verificando sessão */
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
    <?php include('../layouts/title_e_favicon.html') ?>

    <!-- Estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.diatables.net/1.10.25/css/jquery.diaTables.css">

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
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
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

            $_SESSION['user_ass'];
            ?>

            <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
                <div class="col-md-12 table-responsive pt-3" style="min-width: 480px;">

                    <!--Main-->
                    <main role="main" class="col-md-12 col-lg-12 pt-3 px-4" style="position: static; box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);">
                        <h3 class="page-header" id="titulo" style="text-align: center;">Documentação Cautela EPI</h3>
                        <hr>
                        <div id="main" class="container-fluid">

                            <!-- Formulário de criação do documento -->
                            <form action="../../services/biblioteca_pdf/PdfCautelaDoEpi.php" method="POST" target="_blank" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label> EQUIPAMENTO <input class="form-control" type="text" name="obj" id="obj" placeholder="" required></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> ARMA <input class="form-control" type="text" name="obj2" id="obj2" placeholder="" required></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> MUNIÇÃO <input class="form-control" type="text" name="obj3" id="obj3" placeholder="" required></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> PARTE </label>
                                        <textarea class="form-control" name="parte" id="parte" cols="30" rows="2" placeholder="" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> TERMO </label>
                                        <textarea class="form-control" name="termo" id="termo" cols="30" rows="2" placeholder="" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> DECLARAÇÃO </label>
                                        <textarea class="form-control" name="declaracao" id="declaracao" cols="30" rows="2" placeholder="" required></textarea>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label> OFICIAL </label>
                                        <input class="form-control" type="text" name="oficial" id="oficial" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label> ASSINATURA </label><br>
                                        
                                        <select class="form-control" name="selecionaModo" id="selecionaModo" onchange="visibilidadeInput()">
                                            <option value="auto" selected> Automática </option>
                                            <option value="manual"> Manual </option>
                                        </select>
                                        <label for="assinaturafile" class="form-control" id="labelAssinatura" style="display: none;"> Selecionar </label>
                                        <input type="file" name="assinaturafile" id="assinaturafile" accept="image/*" style="display: none;" />
                                        <input type="hidden" name="user_assinatura" id="user_assinatura" value="<?= $_SESSION['user_ass'] ?>">
                                    </div>
                                </div>
                                <hr />

                                <!-- Botão de Ação do formulário -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" id="salvar" class="btn btn-outline-danger" style="box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.589);width: 250px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 20 20">
                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                            </svg>
                                            Gerar Documento
                                        </button>
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
    function visibilidadeInput() {
        var x = document.getElementById("selecionaModo");
        if (x.options[x.selectedIndex].value != "auto") {
            document.getElementById('labelAssinatura').style.display = "block";
        } else {
            document.getElementById('labelAssinatura').style.display = "none";
        }
    }
</script>

<style>
  #labelAssinatura {
    background: gray;
    color: #F2F2F2;
    text-transform: uppercase;
    display: block;
    text-align: center;
    cursor: pointer;
  }

  #labelAssinatura:hover {
    color: #333;
    background: #ced4da;
  }
</style>

</html>