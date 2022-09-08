<?php

session_start();

$data = date('d/m/Y');

$nomeassinatura = $_POST['nome'];

$foto = $_FILES['assinatura']['name'];
$extensao = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$novo_nome = $$nomeassinatura . "." . $extensao;
$diretorio = "assinaturas/";
$caminho = $diretorio . $nomeassinatura ;
move_uploaded_file($_FILES['assinatura']['tmp_name'], $diretorio . $novo_nome);

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

            <p>ID: ' . md5(md5($data)) . '</p>

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

          <th style="font-size: 15px; ">Parte:</th>

        </tr>

        <tr>

          <td style="text-align:justify; font-size: 12px; padding: 1em;">' . $_POST['parte'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Termo:</th>

        </tr>

        <tr>

          <td style="text-align:justify; font-size: 12px; padding: 1em;">' . $_POST['termo'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Declaração:</th>

        </tr>

        <tr>

          <td style="text-align:justify; font-size: 12px; padding: 1em;">' . $_POST['declaracao'] . '</td>       
        
        </tr>

        <tr>

          <th style="font-size: 15px; ">Assinatura:</th>

        </tr>

        <tr>

          <td style="text-align:justify; font-size: 12px; padding: 1em;">' . $_POST['assinatura'] . '</td>       
        
        </tr>

      </table>

    </div>
  ';

$nomedoc = md5(date('d/m/Y \- H:i:s'));

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML($documento);

$mpdf->charset_in = 'UTF-8';

$mpdf->Output('doc/cautelas_do_epi/' . $nomedoc . '.pdf', 'f'); // F => salvar / D => baixar / i => abrir

header('Location: ../../pages/adm/caterinha_epi.php');