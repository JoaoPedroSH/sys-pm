<?php
session_start();
include("../db/Conexao.php");

$user =  $_POST['user'];
$senha = $_POST['senha'];
$acesso =  $_POST['acesso'];
$id = $_POST['id'];

if (isset($user)) {
  $foto = str_replace(" ", "-", $_FILES['assinaturafile']['name']);
  $novo_nome = md5(time()) . "_" . $foto;
  $diretorio = "store/img/assinaturas_usuarios/";
  move_uploaded_file($_FILES['editassinaturafile']['tmp_name'], $diretorio . $novo_nome);

  $query = "UPDATE `usuario` SET  `user`= '$user',`senha`='$senha',`tipo_user`='$acesso', `assinatura`='$novo_nome' WHERE id_usuario='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/permissao.php');
  } else {
    $_SESSION['error_edit'] = true;
  }
}
