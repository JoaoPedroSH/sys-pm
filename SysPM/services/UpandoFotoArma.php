<?php

session_start();
include("../db/Conexao.php");

$id = $_POST['idArmaFoto'];
$tipo =  $_POST['tipoArmaFoto'];

if (isset($_FILES['foto_arma'])) {
    $foto = $_FILES['foto_arma']['name'];
    $novo_nome = md5(time()) . "_" . $foto;
    $diretorio = "store/img/armas/";
    move_uploaded_file($_FILES['foto_arma']['tmp_name'], $diretorio . $novo_nome);

    if ($tipo == 'gto') {
        $sql1 = "UPDATE `armas_gto` SET  `foto`='$novo_nome' WHERE `id`='$id'";
    } else {
        $sql1 = "UPDATE `armas_ord` SET  `foto`='$novo_nome' WHERE `id`='$id'";
    }
    $result08 = mysqli_query($conexao, $sql1);

    if ($result08 == 1 && $tipo == 'gto') {
        //criando sessão caso tenha success_edit com sucesso
        $_SESSION['success_edit'] = true;
        header('Location: ../pages/adm/consulta_armas_gto.php');
    } else if ($result08 == 1 && $tipo != 'gto') {
        header('Location: ../pages/adm/consulta_armas_ordinario.php');
    } else {
        $_SESSION['error_edit'] = true;
    }
}
