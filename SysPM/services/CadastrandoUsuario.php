<?php
session_start();
include("../db/Conexao.php");

$user =  $_POST['user'];
$senha = $_POST['senha'];
$acesso =  $_POST['acesso'];
$id = $_POST['id'];


if (isset($_POST['novouser'])) {

  $usuarios = $_POST['novouser'];
  $senha = $_POST['newsenha'];
  $tipouser = $_POST['novotipouser'];

  $sql = "INSERT INTO `usuario`(`id_usuario`, `user`, `senha`, `tipo_user`) VALUES (null,'$usuarios','$senha','$tipouser')";

  $result = mysqli_query($conexao, $sql);

  if ($result == 1) {
    $_SESSION['adicionado'] = true;
    header('Location: ../pages/adm/permissao.php');
  }
}