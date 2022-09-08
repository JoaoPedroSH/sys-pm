<?php

session_start();
include("../db/Conexao.php");

//recebendo valores via metodo post
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$serie =  $_POST['serie'];
$serie_antiga = $_POST['serie2'];
$patrimonio =  $_POST['patrimonio'];
$localizacao =   $_POST['localizacao'];
$situacao = $_POST['situacao'];
$cautela =  $_POST['cautela'];
$tipo =  $_POST['tipo'];
$obs = $_POST['obss'];
$id = $_POST['id'];
$alteracao = $_POST['tipoedicao'];
$data = date("d/m/Y");

if (isset($_FILES['fotoarma'])) {
  $foto1 = $_FILES['fotoarma']['name'];
  $extensao = strtolower(pathinfo($foto1, PATHINFO_EXTENSION));
  $novo_nome = md5(time()) . "." . $extensao;
  $diretorio = "fotos_armas/";
  move_uploaded_file($_FILES['fotoarma']['tmp_name'], $diretorio . $novo_nome);
  if ($tipo == 'gto') {
    $sql1 = "UPDATE `armas_gto` SET  `foto`='$foto1' WHERE `id`='$id'";
  } else {
    $sql1 = "UPDATE `armas_ord` SET  `foto`='$foto1' WHERE `id`='$id'";
  }
  $result08 = mysqli_query($conexao, $sql1);
}


if ($alteracao == "mudanca") {
  $sql = "INSERT INTO `historico_armas`(`id`, `tipo`, `modelo`, `n_serie`, `localizacao`, `cautela`, `data_atual`) VALUES (null,'$tipo','$modelo','$serie','$localizacao','$cautela','$data')";
} elseif ($alteracao == "correcao") {
  $sql = "UPDATE `historico_armas` SET  `tipo`='$tipo',`modelo`='$modelo',`n_serie`='$serie',`localizacao`='$localizacao',`cautela`='$cautela' WHERE `n_serie`='$serie_antiga' ";
}


$result05 = mysqli_query($conexao, $sql);


echo  $sql;

if ($tipo == "gto") {
  //query


  $data_atual = date('d/m/Y');
  $query = "UPDATE `armas_gto` SET  `marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',
      `patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`obs`='$obs'
      WHERE `id`='$id'";


  $result = mysqli_query($conexao, $query);


  if ($result == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/consulta_armas_gto.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
} else {

  $data_atual = date('d/m/Y');
  $query = "UPDATE `armas_ord` SET  `marca`='$marca',`modelo`='$modelo',`n_serie`='$serie',
      `patrimonio`='$patrimonio',`localizacao`='$localizacao',`situacao`='$situacao',`cautela`='$cautela',`obs`='$obs'
      WHERE `id`='$id'";



  $result01 = mysqli_query($conexao, $query);



  if ($result01 == 1) {
    //criando sessão caso tenha success_edit com sucesso
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/consulta_armas_ordinario.php');
  } else {
    //se der errado criando uma sessão
    $_SESSION['error_edit'] = true;
  }
}
