<?php

session_start();

$imprimir = $_POST['imprimir'];
$nSerie = $_POST['n_serie'];

if (isset($_POST['imprimir'])) {

require_once __DIR__ . '/vendor/autoload.php';

include_once('../../db/Conexao.php');

//Get Arma
$queryHist = "SELECT  * FROM historico_armas";

$resultHist = mysqli_query($conexao, $queryHist);

$data = date('d/m/Y \- H:i:s');

while ($hist = $resultHist->fetch_assoc()) {

  if ($hist['n_serie'] == $nSerie) {

    $linhasTable .= "<hr/>".$hist['localizacao']." | ".$hist['cautela']." | ".date('d/m/Y', strtotime ($hist['data_inspecao']))."<hr/>";

  $historico = "
  <style>

    h4 {text-align: center; background-color: #ABB2B9;}
    p {font-family:Arial;font-size:11.000000px;font-weight:bold;color:#000000;}
    table, td, th, tfoot, {border:solid 1px #000; padding:5px; text-align: center;}
    th {width:100%;background-color:#999;}
    caption {font-size:x-large;}
    colgroup {background:#F60;}
    .coluna1 {background:#F66;}
    .coluna2  {background:#F33;}
    .coluna3  {background:#F99;}

  </style>

  <html>

    <body>

      <div class='container' style='width:100%;display:flex;flex-wrap: nowrap;justify-content: space-between;'>

        <table>

          <tr>

            <td><img style='width:15%;' src='../../img/brasao-pm-pa2.png'></td>

            <td style='width:70%;text-align:center;'>

              <p>GOVERNO DO ESTADO DO PARÁ </p>

              <p>SECRETARIA DE ESTADO DE SEGURANÇA PÚBLICA</p>

              <p>E DEFESA SOCIAL</p>

              <p>POLÍCIA MILITAR DO PARÁ</p>

              <p>7º BATALHÃO DA PM</p>
              
              <hr>

              <h2 style='text-align:center'>HISTÓRICO DA ' ".$hist['marca']." / ".$hist['modelo']." '</h2>

              <br>

              <p>DATA DE EMISSÃO</p>

              <p>".$data."</p>

              <br>

            </td>

            <td><img style='width:15%;' src='../../img/logo2.png'></td>

          </tr>

      </table>

    </div>

    <br>

    <table style='width: 100%;'>
          
      <tr>

        <th>Nº SÉRIE : ".$hist['n_serie']."</td>

      </tr>

      <tr>

        <td><img src='./store/img/".$hist['foto']."'style='width: 170px;height: 150px;'></th>

      </tr>

    </table>

    <table style='width: 100%;'>

      <tr>
        
        <th>LOCALIZAÇÃO | CAUTELA | DATA DA INSPEÇÃO</th>
    
      </tr>

      <tr>

        <hr>

        <td> ".$linhasTable."  </td>

      </tr>

    </table>

  </body>

</html>

";

}

}

}

$data = date('d/m/Y \- H:i:s');

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML($historico);

$mpdf->charset_in = 'UTF-8';

$mpdf->Output('historico/' . $data . '.pdf', 'i'); // F => salvar / D => baixar / i => abrir