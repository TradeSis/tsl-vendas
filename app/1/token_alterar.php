<?php
// gabriel 21072023


$conexao = conectaMysql();

if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $novoUsuario = $jsonEntrada['novoUsuario'];
    $sql = "UPDATE token SET idUsuario='$novoUsuario' WHERE idUsuario = '$idUsuario'";
    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>