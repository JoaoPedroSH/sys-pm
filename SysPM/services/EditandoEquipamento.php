<?php
session_start();
include("../db/Conexao.php");

//recendo dado
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$serie =  $_POST['serie'];
$patrimonio =  $_POST['patrimonio'];
$localizacao =   $_POST['localizacao'];
$situacao = $_POST['situacao'];
$cautela =  $_POST['cautela'];
$validade =  $_POST['validade'];
$fabricacao =  $_POST['fabricacao'];
$nivel =  $_POST['nivel'];
$tamanho =  $_POST['tamanho'];
$obs =  $_POST['obs'];
$tipo =  $_POST['tipo'];
$material = $_POST['material'];
$id =  $_POST['id'];

if ($tipo == "gto") {

  $query = "UPDATE `equip_gto` SET `tipo`='$material',`marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',`patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`validade`='$validade',`nivel`='$nivel',`tamanho`='$tamanho',`fabricacao`='$fabricacao',`obs`='$obs'
         WHERE N='$id'";


  echo $query;
  //Execultando Query
  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha cadastrato com sucesso
    $_SESSION['cadastrato'] = true;
    header('Location: ../pages/adm/consulta_equipamento_gto.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['nao_cadastrato'] = true;
  }
} else {

  $query = "UPDATE `equip_ord` SET `tipo`='$material',`marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',`patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`validade`='$validade',`nivel`='$nivel',`tamanho`='$tamanho',`fabricacao`='$fabricacao',`obs`='$obs'
         WHERE N='$id'";

  echo $query;
  //Execultando Query
  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha cadastrato com sucesso
    $_SESSION['cadastrato'] = true;
    header('Location: ../pages/adm/consulta_equipamento_ordinario.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['nao_cadastrato'] = true;
  }
}
