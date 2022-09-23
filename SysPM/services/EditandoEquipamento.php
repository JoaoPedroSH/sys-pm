<?php
session_start();
include("../db/Conexao.php");

//recendo dado
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$serie =  $_POST['n_serie'];
$patrimonio =  $_POST['patrimonio'];
$localizacao =   $_POST['localizacao'];
$situacao = $_POST['situacao'];
$cautela =  $_POST['cautela'];
$validade =  $_POST['val'];
$fabricacao =  $_POST['fab'];
$nivel =  $_POST['nivel'];
$tamanho =  $_POST['tamanho'];
$obs =  $_POST['obs'];
$tipo =  $_POST['tipo'];
$material = $_POST['material'];
$id =  $_POST['id'];

if ($tipo == "gto") {

  $query = "UPDATE `equip_gto` SET `tipo`='$material',`marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',`patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`validade`='$validade',`nivel`='$nivel',`tamanho`='$tamanho',`fabricacao`='$fabricacao',`obs`='$obs'
    WHERE `id`='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/consulta_equipamento_gto.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
} else {

  $query = "UPDATE `equip_ord` SET `tipo`='$material',`marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',`patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`validade`='$validade',`nivel`='$nivel',`tamanho`='$tamanho',`fabricacao`='$fabricacao',`obs`='$obs'
         WHERE `id`='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/consulta_equipamento_ordinario.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
}
