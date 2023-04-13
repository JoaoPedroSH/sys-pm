<?php
session_start();

//verifando se foi criando a sessão
if (!isset($_SESSION)) {

    //redirecionando para login
    header("location:../login.php");
}

include_once "../../db/Conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

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

    <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>



<body style="background-color: #0a0a0a">

    <?php include('../layouts/navbar_superior.html') ?>

    <div class="container-fluid" style="margin-top: 3vh;">

        <div class="row">

            <?php
            if (isset($_SESSION['arm'])) {
                include '../layouts/navbar_lateral_armeiro.html';
            }

            if (isset($_SESSION['adm'])) {
                include '../layouts/navbar_lateral.html';
            }
            ?>

            <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">

                <div class="table table-hover-responsive pt-3" style="min-width: 480px;">

                    <h2 style="text-align: center;"><u> Equipamentos - Tático </u></h2>

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
                            <th>TIPO</th>
                            <th>MARCA</th>
                            <th>MODELO</th>
                            <th>Nº SÉRIE</th>
                            <th>PRATIMÔNIO</th>
                            <th>LOCALIZAÇÃO</th>
                            <th>SITUAÇÃO</th>
                            <th>CAUTELA</th>
                            <th>NÍVEL</th>
                            <th>TAMANHO</th>
                            <th>VALIDADE</th>
                            <th>FABRICAÇÃO</th>
                            <th>OBS</th>
                            <th>AÇÃO</th>

                        </thead>

                        <?php

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
                                    <td><?php echo $linhas['nivel'] ?></td>
                                    <td><?php echo $linhas['tamanho'] ?></td>
                                    <td><?php $date01 = date("d/m/Y", strtotime($linhas['validade']));
                                        echo  $date01; ?></td>
                                    <td><?php $date02 = date("d/m/Y", strtotime($linhas['fabricacao']));
                                        echo  $date02; ?></td>

                                    <td><button class="btn btn-outline-danger obs" id="<?= $linhas['obs'] ?>">OBS</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEdit" data-id="<?= $linhas['id'] ?>" data-tipo="<?= $linhas['tipo'] ?>" data-modelo="<?= $linhas['modelo'] ?>" data-marca="<?= $linhas['marca'] ?>" data-n_serie="<?= $linhas['n_serie'] ?>" data-patrimonio="<?= $linhas['patrimonio'] ?>" data-localizacao="<?= $linhas['localizacao'] ?>" data-situacao="<?= $linhas['situacao'] ?>" data-cautela="<?= $linhas['cautela'] ?>" data-validade="<?= $linhas['validade'] ?>" data-fabricacao="<?= $linhas['fabricacao'] ?>" data-nivel="<?= $linhas['nivel'] ?> " data-tamanho="<?= $linhas['tamanho'] ?> " data-obs="<?= $linhas['obs'] ?>">Editar</button>
                                    </td>

                                </tr>

                            <?php

                            $x++;
                        }
                            ?>

                            <!-- MODAL EDITAR -->
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
                                            <form action="../../services/EditandoEquipamento.php" method="POST" onsubmit="return  verificar()">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">TIPO</label>
                                                    <input type="text" class="form-control" id="material" name="material">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">MODELO</label>
                                                    <input type="text" class="form-control" id="modelo" name="modelo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">MARCA</label>
                                                    <input type="text" class="form-control" id="marca" name="marca">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">N° SÉRIE</label>
                                                    <input type="text" class="form-control" id="n_serie" name="n_serie">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">PRATIMÔNIO</label>
                                                    <input type="text" class="form-control" id="patrimonio" name="patrimonio">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">LOCALIZAÇÃO</label>
                                                    <input type="text" class="form-control" id="localizacao" name="localizacao">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">SITUAÇÃO</label>
                                                    <input type="text" class="form-control" id="situacao" name="situacao">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">CAUTELA</label>
                                                    <input type="text" class="form-control" id="cautela" name="cautela">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">VALIDADE</label>
                                                    <input type="date" class="form-control" id="validade" name="validade">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">FABRICAÇÃO</label>
                                                    <input type="date" class="form-control" id="fabricacao" name="fabricacao">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label"> NÍVEL</label>
                                                    <input type="text" class="form-control" id="nivel" name="nivel">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label"> TAMANHO</label>
                                                    <input type="text" class="form-control" id="tamanho" name="tamanho">
                                                </div>
                                                <div>
                                                    <label for="message-text" class="col-form-label">OBERVAÇÕES</label><br>
                                                    <textarea id="obs" class="form-control" name="obs" cols="57" rows="2"> </textarea>
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

<!-- VALIDAÇÃO DO MODAL DE EDIÇÃO -->
<script>
    function verificar() {

        var tipo = document.getElementById('material')

        var modelo = document.getElementById('modelo')

        var marca = document.getElementById('marca')

        var serie = document.getElementById('n_serie')

        var patrimonio = document.getElementById('patrimonio')

        var localizacao = document.getElementById('localizacao')

        var situacao = document.getElementById('situacao')

        var cautela = document.getElementById('cautela')

        var validade = document.getElementById('validade')

        var fabricacao = document.getElementById('fabricacao')

        var nivel = document.getElementById('nivel')

        var tamanho = document.getElementById('tamanho')

        var obs = exampleModal.querySelector('obs')

        if (marca.value == "" || serie.value == "" ||
            localizacao.value == "" || situacao.value == ""
        ) {

            alert("Os campos Marca, Nº Serie, Localização e Situação não podem estar em branco")
            return false
        } else {
            return true
        }

    }
</script>

<!-- MANIPULANDO DADOS EDITADOS/EDIÇÃO -->
<script>
    $(document).ready(function() {
        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var material = button.data('tipo');
            var marca = button.data('marca');
            var modelo = button.data('modelo');
            var n_serie = button.data('n_serie');
            var patrimonio = button.data('patrimonio');
            var localizacao = button.data('localizacao');
            var situacao = button.data('situacao');
            var cautela = button.data('cautela');
            var validade = button.data('validade');
            var fabricacao = button.data('fabricacao');
            var nivel = button.data('nivel');
            var tamanho = button.data('tamanho');
            var observacao = button.data('obs');

            $('#id').val(id);
            $('#material').val(material);
            $('#marca').val(marca);
            $('#modelo').val(modelo);
            $('#n_serie').val(n_serie);
            $('#patrimonio').val(patrimonio);
            $('#localizacao').val(localizacao);
            $('#situacao').val(situacao);
            $('#cautela').val(cautela);
            $('#validade').val(validade);
            $('#fabricacao').val(fabricacao);
            $('#nivel').val(nivel);
            $('#tamanho').val(tamanho);
            $('#obs').val(observacao);
        })
    })
</script>

<!-- ALERTA DE OBSERVAÇÕES-->
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
                    confirmButtonColor: '#f8bb86',
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