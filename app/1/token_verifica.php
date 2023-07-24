<?php
// gabriel 21072023
include_once __DIR__ . "/../../conexao.php";
require_once ROOT . "/vendor/autoload.php";

$google2fa = new \PragmaRX\Google2FA\Google2FA();


$conexao = conectaMysql();
$usuarios = array();

$sql = "SELECT * FROM token ";
if (isset($jsonEntrada["idUsuario"])) {
  $sql = $sql . " where token.idUsuario = '" . $jsonEntrada["idUsuario"] . "'";
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  if (isset($jsonEntrada["token"]) && $row['secret'] !== null) {
    if ($google2fa->verifyKey($row['secret'], $jsonEntrada["token"])) {
      $row['senhaCorreta'] = true;
    } else {
      $row['senhaCorreta'] = false;
    }
  }
  array_push($usuarios, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idUsuario"]) && $rows == 1) {
  $usuarios = $usuarios[0];
}
$jsonSaida = $usuarios;

?>