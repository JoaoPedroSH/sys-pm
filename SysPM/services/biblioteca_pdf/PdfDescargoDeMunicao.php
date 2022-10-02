<?php
session_start();

$data = date('d/m/Y');
$cautela = $_POST['oficial'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$operacao = $_POST['operacao'];
$observacao = $_POST['obs'];

$uuid = md5(md5($data));

require_once __DIR__ . '/vendor/autoload.php';

  $documento = '

      <style>

        p {font-family:Arial;font-size:11.000000px;font-weight:bold;color:#000000;}
        table, td, th, tfoot {border:solid 1px #000; padding:5px;}
        th, {width:100%;background-color:#999;}
        caption {font-size:x-large;}
        colgroup {background:#F60;}
        .coluna1 {background:#F66;}
        .coluna2  {background:#F33;}
        .coluna3  {background:#F99;}
        #title { width:25%; text-align:center;}
        #info { width:75%; text-align:center;}

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

              <h2 style="text-align:center">EMPREGO DE MUNIÇÃO</h2>

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

      <br>

      <div>

        <table style="width:100%;">    

          <tr>

            <td id="title"><b>Tipo de Munição</b></td>

            <td id="info">' . $tipo . '</td>

          </tr>

          <tr>

            <td id="title"><b>Cautela</b></td>

            <td id="info">' . $cautela . '</td>

          </tr>

          <tr>

            <td id="title"><b>Quantidade</b></td>

            <td id="info">' . $quantidade . '</td>

          </tr>

          <tr>

            <td id="title"><b>Operação</b></td>

            <td id="info">' . $operacao . '</td>

          </tr>

          <tr>

            <td id="title"><b>Observação</b></td>

            <td id="info">' . $observacao . '</td>

          </tr>

        </table>

      </div>
      
    ';

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML($documento);

$mpdf->charset_in = 'UTF-8';

$mpdf->Output('doc/descargo_de_municao/' . $uuid . '.pdf', 'f');

$mpdf->Output('doc/descargo_de_municao/' . $uuid . '.pdf', 'i'); // F => salvar / D => baixar / i => abrir

header('Location: ../../pages/adm_arm/descargo_de_municao.php');