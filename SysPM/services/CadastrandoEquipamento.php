<?php
session_start();

if (isset($_POST['n_serie'])) {

    include('../db/Conexao.php');

    $tipo = $_POST['tipo'];
    $material = $_POST['material'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $n_serie = $_POST['n_serie'];
    $patrimonio = $_POST['patrimonio'];
    $localizacao = $_POST['localizacao'];
    $situacao = $_POST['situacao'];
    $cautela = $_POST['cautela'];
    $nivel = $_POST['nivel'];
    $tamanho = $_POST['tamanho'];
    $validade = $_POST['validade'];
    $fabricacao = $_POST['fabricacao'];
    $obs = $_POST['obs'];

    if ($tipo == 'gto') {

        $query = "INSERT INTO `equip_gto`(`id`, `tipo`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`, `situacao`, `cautela`, `validade`, `nivel`, `tamanho`, `fabricacao`, `obs`) VALUES (NULL,'$material','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$nivel','$tamanho','$validade','$fabricacao','$obs')";
    } else {

        $query = "INSERT INTO `equip_ord`(`id`, `tipo`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`, `situacao`, `cautela`, `nivel`, `tamanho`, `validade`, `fabricacao`, `obs`) VALUES (NULL,'$material','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$nivel','$tamanho','$validade','$fabricacao','$obs')";
    }

    $result = mysqli_query($conexao, $query);

    if ($result > 0) {
        $_SESSION['success_created'] = true;
        header('Location: ../pages/adm/cadastro_equipamentos.php');
    } else {
        $_SESSION['error_created'] = true;
    }
}
