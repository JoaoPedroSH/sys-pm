<?php
session_start();

//verificando se tever submit
if (isset($_POST['modelo'])) {

    //inclundo Conexao do Banco de Dados
    include('../../db/Conexao.php');


    //Recebendo Valores do Formulário (Para Edição)
    $tipo = $_POST['tipo'];
    $material = $_POST['material'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $n_serie = $_POST['n_serie'];
    $patrimonio = $_POST['patrimonio'];
    $localizacao = $_POST['localizacao'];
    $situacao = $_POST['situacao'];
    $cautela = $_POST['cautela'];
    $nivel = $_POST['nivel'];
    $tamanho = $_POST['tamanho'];
    $validade = $_POST['validade'];
    $fabricacao = $_POST['fabricacao'];

    /*$validade = date('d/m/Y',  strtotime($validade));
    $fabricacao = date('d/m/Y',  strtotime($fabricacao));*/

    $obs = $_POST['obs'];

    //verificando o tipo de cadastro 
    if ($tipo == 'gto') {
        //SQl para execultar no Banco (GTO)
        $query = "INSERT INTO `equip_gto`(`id`, `tipo`, `marca`, `modelo`, `n_serie`, `patrimonio`, `localizacao`, `situacao`, `cautela`, `validade`, `nivel`, `tamanho`, `fabricacao`, `obs`) VALUES (NULL,'$material','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela','$validade','$nivel','$tamanho','$fabricacao','$obs')";
    } else {
        //SQl para execultar no Banco Ordinário()
        $query = "INSERT INTO equip_ord (id, tipo, marca, modelo, n_serie, patrimonio, localizacao, situacao, cautela, nivel, tamanho, validade, fabricacao, obs) VALUES (NULL,'$material','$marca','$modelo','$n_serie','$patrimonio','$localizacao','$situacao','$cautela', '$nivel','$tamanho','$validade','$fabricacao','$obs')";
    }
    $cadastrado = "show";


    //execultando $query
    $result = mysqli_query($conexao, $query);


    //vericando se trouxe houve algum cadastro
    if ($result > 0) {
        $_SESSION['sucesso'] = $cadastrado;
    } else {
        echo "<script>alert('Erro ao Realizar Cadastro')</script>";
    }
}
?>