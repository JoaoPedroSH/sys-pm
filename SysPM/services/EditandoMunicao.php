<?php

session_start();
include("../db/Conexao.php");


//recebendo valores via metodo post
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$validade =  $_POST['validade'];
$quantidade =  $_POST['quantidade'];
$obs = $_POST['obs'];
$id = $_POST['id'];
$tipo = $_POST['tipo'];

if ($tipo == "gto") {
  //queyr
  $query = "UPDATE `municao_gto` SET `marca`='$marca',`modelo`='$modelo',`validade`='$validade',
  `quantidade`='$quantidade',`obs`='$obs'
  WHERE `id`='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm_arm/consulta_municao_gto.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
} else {

  $query = "UPDATE `municao_ord` SET `marca`='$marca',`modelo`='$modelo',`validade`='$validade',
  `quantidade`='$quantidade',`obs`='$obs'
  WHERE `id`='$id'";

  $result01 = mysqli_query($conexao, $query);


  if ($result01 == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm_arm/consulta_municao_ordinario.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
}
