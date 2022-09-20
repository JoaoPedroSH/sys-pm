<?php

//Criando [Define] para colocar paramentros de conexão com Banco

define('HOST', 'localhost');  //Serve
define('USUARIO', 'root'); // user
define('SENHA', '27072001');  //PassWord
define('DB', 'db_pm'); //NameDataBase


//Fazendo a Conexão e  Colocando em Uma Variável
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar. Erro de acesso ao banco.');

?>