<?php
session_start();

if (isset($_POST['n_serie'])) {

  include('../db/Conexao.php');

  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $n_serie = $_POST['n_serie'];
  $patrimonio = $_POST['patrimonio'];
  $localizacao = $_POST['localizacao'];
  $situacao = $_POST['situacao'];
  $cautela = $_POST['cautela'];
  $observacao = $_POST['observacao'];
  $data_inspecao = $_POST['data_inspecao'];

  $foto = $_FILES['foto']['name'];
  $novo_nome = md5(time()) . "_" . $foto;
  $diretorio = "store/img/armas/";
  move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome);

  if ($_POST['cadastro'] == 'gto') {

    $tipo = 'gto';
    $data_atual = date('d/m/Y');

    $query = "INSERT INTO `armas_gto` (`id`, `foto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`,`situacao`, `cautela`, `data_inspecao`, `obs`) VALUES (null,'$novo_nome','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$data_inspecao','$observacao')";

    $query1 = "INSERT INTO `historico_armas` (`id`, `n_serie`, `localizacao`, `cautela`, `data_atual`, `tipo_inventario`) VALUES (null,'$n_serie','$localizacao','$cautela','$data_atual', '$tipo')";

  } else {

    $tipo = 'ord';
    $data_atual = date('d/m/Y');

    $query = "INSERT INTO `armas_ord` (`id`, `foto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`,`situacao`, `cautela`, `data_inspecao`, `obs`) VALUES (null,'$novo_nome','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$data_inspecao','$observacao')";

    $query1 = "INSERT INTO `historico_armas` (`id`, `n_serie`, `localizacao`, `cautela`, `data_atual`, `tipo_inventario`) VALUES (null,'$n_serie','$localizacao','$cautela','$data_atual','$tipo')";
  }


  $result = mysqli_query($conexao, $query);
  $result1 = mysqli_query($conexao, $query1);

  if ($result > 0 && $result1 > 0 ) {
    $_SESSION['success_created'] = true;
    header('Location: ../pages/adm_arm/cadastro_armas.php');
  } else {
    $_SESSION['error_created'] = true;
  }
}
