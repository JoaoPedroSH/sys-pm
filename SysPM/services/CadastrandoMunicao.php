<?php
session_start();

//verificando se tever submit
if (isset($_POST['tipo'])) {

    //inclundo Conexao do Banco de Dados
    include('../db/Conexao.php');

    //Recebendo Valores do Formulário (Para Edição)
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $validade = $_POST['validade'];
    $quantidade = $_POST['quantidade'];
    $observacao = $_POST['obs'];
    $tipominu = $_POST['tipo'];

    //verificando o tipo de cadastro 
    if ($_POST['cadastro'] == 'gto') {
        //SQl para execultar no Banco (GTO)
        $query = "INSERT INTO municao_gto (id, marca, modelo, validade, quantidade, obs,tipo) VALUES (NULL, '$marca','$modelo','$validade','$quantidade','$observacao',' $tipominu')";
    } else {
        //SQl para execultar no Banco Ordinário()
        $query = "INSERT INTO municao_ord (id, marca, modelo, validade, quantidade, obs,tipo) VALUES (NULL,'$marca','$modelo','$validade','$quantidade','$observacao', ' $tipominu')";
    }
    $cadastrado = "show";
    //execultando $query
    $result = mysqli_query($conexao, $query);


    //vericando se trouxe houve algum cadastro
    if ($result > 0) {
        $_SESSION['success_created'] = $cadastrado;
        header('Location: ../pages/adm/cadastro_municoes.php');
    } else {
        $_SESSION['error_created'] = true;
    }
}
?>
