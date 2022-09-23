<?php
session_start();
include("../db/Conexao.php");

$user =  $_POST['user'];
$senha = $_POST['senha'];
$acesso =  $_POST['acesso'];
$id = $_POST['id'];

if (isset($user)) {

  $query = "UPDATE `usuario` SET  `user`= '$user',`senha`='$senha',`tipo_user`='$acesso' WHERE id_usuario='$id'";

  $result = mysqli_query($conexao, $query);

  if ($result == 1) {
    $_SESSION['success_edit'] = true;
    header('Location: ../pages/adm/permissao.php');
  } else {
    $_SESSION['error_edit'] = true;
  }
}
