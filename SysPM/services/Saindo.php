<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Logout</title>
</head>

<body>
    <?php
    session_start();

    session_destroy();

    include('../db/Conexao.php');

    $timestamp = mktime(date("H") - 3, date("i"), date("s"), 0);

    $hora_sa = date('H:i:s', $timestamp);

    $queryHis1 = "UPDATE historico_acesso SET hora_saida = '$hora_sa' WHERE id ORDER BY id DESC LIMIT 1";

    $resultHis1 = mysqli_query($conexao, $queryHis1);

    header("Location:../pages/login.php");
    ?>
</body>

</html>