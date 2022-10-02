<?php
session_start();

//verifando se foi criando a sessão
if (!isset($_SESSION['adm'])) {

    //redirecionando para login
    header("location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">

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
    <!-- INCLUSÃO DOS NAV'S -->
    <?php include('../layouts/navbar_superior.html') ?>

    <div class="container-fluid" style="margin-top: 3vh;">

        <div class="row">

            <?php include('../layouts/navbar_lateral.html') ?>

            <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
                <!-- TABELA PARA CONSULTA -->
                <div class="table table-hover-responsive pt-3" style="min-width: 480px;">

                    <h2 style="text-align: center;"><u>Histórico de Acesso</u></h2>
                    <br>

                    <!-- FILTRO -->
                    <div class="col-md-12 justify-content-center" style="display: flex;margin: 0 0 5px;">
                        <input style="width: 40%; box-shadow: 1,5px 1,5px 1,5px 1,5px black;" class="form-control" id="myInput" type="text" placeholder="Buscar...">
                    </div>
                    <br>

                    <br>

                    <table class="table table-hover table-bordered table-striped">

                        <thead>

                            <style>
                                th,

                                td {

                                    text-align: center;

                                }
                            </style>

                            <th> # </th>

                            <th>NOME DE USUÁRIO</th>

                            <th>TIPO DE PERMISSÃO</th>

                            <th>DATA DE ACESSO</th>

                            <th>HORÁRIO DE ENTRADA</th>

                            <th>HORÁRIO DE SAÍDA</th>

                        </thead>

                        <!-- PHP PARA LISTA -->
                        <?php

                        //INCLUINDO CONEXÃO COM O BANCO
                        include('../../db/Conexao.php');

                        //QUERY PARA EXECUÇÃO 
                        $query = "SELECT  * FROM historico_acesso";

                        $result = mysqli_query($conexao, $query);

                        $x = 1;

                        //COLOCANDO RESULTADOS NO ARRAY
                        while ($linhas = $result->fetch_assoc()) {

                        ?>


                            <!-- LINHAS DA TABELA -->
                            <tbody id="myTable">

                                <tr>

                                    <td><?= $x ?></td>

                                    <td><?php echo $linhas['user'] ?></td>

                                    <td><?php echo $linhas['tipo_user'] ?></td>

                                    <td><?php echo $linhas['data_entrada'] ?></td>

                                    <td><?php echo $linhas['hora_entrada'] ?></td>

                                    <td><?php echo $linhas['hora_saida'] ?></td>

                                    </td>

                                </tr>

                            <?php

                            $x++;
                            //FINALIZANDO LAÇO
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

<!-- BUSCA DA TABELA -->
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