<?php

session_start();
include("../db/Conexao.php");


//recebendo valores via metodo post
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$validade =  $_POST['validade'];
$quantidade =  $_POST['quantidade'];
$obss = $_POST['obss'];
$id = $_POST['id'];
$tipo = $_POST['tipo'];

if ($tipo == "gto") {
  //queyr
  $query = "UPDATE `municao_gto` SET `id`=null,`marca`='$marca',`modelo`='$modelo',`validade`='$validade',
  `quantidade`='$quantidade',`obs`='$obss'
  WHERE `id`='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha cadastrato com sucesso
    $_SESSION['cadastrato'] = true;
    header('Location: ../pages/adm/consulra_municao_gto.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['nao_cadastrato'] = true;
  }
} else {

  $query = "UPDATE `municao_ord` SET `id`=null,`marca`='$marca',`modelo`='$modelo',`validade`='$validade',
  `quantidade`='$quantidade',`obs`='$obss'
  WHERE `id`='$id'";

  $result01 = mysqli_query($conexao, $query);


  if ($result01 == 1) {
    //criando sessão caso tenha cadastrato com sucesso
    $_SESSION['cadastrato'] = true;
    header('Location: ../pages/adm/consulra_municao_ordinario.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['nao_cadastrato'] = true;
  }
}
