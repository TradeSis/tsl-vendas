<?php
include_once('../database/token.php');

$user = $_POST['user'];
$token = $_POST['token'];

if ($user === "") {
    $user = null;
}
if ($token === "") {
    $token = null;
}

$usuarios = verificaToken($user, $token);

if (isset($usuarios['senhaCorreta'])) {
    if ($usuarios['senhaCorreta'] == false) {
        $mensagem = "Token não cadastrado ou incorreto!";
        header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
    } else {
        header('Location: autenticado.php?idUsuario=' . urlencode($usuarios['idUsuario']));
    }
} else {
    echo json_encode($user);
    echo json_encode($token);
    echo json_encode($usuarios);
    $mensagem = $usuarios['retorno'];
    //header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
}
?>
