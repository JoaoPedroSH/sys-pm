<?php
session_start();
include("../db/Conexao.php");

$user =  $_POST['user'];
$senha = $_POST['senha'];
$acesso =  $_POST['acesso'];
$id = $_POST['id'];


if (isset($_POST['novouser'])) {

  $foto = str_replace(" ", "-", $_FILES['assinaturafile']['name']);
  $novo_nome = md5(time()) . "_" . $foto;
  $diretorio = "store/img/assinaturas_usuarios/";
  move_uploaded_file($_FILES['assinaturafile']['tmp_name'], $diretorio . $novo_nome);

  $usuarios = $_POST['novouser'];
  $senha = $_POST['newsenha'];
  $tipouser = $_POST['novotipouser'];

  $sql = "INSERT INTO `usuario`(`id_usuario`, `user`, `senha`, `tipo_user`, `assinatura`) VALUES (null,'$usuarios','$senha','$tipouser', '$novo_nome')";

  $result = mysqli_query($conexao, $sql);

  if ($result == 1) {
    $_SESSION['adicionado'] = true;
    header('Location: ../pages/adm/permissao.php');
  }
}
