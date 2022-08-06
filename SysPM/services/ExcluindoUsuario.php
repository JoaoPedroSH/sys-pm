<?php

session_start();
include("../db/Conexao.php");

$id = $_POST['idexcluir'];



//excluir usuário
if (isset($_POST['idexcluir'])) {

    $sql = "DELETE FROM `usuario` WHERE id_usuario='$id'";


    echo $sql;
    //execultando query
    $result001 = mysqli_query($conexao, $sql);

    if ($result001 == 1) {
        $_SESSION['excluido'] = true;
        header('Location: ../pages/adm/permissao.php');
    }
}
