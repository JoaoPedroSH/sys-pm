<?php
session_start();
//VERIFICANDO SE FOI ENVIADO ALGO
if (isset($_POST['n_serie'])) {

  //INCLUINDO CONEXÃO COM O BANCO DE DADOS
  include('../db/Conexao.php');

  //RECEBENDO VALORES DO FORMULÁRIO
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $n_serie = $_POST['n_serie'];
  $patrimonio = $_POST['patrimonio'];
  $localizacao = $_POST['localizacao'];
  $situacao = $_POST['situacao'];
  $cautela = $_POST['cautela'];
  $observacao = $_POST['observacao'];
  $data_inspecao = $_POST['data_inspecao'];
  //UPLOAD FOTO
  $foto = $_FILES['foto']['name'];
  $extensao = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
  $novo_nome = md5(time()) . "." . $extensao;
  $diretorio = "../img/fotos_armas/";
  move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome);

  //VERIFICANDO TIPO DE CADASTRO
  if ($_POST['cadastro'] == 'gto') {
    //ENVIA DADOS PARA BANCO DE ARMAS DO GTO
    $tipo = 'gto';
    $data_atual = date('d/m/Y');
    $query = "INSERT INTO `armas_gto` (`id`, `foto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`,`situacao`, `cautela`, `data_inspecao`, `obs`) VALUES (null,'$novo_nome','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$data_inspecao','$observacao')";

    $query1 = "INSERT INTO `historico_armas` (`id`, `foto`, `situacao`, `patrimonio`, `marca`, `tipo`, `modelo`, `n_serie`, `localizacao`, `cautela`, `data_inspecao`, `data_atual`) VALUES (null,'$novo_nome','$situacao','$patrimonio','$marca','$tipo','$modelo','$n_serie','$localizacao','$cautela','$data_inspecao','$data_atual')";
  } else {
    $tipo = 'ordinario';
    $data_atual = date('d/m/Y');
    //ENVIA DADOS PARA BANCO DE ARMAS DO ORDINÁRIO
    $query = "INSERT INTO `armas_ord` (`id`, `foto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`,`situacao`, `cautela`, `data_inspecao`, `obs`) VALUES (null,'$novo_nome','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$data_inspecao','$observacao')";

    $query1 = "INSERT INTO `historico_armas` (`id`, `foto`, `situacao`, `patrimonio`, `marca`, `tipo`, `modelo`, `n_serie`, `localizacao`, `cautela`, `data_inspecao`, `data_atual`) VALUES (null,'$novo_nome','$situacao','$patrimonio','$marca','$tipo','$modelo','$n_serie','$localizacao','$cautela','$data_inspecao','$data_atual')";
  }
  $cadastrado = "show";
  //EXECUTANDO QUERY
  $result = mysqli_query($conexao, $query);
  $result = mysqli_query($conexao, $query1);

  //VERIFICANDO SE OCORREU O CADASTRO
  if ($result > 0) {
    $_SESSION['sucesso'] = $cadastrado;
    header('Location: ../pages/adm/cadastro_armas.php');
  } else {
    echo "<script>alert('Erro ao Realizar Cadastro')</script>";
  }
}
?>
