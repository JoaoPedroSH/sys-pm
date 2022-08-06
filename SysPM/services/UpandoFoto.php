<?php
session_start();
include("../db/Conexao.php");

$id = $_POST['id'];
$tipo =  $_POST['tipo'];

if (isset($_FILES['fotoarma'])) {
    $foto1 = $_FILES['fotoarma']['name'];
    $extensao = strtolower(pathinfo($foto1, PATHINFO_EXTENSION));
    $novo_nome = md5(time()) . "." . $extensao;
    $diretorio = "../img/fotos_armas/";
    move_uploaded_file($_FILES['fotoarma']['tmp_name'], $diretorio . $novo_nome);
    if ($tipo == 'gto') {
      $sql1 = "UPDATE `armas_gto` SET  `foto`='$novo_nome' WHERE `id`='$id'";
      $sql2 = "UPDATE `historico_armas` SET  `foto`='$novo_nome' WHERE `id`='$id'";
    } else {
      $sql1 = "UPDATE `armas_ordinario` SET  `foto`='$novo_nome' WHERE `id`='$id'";
      $sql2 = "UPDATE `historico_armas` SET  `foto`='$novo_nome' WHERE `id`='$id'";
    }
    $result08 = mysqli_query($conexao, $sql1, $sql2);
  }
  if($result08==1){
      if($tipo=="gto"){
        $_SESSION['cadastrato'] = true;
        header('Location: ../pages/adm/consulta_armas_gto.php');

      }else{
        $_SESSION['cadastrato'] = true;
        header('Location: ../pages/adm/consulta_armas_ordinario');
      }
  }
