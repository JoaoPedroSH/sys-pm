<?php

session_start();

$imprimir = $_POST['imprimir'];

if (isset($_POST['imprimir'])) {

require_once __DIR__ . '/vendor/autoload.php';

include_once('../../db/Conexao.php');

//Get Arma Ord
$queryArmaOrd = "SELECT  * FROM armas_ord";

$resultArmaOrd = mysqli_query($conexao, $queryArmaOrd);

//Get Munição Ord
$queryMunOrd = "SELECT  * FROM municao_ord";

$resultMunOrd = mysqli_query($conexao, $queryMunOrd);

//Get Arma Gto
$queryArmaGto = "SELECT  * FROM armas_gto";

$resultArmaGto = mysqli_query($conexao, $queryArmaGto);

//Get Munição Gto
$queryMunGto = "SELECT  * FROM municao_gto";

$resultMunGto = mysqli_query($conexao, $queryMunGto);

//Get Equipamento Ord
$queryEquipOrd = "SELECT  * FROM equip_ord";

$resultEquipOrd = mysqli_query($conexao, $queryEquipOrd);

//Get Equipamento Gto
$queryEquipGto = "SELECT  * FROM equip_gto";

$resultEquipGto = mysqli_query($conexao, $queryEquipGto);

$data = date('d/m/Y \- H:i:s');

while ($row1 = $resultArmaOrd->fetch_assoc()) {
  $countArmaOrd .= $a."<hr/>";
  $marcaArmaOrd .= $row1['marca']."<hr/>";
  $modeloArmaOrd .= $row1['modelo']."<hr/>";
  $serieArmaOrd .= $row1['n_serie']."<hr/>";
  $patrimonioArmaOrd .= $row1['patrimonio']."<hr/>";
  $localizacaoArmaOrd .= $row1['localizacao']."<hr/>";
  $situacaoArmaOrd .= $row1['situacao']."<hr/>";
  $cautelaArmaOrd .= $row1['cautela']."<hr/>";
}

while ($row3 = $resultMunOrd->fetch_assoc()) {
  $countMunOrd .= $c."<hr/>";
  $marcaMunOrd .= $row3['marca']."<hr/>";
  $modeloMunOrd .= $row3['modelo']."<hr/>";
  $validadeMunOrd .= $row3['validade']."<hr/>";
  $tipoMunOrd .= $row3['tipo']."<hr/>";
  $quantidadeMunOrd .= $row3['quantidade']."<hr/>";
}

while ($row5 = $resultEquipOrd->fetch_assoc()) {
  $countEquipOrd .= $e."<hr/>";
  $tipoEquipOrd .= $row5['tipo']."<hr/>";
  $marcaEquipOrd .= $row5['marca']."<hr/>";
  $modeloEquipOrd .= $row5['modelo']."<hr/>";
  $serieEquipOrd .= $row5['n_serie']."<hr/>";
  $patrimonioEquipOrd .= $row5['patrimonio']."<hr/>";
  $localizacaoEquipOrd .= $row5['localizacao']."<hr/>";
  $situacaoEquipOrd .= $row5['situacao']."<hr/>";
  $cautelaEquipOrd .= $row5['cautela']."<hr/>";
  $validadeEquipOrd .= $row5['validade']."<hr/>";
  $nivelEquipOrd .= $row5['nivel']."<hr/>";
  $tamanhoEquipOrd .= $row5['tamanho']."<hr/>";
  $fabricacaoEquipOrd .= $row5['fabricacao']."<hr/>";
}

while ($row2 = $resultArmaGto->fetch_assoc()) {
  $countArmaGto .= $b."<hr/>";
  $marcaArmaGto .= $row2['marca']."<hr/>";
  $modeloArmaGto .= $row2['modelo']."<hr/>";
  $serieArmaGto .= $row2['n_serie']."<hr/>";
  $patrimonioArmaGto .= $row2['patrimonio']."<hr/>";
  $localizacaoArmaGto .= $row2['localizacao']."<hr/>";
  $situacaoArmaGto .= $row2['situacao']."<hr/>";
  $cautelaArmaGto .= $row2['cautela']."<hr/>";
}

while ($row4 = $resultMunGto->fetch_assoc()) {
  $countMunGto .= $d."<hr/>";
  $marcaMunGto .= $row4['marca']."<hr/>";
  $modeloMunGto .= $row4['modelo']."<hr/>";
  $validadeMunGto .= $row4['validade']."<hr/>";
  $tipoMunGto .= $row4['tipo']."<hr/>";
  $quantidadeMunGto .= $row4['quantidade']."<hr/>";
}

while ($row6 = $resultEquipGto->fetch_assoc()) {
  $countEquipGto .= $f."<hr/>";
  $tipoEquipGto .= $row6['tipo']."<hr/>";
  $marcaEquipGto .= $row6['marca']."<hr/>";
  $modeloEquipGto .= $row6['modelo']."<hr/>";
  $serieEquipGto .= $row6['n_serie']."<hr/>";
  $patrimonioEquipGto .= $row6['patrimonio']."<hr/>";
  $localizacaoEquipGto .= $row6['localizacao']."<hr/>";
  $situacaoEquipGto .= $row6['situacao']."<hr/>";
  $cautelaEquipGto .= $row6['cautela']."<hr/>";
  $validadeEquipGto .= $row6['validade']."<hr/>";
  $nivelEquipGto .= $row6['nivel']."<hr/>";
  $tamanhoEquipGto .= $row6['tamanho']."<hr/>";
  $fabricacaoEquipGto .= $row6['fabricacao']."<hr/>";
}

$inventario = "
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

            <p>DATA DE EMISSÃO</p>

            <p>".$data."</p>

          </td>

          <td><img style='width:15%;' src='../../img/logo2.png'></td>

        </tr>

      </table>
      
    </div>

      <h4>ARMAS ORDINÁRIO</h4>
      <table>

        <tr>

          <th>Marca</th>
          
          <th>Modelo</th>

          <th>Nº Série</th>

          <th>Patrimônio</th>

          <th>Localização</th>

          <th>Situação</th>

          <th>Cautela</th>

        </tr>

          <tr>

            <td>".$marcaArmaOrd."</td>
            
            <td>".$modeloArmaOrd."</td>

            <td>".$serieArmaOrd."</td>

            <td>".$patrimonioArmaOrd."</td>

            <td>".$localizacaoArmaOrd."</td>

            <td>".$situacaoArmaOrd."</td>

            <td>".$cautelaArmaOrd."</td>

          </tr>

      </table>


      <h4>MUNIÇÕES ORDINÁRIO</h4>
      <table>

        <tr>

          <th>Marca</th>

          <th>Modelo</th>

          <th>Validade</th>

          <th>Tipo </th>

          <th>Quantidade</th>

        </tr>

        <tr>

          <td>".$marcaMunOrd."</td>

          <td>".$modeloMunOrd."</td>

          <td>".$validadeMunOrd."</td>

          <td>".$tipoMunOrd."</td>

          <td>".$quantidadeMunOrd."</td>

        </tr>

      </table>


      <h4 >EQUIPAMENTOS ORDINÁRIO</h4>
      <table>

        <tr>

          <th>Tipo</th>

          <th>Marca</th>

          <th>Modelo</th>

          <th>Nº Série</th>

          <th>Patrimônio</th>

          <th>Localização</th>

          <th>Situação</th>

          <th>Cautela</th>

          <th>Validade</th>

          <th>Nível</th>

          <th>Tamanho</th>

          <th>Fabricação</th>

        </tr>

        <tr>

          <td>".$tipoEquipOrd."</td>

          <td>".$marcaEquipOrd."</td>

          <td>".$modeloEquipOrd."</td>

          <td>".$serieEquipOrd."</td>

          <td>".$patrimonioEquipOrd."</td>

          <td>".$localizacaoEquipOrd."</td>

          <td>".$situacaoEquipOrd."</td>

          <td>".$cautelaEquipOrd."</td>

          <td>".$validadeEquipOrd."</td>

          <td>".$nivelEquipOrd."</td>

          <td>".$tamanhoEquipOrd."</td>

          <td>".$fabricacaoEquipOrd."</td>

        </tr>

      </table>


      <h4>ARMAS GTO</h4>
      <table>

        <tr>

          <th>Marca</th>
          
          <th>Modelo</th>

          <th>Nº Série</th>

          <th>Patrimônio</th>

          <th>Localização</th>

          <th>Situação</th>

          <th>Cautela</th>

        </tr>

          <tr>

            <td>".$marcaArmaGto."</td>
            
            <td>".$modeloArmaGto."</td>

            <td>".$serieArmaGto."</td>

            <td>".$patrimonioArmaGto."</td>

            <td>".$localizacaoArmaGto."</td>

            <td>".$situacaoArmaGto."</td>

            <td>".$cautelaArmaGto."</td>

          </tr>

      </table>


      <h4>MUNIÇÕES GTO</h4>
      <table>

        <tr>

          <th>Marca</th>

          <th>Modelo</th>

          <th>Validade</th>

          <th>Tipo </th>

          <th>Quantidade</th>

        </tr>

        <tr>

          <td>".$marcaMunGto."</td>

          <td>".$modeloMunGto."</td>

          <td>".$validadeMunGto."</td>

          <td>".$tipoMunGto."</td>

          <td>".$quantidadeMunGto."</td>

        </tr>

      </table>


      <h4>EQUIPAMENTOS GTO</h4>
      <table>

        <tr>

          <th>Tipo</th>

          <th>Marca</th>

          <th>Modelo</th>

          <th>Nº Série</th>

          <th>Patrimônio</th>

          <th>Localização</th>

          <th>Situação</th>

          <th>Cautela</th>

          <th>Validade</th>

          <th>Nível</th>

          <th>Tamanho</th>

          <th>Fabricação</th>

        </tr>

        <tr>

          <td>".$tipoEquipGto."</td>

          <td>".$marcaEquipGto."</td>

          <td>".$modeloEquipGto."</td>

          <td>".$serieEquipGto."</td>

          <td>".$patrimonioEquipGto."</td>

          <td>".$localizacaoEquipGto."</td>

          <td>".$situacaoEquipGto."</td>

          <td>".$cautelaEquipGto."</td>

          <td>".$validadeEquipGto."</td>

          <td>".$nivelEquipGto."</td>

          <td>".$tamanhoEquipGto."</td>

          <td>".$fabricacaoEquipGto."</td>

        </tr>

      </table>

    </body>

  </html>

  ";

}

$data = date('d/m/Y \- H:i:s');

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

$mpdf->WriteHTML($inventario);

$mpdf->charset_in = 'UTF-8';

$mpdf->Output('inventario/' . $data . '.pdf', 'i'); // F => salvar / D => baixar / i => abrir