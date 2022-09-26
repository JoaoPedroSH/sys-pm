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
    <meta charset="utf-8">

    <!-- Favicon -->
    <?php include('../layouts/title_e_favicon.html') ?>

    <!-- Estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <!-- Cdn's -->
    <script src="../../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="padding-top: 1px">

    <!-- Templete Navbar -->
    <?php include('../layouts/navbar_superior.html') ?>

    <div class="container-fluid" style="margin-top: 3vh;">

        <div class="row">

            <!-- Templete Sidebar -->
            <?php include('../layouts/navbar_lateral.html') ?>

            <div id="inventario" class="corpo-painel col-md-10" style="background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
                <div class="table-responsive pt-3" style="min-width: 480px;">
                    <h2 style="text-align: center;"><u>Inventário Geral</u></h2>
                    <br>

                    <!-- Formulário de geração do documento -->
                    <form action="../../services/biblioteca_pdf/PdfInventarioGeral.php" method="POST" target="_blank" enctype="multipart/form-data">
                        <div class="col-md-12" style="display: flex;width: 100%;">

                            <!-- Filtro da Tabela -->
                            <input style="width:40%; box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">

                            <!-- Botão de ação da tabela -->
                            <div class="col-md-8" style="text-align: right;">
                                <button type="submit" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 20 20">
                                        <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                        <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                    </svg>
                                    Imprimir
                                </button>
                            </div>

                        </div>

                        <!-- Input que valida a impressão no service -->
                        <input type="hidden" name="imprimir" value="imprimir">
                        <br>

                        <!-- GET ARMAS GTO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">ARMAS GTO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>

                                <th> # </th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Nº Série</th>
                                <th>Patrimônio</th>
                                <th>Localização</th>
                                <th>Situação</th>
                                <th>Cautela</th>
                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM armas_gto";
                            $result = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $result->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?php echo $linhas['marca'] ?></td>
                                        <td><?php echo $linhas['modelo'] ?></td>
                                        <td><?php echo $linhas['n_serie'] ?></td>
                                        <td><?php echo $linhas['patrimonio'] ?></td>
                                        <td><?php echo $linhas['localizacao'] ?></td>
                                        <td><?php echo $linhas['situacao'] ?></td>
                                        <td><?php echo $linhas['cautela'] ?></td>
                                    </tr>
                                </tbody>

                            <?php

                            $x++;
                            }
                            ?>
                        </table>

                        <!-- GET ARMAS ORDINÁRIO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">ARMAS ORDINÁRIO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>
                                <th> # </th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Nº Série</th>
                                <th>Patrimônio</th>
                                <th>Localização</th>
                                <th>Situação</th>
                                <th>Cautela</th>
                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM armas_ord";
                            $resultvba = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $resultvba->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?php echo $linhas['marca'] ?></td>
                                        <td><?php echo $linhas['modelo'] ?></td>
                                        <td><?php echo $linhas['n_serie'] ?></td>
                                        <td><?php echo $linhas['patrimonio'] ?></td>
                                        <td><?php echo $linhas['localizacao'] ?></td>
                                        <td><?php echo $linhas['situacao'] ?></td>
                                        <td><?php echo $linhas['cautela'] ?></td>

                                    </tr>
                                </tbody>

                            <?php
                            $x++;
                            }
                            ?>  
                        </table>

                        <!-- GET MUNIÇÃO GTO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">MUNIÇÕES GTO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>
                                <th> # </th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Validade</th>
                                <th>Tipo </th>
                                <th>Quantidade</th>
                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM municao_gto";
                            $result = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $result->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?php echo $linhas['marca'] ?></td>
                                        <td><?php echo $linhas['modelo'] ?></td>
                                        <td><?php

                                            $date = date("d/m/Y", strtotime($linhas['validade']));
                                            echo  $date;
                                            ?></td>
                                        <td>
                                            <?php echo $linhas['tipo']    ?>
                                        </td>
                                        <td><?php echo $linhas['quantidade'] ?></td>

                                    </tr>
                                </tbody>

                            <?php
                            $x++;
                            }
                            ?>    
                        </table>

                        <!-- GET MUNIÇÃO ORDINÁRIO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">MUNIÇÕES ORDINÁRIO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>

                                <th> # </th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Validade</th>
                                <th>Tipo </th>
                                <th>Quantidade</th>
                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM municao_ord";
                            $result = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $result->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?php echo $linhas['marca'] ?></td>
                                        <td><?php echo $linhas['modelo'] ?></td>
                                        <td><?php
                                            $date = date("d/m/Y", strtotime($linhas['validade']));
                                            echo  $date;
                                            ?></td>
                                        <td>
                                            <?php echo $linhas['tipo'] ?>
                                        </td>
                                        <td><?php echo $linhas['quantidade'] ?></td>
                                    </tr>
                                </tbody>

                            <?php
                            $x++;
                            }
                            ?>    
                        </table>

                        <!-- GET EQUIPAMENTOS GTO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">EQUIPAMENTOS GTO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>

                                <th> # </th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Nº Série</th>
                                <th>Patrimônio</th>
                                <th>Localização</th>
                                <th>Situação</th>
                                <th>Cautela</th>
                                <th>Validade</th>
                                <th>Nível</th>
                                <th>Tamanho</th>
                                <th>Fabricação</th>

                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM  equip_gto";
                            $result = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $result->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?php echo $linhas['tipo'] ?></td>
                                        <td><?php echo $linhas['marca'] ?></td>
                                        <td><?php echo $linhas['modelo'] ?></td>
                                        <td><?php echo $linhas['n_serie'] ?></td>
                                        <td><?php echo $linhas['patrimonio'] ?></td>
                                        <td><?php echo $linhas['localizacao'] ?></td>
                                        <td><?php echo $linhas['situacao'] ?></td>
                                        <td><?php echo $linhas['cautela'] ?></td>
                                        <td><?php $dat01 = date("d/m/Y", strtotime($linhas['validade']));
                                            echo  $dat01; ?></td>
                                        <td><?php echo $linhas['nivel'] ?></td>
                                        <td><?php echo $linhas['tamanho'] ?></td>
                                        <td><?php $date02 = date("d/m/Y", strtotime($linhas['fabricacao']));
                                            echo  $date02; ?></td>

                                    </tr>
                                </tbody>

                            <?php
                            $x++;
                            }
                            ?>   
                        </table>

                        <!-- GET EQUIPAMENTOS ORDINÁRIO -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <h4 style="text-align: center; background-color: #ABB2B9;">EQUIPAMENTOS ORDINÁRIO</h4>
                                </tr>
                            </thead>
                            <thead>
                                <style>
                                    th,
                                    td {
                                        text-align: center;
                                    }
                                </style>

                                <th> # </th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Nº Série</th>
                                <th>Patrimônio</th>
                                <th>Localização</th>
                                <th>Situação</th>
                                <th>Cautela</th>
                                <th>Validade</th>
                                <th>Nível</th>
                                <th>Tamanho</th>
                                <th>Fabricação</th>

                            </thead>

                            <?php
                            include('../../db/Conexao.php');
                            $query = "SELECT  * FROM  equip_ord";
                            $result = mysqli_query($conexao, $query);
                            $x = 1;
                            while ($linhas = $result->fetch_assoc()) {
                            ?>

                                <tbody id="myTable">
                                    <tr>
                                        <td> <?= $x ?> </td>
                                        <td> <?php echo $linhas['tipo'] ?> </td>
                                        <td> <?php echo $linhas['marca'] ?> </td>
                                        <td> <?php echo $linhas['modelo'] ?> </td>
                                        <td> <?php echo $linhas['n_serie'] ?> </td>
                                        <td> <?php echo $linhas['patrimonio'] ?> </td>
                                        <td> <?php echo $linhas['localizacao'] ?> </td>
                                        <td> <?php echo $linhas['situacao'] ?> </td>
                                        <td> <?php echo $linhas['cautela'] ?> </td>
                                        <td> <?php $dat01 = date("d/m/Y", strtotime($linhas['validade']));
                                                echo  $dat01; ?> </td>
                                        <td> <?php echo $linhas['nivel'] ?> </td>
                                        <td> <?php echo $linhas['tamanho'] ?> </td>
                                        <td> <?php $date02 = date("d/m/Y", strtotime($linhas['fabricacao']));
                                                echo  $date02; ?> </td>
                                    </tr>
                                </tbody>
                            <?php
                                $x++;
                            }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

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

</body>

</html>