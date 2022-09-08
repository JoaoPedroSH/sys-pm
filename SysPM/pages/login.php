<?php

session_start();

//Verificando se houver POST
if (isset($_POST['usuario'])) {

    //conexao com banco
    include('../db/Conexao.php');

    //receber dados do login
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];

    //dados para historico
    $timestamp = mktime(date("H") - 3, date("i"), date("s"), 0);
    $data_en = date('d/m/Y');
    $hora_en = date('H:i:s', $timestamp);

    //comando sql para o banco
    $query = "SELECT * FROM `usuario` WHERE `user` = '$user' AND `senha` = '$senha' AND `tipo_user` LIKE '$tipo'";

    //execultando $query
    $result = mysqli_query($conexao, $query);

    //inserindo dados no histórico
    $queryHis = "INSERT INTO historico_acesso (id, user, tipo_user, data_entrada, hora_entrada, hora_saida) VALUES (null,'$user','$tipo','$data_en','$hora_en','$hora_sa')";

    //execultando $query
    $resultHis = mysqli_query($conexao, $queryHis);

    //pegando a quantidade de linhas
    $row = mysqli_num_rows($result);

    // Verificando se acho algo
    if ($row > 0) {

        //verificando o tipo de usuário
        if ($_POST['tipo'] == "adm") {

            //criando sesão com     
            $_SESSION['adm'] = true;

            //redirecionado user
            header("location:adm/home.php");
        }
    } else {

        echo "<script>alert('Usuário ou Senha inválidos')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Alterar Favicon e Título do Site -->
    <?php include('layouts/title_e_favicon.html') ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/Login.css">

    <style>
        body {
            height: 100vh;
            background: #043591 center center no-repeat;
            background-size: cover;
        }

        .estilizacao {
            max-width: 420px;
            background-color: #fff;
            border-radius: 10px;
            margin-top: 70px;
            opacity: 0.99;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -60%);
        }
    </style>

</head>

<body class="text-center vsc-initialized">

    <div class="col-6 pb-3 estilizacao">
        <form method="POST" action="" class="form-signin">
        <strong style=" font-size:100px; color: red;" block>Sys</strong><strong style=" font-size:100px; color: blue;" block>PM</strong>
            
            <br>
            <br>

            <div>
                <label class="mb-1"><b> Tipo de Permissão </b></label>
            </div>

            <label><input type="radio" name="tipo" value="armeiro" required=""> Armeiro </label>
            <label> </label>
            <label><input type="radio" name="tipo" value="adm"> Administrador </label>

            <br>
            <br>
            <input type="text" name="usuario" class="form-control" id="inputUser" placeholder="Usuario" style="text-align: center;" required="">

            <div class="invalid-feedback">
                É obrigatório inserir um e-mail válido.
            </div>

            <input type="password" name="senha" id="inputPassword" class="form-control" style="margin-top: 5px;  text-align: center;" placeholder="Senha" required="">
            <button class="btn btn-lg btn-primary btn-block btn-outline-danger" id="btnlogin" type="submit" value="Enviar" name="enviar">Entrar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
                </svg></button>
        </form>

        <hr>

        <div class="col-md-12" style="align-items: center;">
        <img  src="../img/brasao-pm-pa.png"  alt="" width="55" height="65">
            <img src="../img/marcauepa.png"  alt="" width="120" height="70">
            <p class="mt-4 mb-3 text-muted"><b>Copyright © 2022 <a href="https://www.uepa.br/">UEPA</a>.</b></p>
        </div>
    </div>

</body>

</html>