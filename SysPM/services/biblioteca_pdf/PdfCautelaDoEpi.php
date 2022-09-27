<?php

session_start();
include("../../db/Conexao.php");

$data = date('d/m/Y');
$uuid = md5(md5(time()));

$oficial = $_POST['oficial'];
$data_geracao = $data;
$carteirinha = $uuid .'.pdf';

$sql = "INSERT INTO `cautela_do_epi`(`id`, `data_geracao`, `oficial`, `documento`) VALUES (null,'$data_geracao','$oficial','$carteirinha')";

$result = mysqli_query($conexao, $sql);

$foto = $_FILES['assinaturafile']['name'];
$novo_nome = md5(time()) . "_" . $foto;
$diretorio = "assinaturas/";
move_uploaded_file($_FILES['assinaturafile']['tmp_name'], $diretorio . $novo_nome);

if ($foto == '') {
  $novo_nome = "default.jpeg";
}

require_once __DIR__ . '/vendor/autoload.php';

  $documento = '
    <style>

      p {font-family:Arial;font-size:11.000000px;font-weight:bold;color:#000000;}
      table, td, th, tfoot {border:solid 1px #000; padding:5px;}
      th {width:100%;background-color:#999;}
      caption {font-size:x-large;}
      colgroup {background:#F60;}
      .coluna1 {background:#F66;}
      .coluna2  {background:#F33;}
      .coluna3  {background:#F99;}
      
    </style>

    <div class="container" style="width:100%;display:flex;flex-wrap: nowrap;justify-content: space-between;">
      
      <table>

        <tr>

          <td><img style="width:15%;" src="../../img/brasao-pm-pa2.png"></td>

          <td style="width:70%;text-align:center;">

            <p>GOVERNO DO ESTADO DO PARÁ </p>

            <p>SECRETARIA DE ESTADO DE SEGURANÇA PÚBLICA</p>

            <p>E DEFESA SOCIAL</p>

            <p>POLÍCIA MILITAR DO PARÁ</p>

            <p>7º BATALHÃO DA PM</p>

            <hr>

            <h2 style="text-align:center">COMPROVANTE DE CAUTELA DO EPI </h2>

            <br>

            <p>DATA DE EMISSÃO</p>

            <p>' . $data . '</p>

            <br>

            <p>ID: ' . $uuid . '</p>

          </td>

          <td><img style="width:15%;" src="../../img/logo2.png"></td>

        </tr>

      </table>

    </div>
   
    <div>

      <hr><br>

      <table>

        <tr>

          <td style="border: 0;padding:0;"><b>ARMAS :</b></td>

          
          <td style="border: 0;padding:0;text-transform:uppercase;"> ' . $_POST['obj2'] . '</td>
        </tr>

        <tr>

          
          <td style="border: 0;padding:0;"><b>MUNIÇÕES :</b></td>
          
          <td style="border: 0;padding:0;text-transform:uppercase;"> ' . $_POST['obj3'] . '</td>
        
        </tr>

        <tr>

          <td style="border: 0;padding:0;"><b>EQUIPAMENTOS :</b></td>

          <td style="border: 0;padding:0;text-transform:uppercase;"> ' . $_POST['obj'] . '</td>
        
        </tr>

      </table>

      <hr>

      <table border="1" style="width:100%"> 

        <tr>     

          <th style="font-size: 15px; ">Parte</th>

        </tr>

        <tr>

          <td style="text-align:center; font-size: 12px; padding: 1em;">' . $_POST['parte'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Termo</th>

        </tr>

        <tr>

          <td style="text-align:center; font-size: 12px; padding: 1em;">' . $_POST['termo'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Declaração</th>

        </tr>

        <tr>

          <td style="text-align:center; font-size: 12px; padding: 1em;">' . $_POST['declaracao'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Oficial</th>

        </tr>

        <tr>

          <td style="text-align:center; font-size: 12px; padding: 1em;">' . $_POST['oficial'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Assinatura</th>

        </tr>

        <tr>

          <td style="text-align:center; font-size: 12px; padding: 1em;">

            <img style="max-height: 40px;" src='.$diretorio.$novo_nome.'>

          </td>       
        
        </tr>

      </table>

    </div>
  ';

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML($documento);

$mpdf->charset_in = 'UTF-8';

$mpdf->Output('doc/cautelas_do_epi/' . $uuid . '.pdf', 'f');

$mpdf->Output('doc/cautelas_do_epi/' . $uuid . '.pdf', 'i'); // F => salvar / D => baixar / i => abrir
