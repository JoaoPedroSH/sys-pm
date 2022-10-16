<?php
/* CRiando e VErificando sessão */
session_start();

if (!isset($_SESSION)) {
    header("location:../login.php");
}

include_once "../../db/Conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <!-- Favicon -->
    <?php include '../layouts/title_e_favicon.html' ?>

    <!-- Estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <style>
        .corpo-painel {
            height: auto;
            background: #ABB2B9;
            background-size: cover;
        }
    </style>

    <!-- Cdn's -->
    <script src="../../js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body style="background-color: Black">

    <!-- Templete Navbar -->
    <?php include '../layouts/navbar_superior.html' ?>

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

            <!-- Main -->
            <div class="corpo-painel col-md-10" style="position: static; background-color:#F2F2F2; background-size: cover;min-height: 97vh; height: auto;">
                <br><br><br>

                <!-- Carousel Geral -->
                <div id="carouselInformationGeral" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <!-- Cartão de Estatísticas Geral -->
                            <div class="container" style="background-color: #b22222; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                <div class="row" style="justify-content: center; background-color: #dc143c; border-radius: 5px;">
                                    <h1 style="color: white;">GERAL</h1>
                                </div>
                                <br>
                                <div class="row" style="justify-content: center;">
                                    <div class="card-deck col-md-11">
                                        <div class="card border-danger">
                                            <div class="card-body text-danger">

                                                <?php
                                                //COUNT ARMAS GERAL
                                                $queryArmaOrdGeral = "SELECT COUNT(*) AS arma_geral FROM armas_ord";
                                                $resultArmaOrdGeral = mysqli_query($conexao, $queryArmaOrdGeral);
                                                $armasOrdGeral = $resultArmaOrdGeral->fetch_assoc();
                                                $queryArmaGtoGeral = "SELECT COUNT(*) AS arma_geral FROM armas_gto";
                                                $resultArmaGtoGeral = mysqli_query($conexao, $queryArmaGtoGeral);
                                                $armasGtoGeral = $resultArmaGtoGeral->fetch_assoc();

                                                $totalArmas = $armasOrdGeral['arma_geral'] + $armasGtoGeral['arma_geral'];

                                                $parcialArmaOrd = $armasOrdGeral['arma_geral'];
                                                $parcialArmaGto = $armasGtoGeral['arma_geral'];

                                                ?>

                                                <h1 class="card-title"><?= $totalArmas ?></h1>
                                                <h3 class="card-text">Armas</h3>

                                            </div>
                                        </div>

                                        <div class="card border-danger">
                                            <div class="card-body text-danger">

                                                <?php
                                                //COUNT MUNIÇÃO GERAL
                                                $queryMunOrdGeral = "SELECT COUNT(*) AS mun_geral FROM municao_ord";
                                                $resultMunOrdGeral = mysqli_query($conexao, $queryMunOrdGeral);
                                                $munOrdGeral = $resultMunOrdGeral->fetch_assoc();
                                                $queryMunGtoGeral = "SELECT COUNT(*) AS mun_geral FROM municao_gto";
                                                $resultMunGtoGeral = mysqli_query($conexao, $queryMunGtoGeral);
                                                $munGtoGeral = $resultMunGtoGeral->fetch_assoc();

                                                $totalMunicao = $munOrdGeral['mun_geral'] + $munGtoGeral['mun_geral'];

                                                $parcialMunOrd = $munOrdGeral['mun_geral'];
                                                $parcialMunGto = $munGtoGeral['mun_geral'];

                                                ?>

                                                <h1 class="card-title"><?= $totalMunicao ?></h1>
                                                <h3 class="card-text">Munições</h3>

                                            </div>
                                        </div>
                                        <div class="card border-danger">
                                            <div class="card-body text-danger">

                                                <?php
                                                //COUNT EQUIPAMENTO GERAL
                                                $queryEquipOrdGeral = "SELECT COUNT(*) AS equip_geral FROM equip_ord";
                                                $resultEquipOrdGeral = mysqli_query($conexao, $queryEquipOrdGeral);
                                                $equipOrdGeral = $resultEquipOrdGeral->fetch_assoc();
                                                $queryEquipGtoGeral = "SELECT COUNT(*) AS equip_geral FROM equip_gto";
                                                $resultEquipGtoGeral = mysqli_query($conexao, $queryEquipGtoGeral);
                                                $equipGtoGeral = $resultEquipGtoGeral->fetch_assoc();

                                                $totalEquipamento =  $equipOrdGeral['equip_geral'] + $equipGtoGeral['equip_geral'];

                                                $parcialEquipOrd = $equipOrdGeral['equip_geral'];
                                                $parcialEquipGto = $equipGtoGeral['equip_geral'];

                                                ?>

                                                <h1 class="card-title"><?= $totalEquipamento ?></h1>
                                                <h3 class="card-text">Equipamentos</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container" style="background-color: #b22222; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                <div class="row" style="justify-content: center;align-items:center;">
                                    <div class="card-deck col-md-5">
                                        <div class="card border-danger">
                                            <div id="piechart_3d"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselInformationGeral" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" id="styleGeral" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselInformationGeral" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" id="styleGeral" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <br><br>

                    <!-- Carousel ORD -->
                    <div id="carouselInformationOrd" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- Cartão de Estatística Inventário Ordinário -->
                                <div class="container" style="background-color: #000080; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                    <div class="row" style="justify-content: center; background-color: #104E8B;">
                                        <h1 style="color: white;">ORDINÁRIO</h1>
                                    </div>
                                    <br>
                                    <div class="row" style="justify-content: center;">
                                        <div class="card-deck col-md-11">
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT ARMAS ORDINARIO
                                                    $queryArmaOrd = "SELECT COUNT(*) AS total FROM armas_ord";
                                                    $resultArmaOrd = mysqli_query($conexao, $queryArmaOrd);
                                                    $armasOrd = $resultArmaOrd->fetch_assoc();

                                                    $totalArmaOrd = $armasOrd['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalArmaOrd ?></h1>
                                                    <h3 class="card-text">Armas</h3>

                                                </div>
                                            </div>
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT MUNIÇÃO ORDINARIO
                                                    $queryMunOrd = "SELECT COUNT(*) AS total FROM municao_ord";
                                                    $resultMunOrd = mysqli_query($conexao, $queryMunOrd);
                                                    $munOrd = $resultMunOrd->fetch_assoc();

                                                    $totalMunOrd = $munOrd['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalMunOrd ?></h1>
                                                    <h3 class="card-text">Munições</h3>

                                                </div>
                                            </div>
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT MUNIÇÃO ORDINARIO
                                                    $queryEquipOrd = "SELECT COUNT(*) AS total FROM equip_ord";
                                                    $resultEquipOrd = mysqli_query($conexao, $queryEquipOrd);
                                                    $equipOrd = $resultEquipOrd->fetch_assoc();

                                                    $totalEquipOrd = $equipOrd['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalEquipOrd ?></h1>
                                                    <h3 class="card-text">Equipamentos</h3>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container" style="background-color: #000080; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                    <div class="row" style="justify-content: center;align-items:center;">
                                        <div class="card-deck col-md-5">
                                            <div class="card border-blue">
                                                <div id="columnchart_ord"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselInformationOrd" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" id="styleOrd" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselInformationOrd" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" id="styleOrd" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <br><br>

                    <!-- Carousel GTO -->
                    <div id="carouselInformationGto" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- Cartão de Estatística Inventário Gto -->
                                <div class="container" style="background-color: #000080; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                    <div class="row" style="justify-content: center; background-color: #104E8B;">
                                        <h1 style="color: white;">GTO</h1>
                                    </div>
                                    <br>
                                    <div class="row" style="justify-content: center;">
                                        <div class="card-deck col-md-11">
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT ARMAS GTO
                                                    $queryArmaGto = "SELECT COUNT(*) AS total FROM armas_gto";
                                                    $resultArmaGto = mysqli_query($conexao, $queryArmaGto);
                                                    $armaGto = $resultArmaGto->fetch_assoc();

                                                    $totalArmaGto = $armaGto['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalArmaGto ?></h1>
                                                    <h3 class="card-text">Armas</h3>

                                                </div>
                                            </div>
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT MUNIÇÃO GTO 
                                                    $queryMunGto = "SELECT COUNT(*) AS total FROM municao_gto";
                                                    $resultMunGto = mysqli_query($conexao, $queryMunGto);
                                                    $munGto = $resultMunGto->fetch_assoc();

                                                    $totalMunGto = $munGto['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalMunGto ?></h1>
                                                    <h3 class="card-text">Munições</h3>

                                                </div>
                                            </div>
                                            <div class="card border-primary">
                                                <div class="card-body text-primary">

                                                    <?php
                                                    //COUNT EQUIPAMENTO GTO
                                                    $queryEquipGto = "SELECT COUNT(*) AS total FROM equip_gto";
                                                    $resultEquipGto = mysqli_query($conexao, $queryEquipGto);
                                                    $equipGto = $resultEquipGto->fetch_assoc();

                                                    $totalEquipGto = $equipGto['total'];

                                                    ?>

                                                    <h1 class="card-title"><?= $totalEquipGto ?></h1>
                                                    <h3 class="card-text">Equipamentos</h3>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container" style="background-color: #000080; text-align: center; border-radius: 10px; border-color: black; border-style: double;">
                                    <div class="row" style="justify-content: center;align-items:center;">
                                        <div class="card-deck col-md-5">
                                            <div class="card border-blue">
                                                <div id="columnchart_gto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselInformationGto" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" id="styleGto" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselInformationGto" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" id="styleGto" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
</body>

<script>
    $('.carousel').carousel({
        interval: false
    })
</script>

<!-- Grafico GTO -->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["Copper", 8.94, "#b87333"],
            ["Silver", 10.49, "silver"],
            ["Gold", 19.30, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            width: 400,
            height: 300,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_gto"));
        chart.draw(view, options);
    }
</script>

<!-- Grafico ORD -->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["Copper", 8.94, "#b87333"],
            ["Silver", 10.49, "silver"],
            ["Gold", 19.30, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            width: 400,
            height: 300,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_ord"));
        chart.draw(view, options);
    }
</script>

<!-- Grafico GERAL -->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Inventário'],
            ['Armas Tático', <?= $parcialArmaGto ?>],
            ['Armas Ordinário', <?= $parcialArmaOrd ?>],
            ['Munições Tático', <?= $parcialMunGto ?>],
            ['Munições Ordinário', <?= $parcialMunOrd ?>],
            ['Equipamento Tático', <?= $parcialEquipGto ?>],
            ['Equipamento Ordinário', <?= $parcialEquipOrd ?>]
        ]);

        var options = {
            title: 'Composição do Inventário Geral (%)',
            width: 400,
            height: 300,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>

<!-- Alerta de Backup feito com sucesso -->
<?php
if (isset($_SESSION['fez_backup'])) {
?>
    <script>
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: 'Backup bem sucedido!',
            text: 'Encontre o arquivo de backup em Downloads/Backups_SysPM',
            showConfirmButton: true,
            confirmButtonColor: '#2ECC71',
            timer: 6000
        })
    </script>
<?php
    unset($_SESSION['fez_backup']);
}
?>

<style>
    #styleGeral {
        background-color: #dc3545;
        border-radius: 5px;
    }

    #styleOrd {
        background-color: #007bff;
        border-radius: 5px;
    }

    #styleGto {
        background-color: #007bff;
        border-radius: 5px;
    }
</style>

</html>